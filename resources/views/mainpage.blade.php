<x-app-layout>

    <div class="table-data">
        <div class="header-wrapper">
            <h4>List Stok Barang Pada Goedank</h4>

            <div class="button-add-wrapper">
                <button class="button-add" id="button-create">
                    <span>Add new product</span><i></i>
                </button>
                <a href="{{ route('product.export', ['id' => 1]) }}" class="button-add">
                    <span>Export</span><i></i>
                </a>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="popup" id="popup" style="display:none;">
            <div class="close-btn" id="close-btn">&times;</div>
            <div class="form">
                <h2 style="color: white">Create New Product</h2>
                <form action="{{ route('mainpage.store') }}" method="POST">
                    @csrf
                    <div class="form-element">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product_name" placeholder="Product Name"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="product-code">Product Code</label>
                        <input type="text" id="product-code" name="product_code" placeholder="Product Code"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity" placeholder="Quantity"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" placeholder="Price" class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="input-color" />
                    </div>

                    <div class="button-create-submit">
                        <button type="submit" class="btn btn-success button-new-list">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="fitur-wrapper">
                <input id="keyword" type="text" class="form-control fitur" placeholder="Search by Product Name"
                    style="width: 25%" />
                <label for="dropdown" style="margin-top: 20px;" class="fitur">Sort By</label>
                <div class="dropdown fitur" id="dropdown">
                    <div class="select">
                        <span class="selected">Price</span>
                        <div class="caret"></div>
                    </div>
                    <ul class="menu">
                        <li data-column="product_name">Product Name</li>
                        <li data-column="product_code">Product Code</li>
                        <li data-column="price" class="active-feature">Price</li>
                    </ul>
                </div>
                <label for="start_date" style="margin-top: 20px;" class="fitur">Start date</label>
                <input type="date" id="start_date" class="fitur">
                <label for="end_date" class="fitur" style="margin-top: 20px;">End date</label>
                <input type="date" id="end_date" class="fitur">
            </div>

            <div class="table-list-data">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->date }}</td>
                                <td>
                                    <a href="{{ route('mainpage.edit', ['mainpage' => $product]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('mainpage.destroy', ['mainpage' => $product]) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("button-create").addEventListener("click", function() {
            document.getElementById("popup").style.display = "block";
        });

        document.getElementById("close-btn").addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });

        // Search functionality
        document.getElementById("keyword").addEventListener("input", function() {
            let keyword = this.value.toLowerCase();
            let rows = document.querySelectorAll(".table-list-data tbody tr");

            rows.forEach(row => {
                let productName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                if (productName.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        // Sorting functionality
        document.getElementById("dropdown").addEventListener("change", function() {
            let selectedSort = this.querySelector(".menu li.active-feature").getAttribute("data-column");
            let rows = Array.from(document.querySelectorAll(".table-list-data tbody tr"));

            rows.sort((rowA, rowB) => {
                let valueA = rowA.querySelector(`td:nth-child(${getColumnIndex(selectedSort)})`).textContent
                    .trim();
                let valueB = rowB.querySelector(`td:nth-child(${getColumnIndex(selectedSort)})`).textContent
                    .trim();

                if (!isNaN(valueA) && !isNaN(valueB)) {
                    return parseFloat(valueA) - parseFloat(valueB);
                } else {
                    return valueA.localeCompare(valueB);
                }
            });

            let tbody = document.querySelector(".table-list-data tbody");
            tbody.innerHTML = "";
            rows.forEach(row => tbody.appendChild(row));
        });

        function getColumnIndex(columnName) {
            switch (columnName) {
                case "product_name":
                    return 2;
                case "product_code":
                    return 3;
                case "price":
                    return 5;
                default:
                    return 2;
            }
        }

        // Filter by date functionality
        document.getElementById("start_date").addEventListener("change", filterByDate);
        document.getElementById("end_date").addEventListener("change", filterByDate);

        function filterByDate() {
            let startDate = document.getElementById("start_date").value;
            let endDate = document.getElementById("end_date").value;
            let rows = document.querySelectorAll(".table-list-data tbody tr");

            rows.forEach(row => {
                let dateValue = row.querySelector("td:nth-child(6)").textContent.trim();
                let date = new Date(dateValue);

                if ((startDate === "" || date >= new Date(startDate)) && (endDate === "" || date <= new Date(
                        endDate))) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</x-app-layout>

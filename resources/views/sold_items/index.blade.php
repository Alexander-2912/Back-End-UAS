<x-app-layout>
    <div class="table-data">
        <div class="header-wrapper">
            <h4>List Barang Terjual di Goedank</h4>

            <div class="button-add-wrapper">
                <button class="button-add" id="button-create"><span>Add new sold product</span><i></i></button>
                <a href="{{ route('sold.export', ['id' => 1]) }}" class="button-add">
                    <span>Export</span><i></i>
                </a>
            </div>
        </div>
        @if ($errors->any())
            <p style="color: red"> {{ implode('', $errors->all(':message')) }}</p>
        @endif

        <div class="popup">
            <div class="close-btn">&times;</div>
            <form action="{{ route('sold_item.store', ['id' => 1]) }}" method="post">
                @csrf
                <div class="form">
                    <div class="form-element">
                        <label for="sold-name">Buyer Name</label>
                        <input type="text" id="sold-name" name="buyer_name" placeholder="Product Name"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-number">Phone Number</label>
                        <input type="text" id="sold-number" name="phone_number" placeholder="Phone Number"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-product-name">Product Name</label>
                        <input type="text" id="sold-product-name" name="product_name" placeholder="Product Name"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-code">Product Code</label>
                        <input type="text" id="sold-code" name="product_code" placeholder="Product Code"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-quantity">Quantity</label>
                        <input type="text" id="sold-quantity" name="quantity" placeholder="Quantity"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-price">Price</label>
                        <input type="text" id="sold-price" name="price" placeholder="Price" class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="sold-date">Date</label>
                        <input type="date" id="sold-date" name="date" class="input-color" name="date" />
                    </div>

                    <div class="button-create-submit">
                        <button type="submit" class="btn btn-success button-new-list"
                            id="button-create-submit">Create</button>
                    </div>
                </div>
            </form>
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
                        <li>Product Name</li>
                        <li>Product Code</li>
                        <li class="active">Price</li>
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
                            <th>Buyer name</th>
                            <th>Phone Number</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soldItems as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->buyer_name }}</th>
                                <th>{{ $item->phone_number }}</th>
                                <th>{{ $item->product_name }}</th>
                                <th>{{ $item->product_code }}</th>
                                <th>{{ $item->quantity }}</th>
                                <th>{{ $item->price }}</th>
                                <th>{{ $item->date }}</th>
                                <td>
                                    <a href="{{ route('sold_item.edit', ['sold_item' => $item]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('sold_item.destroy', ['sold_item' => $item]) }}"
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


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle search input
                document.getElementById('keyword').addEventListener('input', function() {
                    let keyword = this.value.toLowerCase();
                    filterTable(keyword);
                });

                // Handle sort dropdown
                let sortItems = document.querySelectorAll('.menu li');
                sortItems.forEach(item => {
                    item.addEventListener('click', function() {
                        sortTable(this.innerText.toLowerCase());
                        document.querySelector('.selected').innerText = this.innerText;
                    });
                });

                // Handle date filtering
                document.getElementById('start_date').addEventListener('change', function() {
                    filterByDate();
                });

                document.getElementById('end_date').addEventListener('change', function() {
                    filterByDate();
                });

                // Function to filter table based on keyword
                function filterTable(keyword) {
                    let rows = document.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        let productName = row.cells[3].innerText.toLowerCase();
                        if (productName.includes(keyword)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }

                // Function to sort table based on selected criteria
                function sortTable(criteria) {
                    let index = {
                        'product name': 3,
                        'product code': 4,
                        'price': 6
                    } [criteria];

                    let rows = Array.from(document.querySelectorAll('tbody tr'));
                    rows.sort((a, b) => {
                        let cellA = a.cells[index].innerText;
                        let cellB = b.cells[index].innerText;
                        return criteria === 'price' ? parseFloat(cellA) - parseFloat(cellB) : cellA
                            .localeCompare(cellB);
                    });

                    let tbody = document.querySelector('tbody');
                    rows.forEach(row => tbody.appendChild(row));
                }

                // Function to filter table rows by date range
                function filterByDate() {
                    let startDate = new Date(document.getElementById('start_date').value);
                    let endDate = new Date(document.getElementById('end_date').value);

                    let rows = document.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        let rowDate = new Date(row.cells[7].innerText); // Assuming date is in the 7th cell
                        if ((isNaN(startDate) || rowDate >= startDate) && (isNaN(endDate) || rowDate <=
                                endDate)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
            });
        </script>

</x-app-layout>

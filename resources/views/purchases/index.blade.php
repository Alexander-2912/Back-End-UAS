<x-app-layout>
    <div class="table-data">
        <div class="header-wrapper">
            <h4>List Pembelian Barang untuk Goedank</h4>

            <div class="button-add-wrapper">
                <button class="button-add" id="button-create"><span>Add new product</span><i></i></button>
                <a href="{{ route('purchase.export', ['id' => 1]) }}" class="button-add">
                    <span>Export</span><i></i>
                </a>
            </div>
        </div>

        <div class="popup">
            <div class="close-btn">&times;</div>

            <form method="post" action="{{ route('purchase.store') }}" class="form">
                @csrf
                @method('post')
                <div class="form-element">
                    <label for="purchase-seller-name">Seller Name</label>
                    <input type="text" id="purchase-seller-name" placeholder="Seller Name" class="input-color"
                        name="sellerName" />
                </div>
                <div class="form-element">
                    <label for="purchase-phone-number">Phone Number</label>
                    <input type="text" id="purchase-phone-number" placeholder="Phone Number" class="input-color"
                        name="phoneNumber" />
                </div>
                <div class="form-element">
                    <label for="purchase-name">Product Name</label>
                    <input type="text" id="purchase-product-name" placeholder="Product Name" class="input-color"
                        name="productName" />
                </div>
                <div class="form-element">
                    <label for="purchase-code">Product Code</label>
                    <input type="text" id="purchase-product-code" placeholder="Product Code" class="input-color"
                        name="productCode" />
                </div>
                <div class="form-element">
                    <label for="purchase-quantity">Quantity</label>
                    <input type="text" id="purchase-quantity" placeholder="Quantity" class="input-color"
                        name="quantity" />
                </div>
                <div class="form-element">
                    <label for="purchase-price">Price</label>
                    <input type="text" id="purchase-price" placeholder="Price" class="input-color" name="price" />
                </div>
                <div class="form-element">
                    <label for="purchase-date">Date</label>
                    <input type="date" id="purchase-date" class="input-color" name="date" />
                </div>

                <div class="button-create-submit">
                    <input type="submit" value="Create" class="btn btn-success button-new-list"
                        id="button-create-submit">
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
                        <li class="active-feature">Price</li>
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
                            <th>Seller Name</th>
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
                        @foreach ($purchases as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->sellerName }}</td>
                                <td>{{ $item->phoneNumber }}</td>
                                <td>{{ $item->productName }}</td>
                                <td>{{ $item->productCode }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="{{ route('purchase.edit', ['purchase' => $item]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('purchase.destroy', ['purchase' => $item]) }}"
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

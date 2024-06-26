<x-app-layout>
<!-- Container utama untuk data tabel -->
    <div class="table-data">
        <!-- Wrapper untuk bagian header -->
        <div class="header-wrapper">
            <h4>List Stok Barang Pada Goedank</h4>
<!-- Tombol tambah produk baru dan ekspor -->
            <div class="button-add-wrapper">
                <button class="button-add" id="button-create">
                    <span>Add new product</span><i></i>
                </button>
                <a href="{{ route('product.export', ['id' => 1]) }}" class="button-add">
                    <span>Export</span><i></i>
                </a>
            </div>
        </div>

        <!-- Modal untuk form tambah produk -->
        <div class="popup" id="popup" style="display:none;">
            <div class="close-btn" id="close-btn">&times;</div>
            <div class="form">
                <h2 style="color: white">Create New Product</h2>
                <form action="{{ route('mainpage.store') }}" method="POST">
                    @csrf
                    <div class="form-element mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" id="product-name" name="product_name" placeholder="Product Name"
                            class="form-control @error('product_name') is-invalid @enderror"
                            value="{{ old('product_name') }}" required />
                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-element mb-3">
                        <label for="product-code" class="form-label">Product Code</label>
                        <input type="text" id="product-code" name="product_code" placeholder="Product Code"
                            class="form-control @error('product_code') is-invalid @enderror"
                            value="{{ old('product_code') }}" required />
                        @error('product_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-element mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" name="quantity" placeholder="Quantity"
                            class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}"
                            required />
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-element mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" name="price" placeholder="Price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                            required />
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-element mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date"
                            class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}"
                            required />
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="button-create-submit">
                        <button type="submit" class="btn btn-success">
                            Create
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div>
            <!-- Bagian fitur pencarian, pengurutan, dan filter -->
            <div class="fitur-wrapper">
                 <!-- Input pencarian berdasarkan nama produk -->
                <input id="keyword" type="text" class="form-control fitur" placeholder="Search by Product Name"
                    style="width: 25%" />
                    <!-- Dropdown untuk pengurutan -->
                <label for="sort" style="margin-top: 20px;" class="fitur">Sort By</label>
                <select id="sort" class="form-select fitur" style="width: 25%;">
                    <option value="product_name">Product Name</option>
                    <option value="product_code">Product Code</option>
                    <option value="price">Price</option>
                </select>
                 <!-- Input untuk filter berdasarkan rentang tanggal -->
                <label for="start_date" style="margin-top: 20px;" class="fitur">Start date</label>
                <input type="date" id="start_date" class="fitur">
                <label for="end_date" class="fitur" style="margin-top: 20px;">End date</label>
                <input type="date" id="end_date" class="fitur">
            </div>
  <!-- Tabel untuk menampilkan daftar produk -->
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

    <!-- JavaScript untuk mengatur modal, fitur pencarian, pengurutan, dan filter -->
    <script>
        // Tampilkan modal form saat tombol "Add new product" diklik
        document.getElementById("button-create").addEventListener("click", function() {
            document.getElementById("popup").style.display = "block";
        });
// Sembunyikan modal saat tombol close di modal diklik
        document.getElementById("close-btn").addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });

        document.addEventListener('DOMContentLoaded', function() {
                // Handle search input
                document.getElementById('keyword').addEventListener('input', function() {
                    let keyword = this.value.toLowerCase();
                    filterTable(keyword);
                });

                // Handle sort dropdown
                document.getElementById("sort").addEventListener("change", function() {
                    let selectedSort = this.value;
                    let rows = Array.from(document.querySelectorAll(".table-list-data tbody tr"));

                    rows.sort((rowA, rowB) => {
                        let valueA = rowA.querySelector(`td:nth-child(${getColumnIndex(selectedSort)})`).textContent.trim();
                        let valueB = rowB.querySelector(`td:nth-child(${getColumnIndex(selectedSort)})`).textContent.trim();

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
                        let productName = row.cells[1].innerText.toLowerCase();
                        if (productName.includes(keyword)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }

                

                function filterByDate() {
                    let startDate = new Date(document.getElementById('start_date').value);
                    let endDate = new Date(document.getElementById('end_date').value);

                    let rows = document.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        let rowDate = new Date(row.cells[6].innerText);
                        if ((isNaN(startDate) || rowDate >= startDate) && (isNaN(endDate) || rowDate <=
                                endDate)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
            });

        // // Search functionality
        
    </script>
</x-app-layout>
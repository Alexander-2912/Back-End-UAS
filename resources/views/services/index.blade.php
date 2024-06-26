<x-app-layout>
    <div class="table-data">
        <div class="header-wrapper">
            <h4>List Service di Goedank</h4>

            <div class="button-add-wrapper">
                <button class="button-add" id="button-create">
                    <span>Add new service</span><i></i>
                </button>
                <a href="{{ route('service.export', ['id' => 1]) }}" class="button-add">
                    <span>Export</span><i></i>
                </a>
            </div>
        </div>

        @if ($errors->any())
            <p style="color: red"> {{ implode('', $errors->all(':message')) }}</p>
        @endif

        <div class="popup">
            <div class="close-btn">&times;</div>
            <form action="{{ route('services.store') }}" method="post">
                @csrf
                <div class="form">
                    <h2 style="color: white">Create New Service</h2>
                    <div class="form-element">
                        <label for="service-customer-name">Customer Name</label>
                        <input type="text" id="service-customer-name" name="customer_name"
                            placeholder="Customer Name" class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="service-number">Phone Number</label>
                        <input type="text" id="service-name" placeholder="Phone Number" name="phone_number"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="service-name">Service Name</label>
                        <input type="text" id="service-name" placeholder="Service Name" name="service_name"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="service-code">Service Code</label>
                        <input type="text" id="service-code" placeholder="Service Code" name="service_code"
                            class="input-color" />
                    </div>
                    <div class="form-element">
                        <label for="price">Price</label>
                        <input type="text" id="price" placeholder="Quantity" class="input-color"
                            name="price" />
                    </div>
                    <div class="form-element">
                        <label for="service-date">Date</label>
                        <input type="date" id="service-date" class="input-color" name="date" />
                    </div>

                    <div class="button-create-submit">
                        <button class="btn btn-success button-new-list" id="button-create-submit" type="submit">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <div class="fitur-wrapper">
                <input id="keyword" type="text" class="form-control fitur" placeholder="Search by Service Name"
                    style="width: 25%" />
                <label for="dropdown" style="margin-top: 20px;" class="fitur">Sort By</label>
                <div class="dropdown fitur" id="dropdown">
                    <div class="select">
                        <span class="selected">Price</span>
                        <div class="caret"></div>
                    </div>
                    <ul class="menu">
                        <li>Service Name</li>
                        <li>Service Code</li>
                        <li class="active">Price</li>
                    </ul>
                </div>
                <label for="start_date" style="margin-top: 20px;" class="fitur">Start date</label>
                <input type="date" id="start_date" class="fitur">
                <label for="end_date" class="fitur" style="margin-top: 20px;">End date</label>
                <input type="date" id="end_date">
            </div>

            <div class="table-list-data">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Service Name</th>
                            <th>Service Code</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->service_code }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="{{ route('services.edit', ['service' => $item]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('services.destroy', ['service' => $item]) }}" method="POST"
                                        style="display:inline-block;">
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
                        'service name': 3,
                        'service code': 4,
                        'price': 5
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
                        let rowDate = new Date(row.cells[6].innerText); // Assuming date is in the 7th cell
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

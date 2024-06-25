<x-app-layout>
    <div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        <h2>Edit Service</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label for="customer-name">Customer Name</label>
                <input type="text" id="customer-name" name="customer_name" class="form-control"
                    value="{{ $service->customer_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="phone-number">Phone Number</label>
                <input type="text" id="phone-number" name="phone_number" class="form-control"
                    value="{{ $service->phone_number }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="service-name">Service Name</label>
                <input type="text" id="service-name" name="service_name" class="form-control"
                    value="{{ $service->service_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="service-code">Service Code</label>
                <input type="text" id="service-code" name="service_code" class="form-control"
                    value="{{ $service->service_code }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $service->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $service->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
        </form>
    </div>
</x-app-layout>

<x-app-layout>
    <!-- Layout container with specific styling -->
    <div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        <h2>Edit Service</h2>
<!-- Menampilkan pesan error jika ada -->
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
                <!-- Input untuk nama pelanggan -->
                <input type="text" id="customer-name" name="customer_name" class="form-control"
                    value="{{ $service->customer_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="phone-number">Phone Number</label>
                <!-- Input untuk nomor telepon -->
                <input type="text" id="phone-number" name="phone_number" class="form-control"
                    value="{{ $service->phone_number }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="service-name">Service Name</label>
                <!-- Input untuk nama layanan -->
                <input type="text" id="service-name" name="service_name" class="form-control"
                    value="{{ $service->service_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="service-code">Service Code</label>
                <!-- Input untuk kode layanan -->
                <input type="text" id="service-code" name="service_code" class="form-control"
                    value="{{ $service->service_code }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <!-- Input untuk harga layanan -->
                <input type="number" id="price" name="price" class="form-control" value="{{ $service->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                 <!-- Input untuk tanggal layanan -->
                <input type="date" id="date" name="date" class="form-control" value="{{ $service->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <!-- Tombol untuk menyimpan perubahan layanan -->
                <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
        </form>
    </div>
</x-app-layout>

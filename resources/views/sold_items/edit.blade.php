<x-app-layout>
    <!-- Layout container with specific styling -->
    <div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        <h2>Edit Sold Product</h2>
        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
            <p style="color: red"> {{ implode('', $errors->all(':message')) }}</p>
        @endif
        <form action="{{ route('sold_item.update', $sold_item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="seller-name">Buyer Name</label>
                <!-- Input untuk nama pembeli -->
                <input type="text" id="seller-name" name="buyer_name" class="form-control"
                    value="{{ $sold_item->buyer_name }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="phone-number">Phone Number</label>
                <!-- Input untuk nomor telepon -->
                <input type="text" id="phone-number" name="phone_number" class="form-control"
                    value="{{ $sold_item->phone_number }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-name">Product Name</label>
                <!-- Input untuk nama produk -->
                <input type="text" id="product-name" name="product_name" class="form-control"
                    value="{{ $sold_item->product_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-code">Product Code</label>
                <!-- Input untuk kode produk -->
                <input type="text" id="product-code" name="product_code" class="form-control"
                    value="{{ $sold_item->product_code }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="quantity">Quantity</label>
                <!-- Input untuk jumlah produk yang terjual -->
                <input type="number" id="quantity" name="quantity" class="form-control"
                    value="{{ $sold_item->quantity }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <!-- Input untuk harga produk yang terjual -->
                <input type="number" id="price" name="price" class="form-control" value="{{ $sold_item->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <!-- Input untuk tanggal penjualan -->
                <input type="date" id="date" name="date" class="form-control" value="{{ $sold_item->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <!-- Tombol untuk menyimpan perubahan produk yang terjual -->
                <button type="submit" class="btn btn-primary">Update Sold Product</button>
            </div>
        </form>
    </div>
</x-app-layout>

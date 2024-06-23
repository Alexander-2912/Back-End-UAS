<x-app-layout>
<div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        @if ($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
        <h2>Edit Purchase</h2>
        <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="product-name">Seller Name</label>
                <input type="text" id="product-name" name="sellerName" class="form-control"
                    value="{{ $purchase->sellerName }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="productName" class="form-control"
                    value="{{ $purchase->productName }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-name">PhoneNumber</label>
                <input type="text" id="product-name" name="phoneNumber" class="form-control"
                    value="{{ $purchase->phoneNumber }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-code">Product Code</label>
                <input type="text" id="product-code" name="productCode" class="form-control"
                    value="{{ $purchase->productCode }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control"
                    value="{{ $purchase->quantity }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $purchase->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $purchase->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Update Purchase</button>
            </div>
        </form>
    </div>
</x-app-layout>

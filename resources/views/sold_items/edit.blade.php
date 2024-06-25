<x-app-layout>
<div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        <h2>Edit Sold Product</h2>
        @if ($errors->any())
            <p style="color: red"> {{ implode('', $errors->all(':message')) }}</p>
        @endif
        <form action="{{ route('sold_item.update', $sold_item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="seller-name">Buyer Name</label>
                <input type="text" id="seller-name" name="buyer_name" class="form-control"
                    value="{{ $sold_item->buyer_name }}" required>
            </div>
            <div class="form-group mb-2">
                <label for="phone-number">Phone Number</label>
                <input type="text" id="phone-number" name="phone_number" class="form-control"
                    value="{{ $sold_item->phone_number }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="product_name" class="form-control"
                    value="{{ $sold_item->product_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-code">Product Code</label>
                <input type="text" id="product-code" name="product_code" class="form-control"
                    value="{{ $sold_item->product_code }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control"
                    value="{{ $sold_item->quantity }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $sold_item->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $sold_item->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Update Sold Product</button>
            </div>
        </form>
    </div>
</x-app-layout>

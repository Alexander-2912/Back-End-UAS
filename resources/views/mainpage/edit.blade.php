<x-app-layout>
    <div class="container" style="margin-left: 300px; margin-top: 100px; width: 50%">
        <h2>Edit Product</h2>
        <form action="{{ route('mainpage.update', $mainpage->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="product_name" class="form-control"
                    value="{{ $mainpage->product_name }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="product-code">Product Code</label>
                <input type="text" id="product-code" name="product_code" class="form-control"
                    value="{{ $mainpage->product_code }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control"
                    value="{{ $mainpage->quantity }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $mainpage->price }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $mainpage->date }}"
                    required>
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</x-app-layout>

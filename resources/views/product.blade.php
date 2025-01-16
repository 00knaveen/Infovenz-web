<form class="product-container d-none" action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="productId" name="product_id">
    <select name="product_category" class="product_category" id="product-category" required>
        <option value="" disabled selected>-- Choose a Category --</option>
        <option value="electronics">Electronics</option>
        <option value="fashion">Fashion</option>
        <option value="home_appliances">Home Appliances</option>
        <option value="books">Books</option>
        <option value="sports">Sports</option>
    </select>
    <input type="text" name="name" class="product_name" id="product-name" placeholder="Product Name" required>
    <input type="number" name="quantity" class="product_quantity" id="product-quantity" placeholder="Quantity" required>
    <input type="number" name="price" class="product_price" id="product_price" placeholder="Price" required>
    <input type="file" name="file" required class="product_image">
    <textarea class="form-control product_description" name="description" placeholder="Description" required></textarea>
    <div class="button-container d-flex w-50 gap-2">
    <button class="btn btn-primary save-update-product" type="submit">Save Product</button>
    <button class="btn btn-danger d-none product-container-edit cancel-button" type="button">Cancel</button>
    </div>
</form>

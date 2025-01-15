<form class="d-none product-container" action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="product_category" id="product-category" required>
        <option value="" disabled selected>-- Choose a Category --</option>
        <option value="electronics">Electronics</option>
        <option value="fashion">Fashion</option>
        <option value="home_appliances">Home Appliances</option>
        <option value="books">Books</option>
        <option value="sports">Sports</option>
    </select>
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="number" name="price" placeholder="Price" required>
    <input type="file" name="file" required>
    <textarea class="form-control" name="description" placeholder="Description" required></textarea>
    <button class="w-25" type="submit">Save Product</button>
</form>

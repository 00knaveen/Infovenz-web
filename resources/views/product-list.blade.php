<table id="expensesTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->product_category}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td class="product-image-container">
                        @if($product->file)
                            <img src="{{ asset('storage/' . $product->file) }}" alt="Product Image" width="100" height="100">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>

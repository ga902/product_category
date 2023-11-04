
@extends('layout')

@include('filter')

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Discount Percentage</th>
                        <th>Rating</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Third Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['title'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['discountPercentage'] }}</td>
                            <td>{{ $product['rating'] }}</td>
                            <td>{{ $product['stock'] }}</td>
                            <td>{{ $product['brand'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td><img src="{{ $product['thumbnail'] }}" alt="Thumbnail" style="max-width: 100px;"></td>
                            <td>
                                @if(isset($product['images'][2]))
                                    <img src="{{ $product['images'][2] }}" alt="Third Image" style="max-width: 100px;">
                                @else
                                    <img src="path/to/default/image.jpg" alt="Default Image" style="max-width: 100px;">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('pagination')
</div>
<!-- ... Existing HTML code ... -->



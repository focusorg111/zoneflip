@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Price</th>
                <th>Action</th>
            @foreach($products as $product)
                <tr><td>{{$product->product_name}}</td>
                <td>{{$product->category_id }}</td>
                <td>{{$product->subcategory_id }}</td>
                <td>{{$product->price }}</td>
                    <td><i class="glyphicon-edit"></i>
                    <a class="btn btn-default" href="{{route('product.manage-image')}}">Manage Image</a></td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
    @endsection
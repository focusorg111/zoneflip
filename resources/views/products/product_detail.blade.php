@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr><td>{{$product->product_name}}
                <td>{{$product->category_id }}</td>
                <td>{{$product->subcategory_id }}</td>
                <td>{{$product->price }}</td>
                    <td><i class="glyphicon-edit"></i></td>

                </tr>
            @endforeach
        </div>
    </div>
        </table>


    @endsection
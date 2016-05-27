@extends('layout.default')
@section('content')
    <div class="col-md-12">
        <form method="get" action="{{route('get.venderlist')}}">
                <select class="drop" name="category_name"></select>
                <select class="drop" name="subcategory_name"></select>
                <button type="submit" class=".btn btn-info">Filter</button>
            </form>
</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Price</th>
                <th>Action</th>
<<<<<<< HEAD
            </tr>
                @foreach($productInfos as $productInfo)
                <tr><td>{{$productInfo->product_name}}
                <td>{{$productInfo->category_name }}</td>
                <td>{{$productInfo->subcategory_name }}</td>
                <td>{{$productInfo->price }}</td>
                    <td><i class="glyphicon-edit"></i></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>



    @endsection


@section('script')

    <script>

        $(document).ready(function(){
            $("#category_id").change(function(){
                var countryId=$("#category_id").val();
                $.ajax( {
                    method:'get',
                    data:{
                        subcategory_id: countryId
                    },
                    url : '{{route("product.get-subcategory")}}',
                    success:     function(data) {
                        // console.log(data);
                        $('#subcategory_id').html(data);
                        // console.log('hhhjngkn');
                    }
                });
            });
        });



    </script>

@endsection
=======
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
>>>>>>> eb177cad61840e412ac69416858f6e4635ed4aca

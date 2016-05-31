@extends('layout.default')
@section('content')
    <div class="col-md-12">
        <div class="form-group">
            {!!
    Form::open(array('url' => route('get.product-list'), 'method' => 'GET'))
    !!}
        </div>

        <div class="form-group">
            <label class="control-label">Choose category: </label>
            {!!
            Form::select('category_id', array('' => 'Select Category') +$category,[],array('id' => 'category_id'),
            ['class' => 'form-control',
            'id' => 'category_id',
            'name'=>'category_id'
            ])
             !!}
        </div>

        <div class="form-group">
            <label class="control-label">Choose sub-category: </label>
            {!!

            Form::select('subcategory_id', array('' => 'Select Sub-Category') + $subCategory,[],array('id' => 'subcategory_id'),

            Form::select('subcategory_id', array('' => 'Select Sub-Category') ,array('id' => 'subcategory_id'),

            ['class' => 'form-control',
            'id' => 'subcategory_id',
            'name'=>'subcategory_id'
             ])
             !!}
        </div>

        <div class="form-group">
            <button type="submit" class=".btn btn-info">Filter</button>
        </div>
        <div>

            {!! Form::close() !!}
        </div>

</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Price</th>
                <th>Action</th>
                </tr>
                @foreach($productInfos as $productInfo)
                <tr><td>{{$productInfo->product_name}}
                <td>{{$productInfo->category_name }}</td>
                <td>{{$productInfo->subcategory_name }}</td>
                <td>{{$productInfo->price }}</td>
                    <td> <a href="{{route('get.products-edit',$productInfo->product_id)}}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    <a class="btn btn-default" href="{{route('product.manage-image',$productInfo->product_id)}}">Manage Image</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>



    @endsection


@section('script')

    <script>

        $(document).ready(function() {
            $("#category_id").change(function () {
                var countryId = $("#category_id").val();
                $.ajax({
                        method: 'get',
                        data: {
                            subcategory_id: countryId
                        },
                        url: '{{route("get.subcategory-list")}}',
                        success: function (data) {
                            //console.log(data);
                            $('#subcategory_id').html(data);
                             console.log('hhhjngkn');
                        }
                    });
                });
            });





    </script>


@endsection








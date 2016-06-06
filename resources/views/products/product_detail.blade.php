@extends('layout.default')
@section('content')
    <div class="col-md-12">
        <div class="form-group">
            @if(Session::has('flash_message'))
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
            @endif
            {!!
    Form::open(array('url' => route('get.product-list'), 'method' => 'GET'))
    !!}
        </div>

        <div class="form-group col-md-3">
            <label class="control-label">Choose category: </label>
            {!!
            Form::select('category_id', array('' => 'Select Category') +$category,[$cat],['id' => 'category_id','class' => 'form-control',
            'name'=>'category_id'
            ])
             !!}
            </div>

             <div class="form-group col-md-3">
            <label class="control-label">Choose sub-category: </label>
            {!!
             Form::select('subcategory_id', array('' => 'Select Sub-Category')+$subCategory,[$sub],
             ['class' => 'form-control',
            'id' => 'subcategory_id',
            'name'=>'subcategory_id'
             ])
             !!}
             </div>
        <div class="col-md-2">
            <br>
        {!! Form::button('filter',
               [
               'class'=>'.btn btn-info form-control',
               'type'=>'submit'
               ])
               !!}
            </div>

                 {!! Form::close() !!}

</div>


        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th style="width: 200px">Action</th>
                </tr>
                @foreach($productInfos as $productInfo)
                <tr><td>{{$productInfo->product_name}}
                <td>{{$productInfo->category_name }}</td>
                <td>{{$productInfo->subcategory_name }}</td>
                    <td>{{$productInfo->quantity }}</td>
                <td>{{$productInfo->price }}</td>
                   <td> <a class="btn btn-default"  href="{{route('get.products-edit',$productInfo->product_id)}}">
                           Edit
                        </a>
                    <a class="btn btn-default" href="{{route('product.manage-image',$productInfo->product_id)}}">Manage Image</a></td>
                </tr>
                @endforeach
            </table>

           <div align="center"> {!!  $productInfos->render() !!}  </div>
        </div>




    @endsection


@section('script')

    <script>

        $(document).ready(function() {
            $("#category_id").change(function () {
                var categoryId = $("#category_id").val();
                $.ajax({
                        method: 'get',
                        data: {
                            category_id: categoryId
                        },
                        url: '{{route("get.subcategory-list")}}',
                        success: function (data) {
                            //console.log(data);
                            $('#subcategory_id').html(data);
                             //console.log('hhhjngkn');
                        }
                    });
                });
            });





    </script>


@endsection








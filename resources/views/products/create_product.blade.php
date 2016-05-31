@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

            <div class="panel-heading">Add product</div>
            <div class="form-group">
                {!!
        Form::open(array('url' => route('product.store'), 'method' => 'POST'))
        !!}
            </div>

            <div class="form-group">
                <label class="control-label">Product Name: </label>
                {!! Form::text('product_name', null,
                ['class' => 'form-control',
                 'placeholder' => 'Enter product name'])
                 !!}
            </div>

            <div class="form-group">
                <label class="control-label">Choose category: </label>
                {!!
                Form::select('category_id', array('' => 'Select Category') +$category,array('id' => 'category_id'),
                ['class' => 'form-control',
                'id' => 'category_id',
                ])
                 !!}
            </div>

            <div class="form-group">
                <label class="control-label">Choose sub-category: </label>
                {!!
                Form::select('subcategory_id', array('' => 'Select Sub-Category'),array('id' => 'subcategory_id'),
                ['class' => 'form-control',
                'id' => 'subcategory_id',
                 ])
                 !!}
            </div>

            <div class="form-group">
                <label class="control-label">price: </label>
                {!! Form::text('price', null,
                 ['class' => 'form-control',
                 'placeholder' => 'Enter price']) !!}
            </div>

            <div class="form-group">
                <label class="control-label">Quantity: </label>
                {!! Form::text('quantity', null,
                ['class' => 'form-control',
                 'placeholder' => 'Enter the quantity'])
                  !!}
            </div>

            <div class="form-group">
                <label class="control-label">Discount: </label>
                {!! Form::text('discount', null,
                ['class' => 'form-control',
                 'placeholder' => 'Enter the discount'])
                  !!}
            </div>


            <div class="form-group">
                <label class="control-label">Product Description: </label>
                {!! Form::textarea('product_description', null,
                ['class' => 'form-control',
                 'placeholder' => 'Enter the description'])
                  !!}
            </div>

            <div class="form-group">
                {{
                Form::submit('Submit'),
                ['class' =>'form-control',
                'type' => 'button']
                }}
            </div>
            <div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>


@endsection

@section('script')

<script>

    $(document).ready(function(){
        $("#category_id").change(function(){
            alet('h');
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
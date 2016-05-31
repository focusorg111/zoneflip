@extends('layout.default')
@section('content')
    <div>

        <form action="{{route('product.upload-image')}}"
              class="dropzone"
              id="my-awesome-dropzone" name="file">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="product_id" type="hidden" value="{{$product_id}}">
        </form>
    </div>
    <div>
            @foreach($productImages as $productImage)
                        <div class="col-md-3">
                        <img src='{{asset('assets/product_image/'.$productImage->product_image)}}' width="150" height="150">
                        <a class="btn btn-default" href="{{route('product.main-image',$productImage->image_id)}}">Make Main Image</a>
                        </div>
                @endforeach
    </div>
@endsection
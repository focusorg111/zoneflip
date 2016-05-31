@extends('layout.default')
@section('content')
    <div>
    <label class="text-size">Manage Images for {{$products->product_name}}</label>
    </div>
    <br>
    <br>
    <div>
        <form action="{{route('product.upload-image')}}"
              class="dropzone"
              id="my-awesome-dropzone" name="file">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="product_id" type="hidden" value="{{$product_id}}">
        </form>
    </div>
    <br>
    <br>
    <div>
            @foreach($productImages as $productImage)
                        <div class="col-md-3">
                        <img src='{{asset('assets/product_image/'.$productImage->product_image)}}' width="200" height="200">
                            <br>
                            <br>
                            @if($productImage->is_main_image==1)
                                <a class="btn btn-success" href="{{route('product.main-image')}}?type=2&product_id={{$productImage->product_id}}&image_id={{$productImage->image_id}}">Remove Main Image</a>
                            @else
                                <a class="btn btn-success" href="{{route('product.main-image')}}?type=1&product_id={{$productImage->product_id}}&image_id={{$productImage->image_id}}">Make Main Image</a>
                                @endif
                            <a class="btn btn-danger" href="{{route('product.main-image')}}?type=0&product_id={{$productImage->product_id}}&image_id={{$productImage->image_id}}">Delete</a>
                        </div>
                @endforeach
    </div>
@endsection
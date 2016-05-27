@extends('layout.default')
@section('content')
    <div>

        <form action="{{route('product.upload-image')}}"
              class="dropzone"
              id="my-awesome-dropzone" name="file">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
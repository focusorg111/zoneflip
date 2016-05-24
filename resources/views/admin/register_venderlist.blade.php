@extends('layout.default')
@section('content')
    <div class="col-md-12">
    <div class="col-md-6">
        <select class="drop">
            <option value="" disabled="disabled" selected="selected">Please select</option>
            <option value="1">Is Approved</option>
            <option value="2">pending approved</option>
        </select>
    </div>
    </div>
    @endsection
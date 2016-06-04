
@if(Session::has('flash_message'))
    <div class="alert {!! session('flash_type')!!}"><em> {!! session('flash_message') !!}</em></div>
@endif
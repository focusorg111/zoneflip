@extends('layout.default1')
@section('content')
<br>
<br>
<br>
<br><br>
<br>
<div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" >
                @include('common.messages')
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" action="{{route('admin.login')}}" method="post" id="login-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="form-group @if($errors->has('user_name')) has-error @endif">
                                <input class="form-control" placeholder="E-mail"  value="{{old('user_name')}}" name="user_name"  autofocus="">
                                @if($errors->has('user_name'))
                                    <div class="form-group">
                                        <div class="cols-sm-10 required">{{ $errors->first('user_name') }}</div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                @if($errors->has('password'))
                                    <div class="form-group">
                                        <div class="cols-sm-10 required">{{ $errors->first('password') }}</div>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary" id="button">Login</button>
                            <a href="register">Register</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
<br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
<br>
<br>
<br>
<br>

    @endsection
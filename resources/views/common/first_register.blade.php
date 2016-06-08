@extends('layout.default1')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Register User</div>
                <div class="panel-body">
                    <form role="form">

                        <fieldset>
                            <div class="form-group">
                                <a class="btn btn-default btn-lg btn-block" href="{{route('seller.register')}}">Register As Seller</a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-default btn-lg btn-block">Register As User</a>
                                </a>
                            </div>
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
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
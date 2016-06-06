<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/myform.css')}}" rel="stylesheet">

    <!--Icons-->
    <script src="{{asset('assets/js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                @include('common.messages')
                <form role="form" action="{{route('admin.login')}}" method="post" id="login-form">
                    @include('common.messages')
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



<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>
</html>

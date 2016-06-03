<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

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



<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/chart-data.js')}}"></script>
<script src="{{asset('assets/js/easypiechart.js')}}"></script>
<script src="{{asset('assets/js/easypiechart-data.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/myform.css')}}">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Registration</title>
</head>
<body>



<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Seller Registration</h1>
            </div>
        </div >
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        @endif
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="{{route('seller.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">First Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('first_name')) has-error @endif">
                            <input type="text" class="form-control textbox-size" name="first_name" id="first_name" value="{{old('first_name')}}"  placeholder="Enter your first name"/>
                        </div>
                            @if($errors->has('first_name'))
                            <div class="input-group">
                                    <div class="cols-sm-10 required">{{ $errors->first('first_name') }}</div>
                                </div>
                            @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Last Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('last_name')) has-error @endif">
                            <input type="text" class="form-control textbox-size" name="last_name" id="last_name"  value="{{old('last_name')}}" placeholder="Enter your last name"/>
                        </div>
                        @if($errors->has('last_name'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('last_name') }}</div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('user_name')) has-error @endif">
                            <input type="text" class="form-control textbox-size" name="user_name" id="user_name" value="{{old('user_name')}}" placeholder="Enter your email"/>
                        </div>
                        @if($errors->has('user_name'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('user_name') }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('password')) has-error @endif">
                            <input type="password" class="form-control textbox-size" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                        @if($errors->has('password'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('password') }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('confirm_password')) has-error @endif">
                            <input type="password" class="form-control textbox-size"  name="confirm_password" id="confirm_password"  placeholder="Confirm your Password"/>
                        </div>
                        @if($errors->has('confirm_password'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('confirm_password') }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Company Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group  @if($errors->has('company_name')) has-error @endif">
                            <input type="text" class="form-control textbox-size" name="company_name" id="company_name" value="{{old('company_name')}}"  placeholder="Enter company name"/>
                        </div>
                        @if($errors->has('company_name'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('company_name') }}</div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Address</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('address')) has-error @endif">
                            <input type="textarea" class="form-control textbox-size" name="address" id="address"  value="{{old('address')}}" placeholder="Address"/>
                        </div>
                        @if($errors->has('address'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('address') }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Contact no.</label>
                    <div class="cols-sm-10">
                        <div class="input-group @if($errors->has('contact_no')) has-error @endif">
                            <input type="text" class="form-control textbox-size" name="contact_no" id="contact_no"  value="{{old('contact_no')}}" placeholder="Contact no"/>
                        </div>
                        @if($errors->has('contact_no'))
                            <div class="input-group">
                                <div class="cols-sm-10 required">{{ $errors->first('contact_no') }}</div>
                            </div>
                        @endif
                    </div>
                </div>



                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>
                <div class="login-register">
                    <a href="{{route('login')}}">Login</a>
                </div>
            </form>

        </div>
    </div>
</div>


<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>
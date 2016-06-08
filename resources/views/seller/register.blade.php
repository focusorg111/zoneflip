@extends('layout.default1')
@section('content')

        <!-- Website CSS style -->

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style1.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/myform.css')}}">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

<div class="row">
        <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Seller Registration</h1>
                </div>
            </div >
            <div class="main-login main-center">
                @include('common.messages')
                <form class="form-horizontal" method="post" action="{{route('seller.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name" class="cols-sm-2">First Name</label>
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
                        <label for="name" class="cols-sm-2">Last Name</label>
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
                        <label for="username" class="cols-sm-2">Email</label>
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
                        <label for="password" class="cols-sm-2">Password</label>
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
                        <label for="confirm" class="cols-sm-2">Confirm Password</label>
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
                        <label for="confirm" class="cols-sm-2">Company Name</label>
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
                        <label for="confirm" class="cols-sm-2">Address</label>
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
                        <label for="confirm" class="cols-sm-2">Contact no.</label>
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
</div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


@endsection
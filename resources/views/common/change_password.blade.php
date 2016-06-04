@extends('layout.default')
@section('content')
    <div class="row" align="center">
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        @endif
        <form action="{{route('update.change.password')}}" method="post" id="change-password-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label class="text-size">Change Password</label>
            </div>
            <div class="panel panel-width">

                <div class="form-group @if($errors->has('current_password')) has-error @endif">
                    <label>Current Password</label>
                    <input name="current_password" type="password" class="form-control text-width" value="{{old('current_password')}}">
                    @if($errors->has('current_password'))
                        <div class="input-group">
                            <div class="cols-sm-10 required">{{ $errors->first('current_password') }}</div>
                        </div>
                    @endif
                </div>



                <div class="form-group @if($errors->has('new_password')) has-error @endif">
                    <label >New Password</label>
                    <input name="new_password" type="password" class="form-control text-width" value="{{old('new_password')}}">
                    @if($errors->has('new_password'))
                        <div class="input-group">
                            <div class="cols-sm-10 required">{{ $errors->first('new_password') }}</div>
                        </div>
                    @endif

                </div>



                <div class="form-group @if($errors->has('confirm_password')) has-error @endif">
                    <label>Confirm Password</label>
                    <input name="confirm_password" type="password" class="form-control text-width" value="{{old('confirm_password')}}">
                    @if($errors->has('confirm_password'))
                        <div class="input-group">
                            <div class="cols-sm-10 required">{{ $errors->first('confirm_password') }}</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-success" id="chngepas-button">Save Changes</button>
                    <a  class="btn btn-default" href="{{route('get.venderlist')}}">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection
{{--@section('script')
    <script>
        $(function() {
            $('#chngepas-button').click(function () {
                $("#change-password-form").validate({
                    rules: {
                        current_password: {
                            required: true,
                            minlength: 6,
                        },
                        new_password: {
                            required: true,
                            minlength: 6,
                        },
                        confirm_password: {
                            required: true,
                            minlength: 6,
                        }
                    },
                    messages: {
                        current_password: {
                            required: "Please enter current password",
                            minlength: "Password must be at least 6 characters",
                        },
                        new_password: {
                            required: "Please enter new password",
                            minlength: "Password must be at least 6 characters",
                        },
                        confirm_password: {
                            required: "Please enter confirm password",
                            minlength: "Password must be at least 6 characters",
                        }

                    }
                });
            });
        });
    </script>--}}

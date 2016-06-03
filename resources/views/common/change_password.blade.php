@extends('layout.default')
@section('content')
    <div class="row" align="center">
        <form action="{{route('update.change.password')}}" method="post" id="change-password-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label class="text-size">Change Password</label>
            </div>
            <div class="panel panel-width">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                @endif
                @include('common.messages')
                <div class="form-group">
                    <label>Current Password</label>
                    <input name="current_password" type="password" class="form-control text-width">
                </div>
                <div class="form-group">
                    <label >New Password</label>
                    <input name="new_password" type="password" class="form-control text-width">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input name="confirm_password" type="password" class="form-control text-width">
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-success" id="chngepas-button">Save Changes</button>
                    <button  class="btn btn-default">Cancel</button>
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

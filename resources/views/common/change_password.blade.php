@extends('layout.default')
@section('content')
    <div class="row" align="center">
      @include('common.messages')
        <form action="{{route('update.change.password')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label class="text-size">Change Password</label>
            </div>
            <div class="panel panel-width">
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
                    <button  type="submit" class="btn btn-success">Save Changes</button>
                    <button  class="btn btn-default">Cancel</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@extends('layout.default')
@section('content')
    <div class="col-md-12">
    <div class="col-md-6">
        <select class="drop">
            <option value="" disabled="disabled" selected="selected">Please select</option>
            <option value="1">Is Approved</option>
            <option value="2">Pending Approved</option>
        </select>
        <button type="submit" class=".btn btn-info">Filter</button>
    </div>
        <div class="row">
            <table class="table table-bordered">
                <th>Full Name</th>
                <th>Company Name</th>
                <th>Register Date</th>
                <th>Actions</th>
                @foreach($users as $user)
                    <tr><td>{{$user->full_name}}</td>
                    <td>{{$user->company_name}}</td>
                    <td>{{$user->register_date}}</td>
                    <td><button class="btn btn-info seller-detail" data-url="{{route('get.registerdetail',$user->user_id)}}" data-toggle="modal" data-target="#myModal" data-user-type="{{$user->user_id}}">Detail</button>

                        <button class="btn btn-success check_approve" data-toggle="modal" data-target="#myModalApprove" data-user-type="{{$user->user_id}}" data-user-name="{{$user->full_name}}">Approve</button></td></tr>
                    @endforeach
            </table>
            <div align="center">
                {!! $users->render() !!}
            </div>

        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Seller Detail</h4>
                </div>
                <div class="modal-body">
                <div class="show-detail"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="myModalApprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Approve</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve <span class="show_name"></span>?
                    <div class="modal-footer">
                        <form  action="{{route('check.approve')}}" method="post">
                            <input name="user_id" type="hidden" id="user-id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-success">OK</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
@section('script')
<script>
               $(document).ready(function(){
                    $(".seller-detail").click(function(){
                        var value=$(this).attr('data-url');
                        console.log(value);
                        $.ajax( {
                            method:'get',

                            url :value ,
                            success:     function(data) {
                                $('.show-detail').html(data)
                            }
                        });
        });
    });

               $(document).ready(function() {
                   $(".check_approve").click(function () {
                       var id=$(this).attr('data-user-type');
                       var name=$(this).attr('data-user-name');
                       $('#user-id').val(id);
                      var val= $('.show_name').html(name);
                   });
               });
</script>


    @endsection
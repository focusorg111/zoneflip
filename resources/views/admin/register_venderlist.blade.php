@extends('layout.default')
@section('content')
    <div class="col-md-12">
        <form method="get" action="{{route('get.venderlist')}}">
            <div class="col-md-3">
        <select class="form-control" name="approved_status">
            <option value="0"
                    @if($status==0)
                    selected="selected"
                    @endif
                    >Pending Approved</option>
            <option value="1"
                    @if($status==1)
                    selected="selected"
                    @endif
                    >Approved</option>
            <option value="2"
                    @if($status==2)
                    selected="selected"
                    @endif
                    >Rejected</option>

        </select>
                </div>
            <div class="col-md-2">
        <button type="submit" class=".btn btn-info form-control">Filter</button>
                </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                <th>Full Name</th>
                <th>Company Name</th>
                <th>Register Date</th>
                <th style="width: 200px">Actions</th>
                </tr>
                @if(count($users))
                @foreach($users as $user)
                        <tr><td>{{$user->full_name}}</td>
                        <td>{{$user->company_name}}</td>
                        <td>{{$user->register_date}}</td>
                            <td><button class="btn btn-info seller-detail" data-url="{{route('get.registerdetail',$user->user_id)}}" data-toggle="modal" data-target="#myModal" data-user-type="{{$user->user_id}}">Detail</button>
                    @if($user->is_approved!= \Config::get('constants.VENDOR_STATUS.APPROVE'))
                            <button class="btn btn-success check_approve" data-toggle="modal" data-target="#myModalApprove" data-status-type="{{\Config::get('constants.VENDOR_STATUS.APPROVE')}}" data-user-type="{{$user->user_id}}" data-user-name="{{$user->full_name}}">Approve</button></td></tr>
                    @else
                        <button class="btn btn-success check_approve" data-toggle="modal" data-target="#myModalApprove" data-status-type="{{\Config::get('constants.VENDOR_STATUS.REJECTED')}}" data-user-type="{{$user->user_id}}" data-user-name="{{$user->full_name}}">Reject</button></td></tr>
                    @endif
                @endforeach
                @else
                    <tr>
                       <td colspan="4" align="center"> <text class="text-size">Data not found</text></td>
                    </tr>
                @endif
            </table>
            <div align="center">
                {!! $users->appends(['approved_status' => $status])->render() !!}
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
                    <h4 class="modal-title" id="myModalLabel1"></h4>
                </div>
                <div class="modal-body" id="change-body">


                </div>
                <div class="modal-footer">
                    <form  action="{{route('check.approve')}}" method="post">
                        <input name="user_id" type="hidden" id="user-id">
                        <input name="vendor_status" type="hidden" id="vender_status">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-success show-button1" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>

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
                      var status =$(this).attr('data-status-type');
                       var id=$(this).attr('data-user-type');
                       var name=$(this).attr('data-user-name');
                        $('#user-id').val(id);
                        $('#vender_status').val(status);
                       var val= $('.show_name').html(name);
                       if($(this).attr('data-status-type')==1){
                           $('#myModalLabel1').html('Approve');
                           $('#change-body').html('Are you sure you want to approve '+ name);
                           $(".show-button1").val('Approve');

                       }
                       else
                       {
                           $('#myModalLabel1').html('Reject');
                           $('#change-body').html('Are you sure you want to reject '+ name);
                            $('.show-button1').val('Reject');
                       }

                   });
               });

</script>


    @endsection
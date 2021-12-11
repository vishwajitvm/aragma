@extends('admin.admin_master')
@section('admin')
@php
    $prefix = Request::route()->getprefix() ;
    $route = Route::current()->getName() ;
@endphp
{{-- @dd($route) ; check which prefix is calling now   --}}


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
  

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
 

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> User Requests</h3>
                <a href=" {{ route('users.add') }} " class="btn btn-rounded btn-success md-5" style="float: right"> Add User </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>user name</th>
                              <th>user email</th>
                              <th>phone number</th>
                              <th> alternative number </th>
                              <th> party name </th>
                              <th  width="10%"> user contribution </th>
                              <th  width="15%">user special message  </th>
                              <th> status </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($userRequestData as $key => $user)
                          <tr>
                              <td> {{$key+1}} </td>
                              <td> {{$user->user_party_request_username}} </td>
                              <td> {{$user->user_party_request_useremail}} </td>
                              <td>  {{ $user->user_party_request_userphoneno1 }} </td>
                              <td> {{ $user->user_party_request_userphoneno2 }}  </td>
                              <td> {{ $user->request_party_name }} </td>
                              <td> {{$user->user_party_contribution}} </td>
                              <td> {{ Str::limit($user->party_request_special_message, 250) }} </td>

                              @if ($user->user_party_request_status == null)
                                  <td> <a href=" {{ route('partyrequest.userpartystatus' ,$user->id ) }}"><span class="badge badge-lg badge-info" style="background: rgb(99, 85, 85)">Pending</span></a> </td>
                              @elseif ($user->user_party_request_status == 'approve')
                              <td> <a href="{{ route('partyrequest.userpartystatus' ,$user->id ) }} " ><span class="badge badge-lg badge-info" style="background: green"> Approved</span></a> </td>
                              @else
                                  <td> <a href="{{ route('partyrequest.userpartystatus' ,$user->id ) }} " ><span class="badge badge-lg badge-info" style="background: rgb(243, 72, 4)"> Rejected </span></a> </td>
                              @endif
                              
                              <td>
                                <a class="btn btn-info" href="{{ Route('partyrequest.viewuserprofiles' ,$user->id ) }} ">View Profile</a>
                                {{-- &nbsp;&nbsp; --}}
                                {{-- <a class="btn btn-danger" href=" {{Route('adminparty.delete',$user->id)}}" id="delete">Delete</a> --}}
                              </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->



@endsection

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
                <h3 class="box-title"> @if ($route == 'adminparty.upcomingparty')
                    Upcoming

                @elseif($route == 'adminparty.passedparty')
                Passed
                @else
                    All
                @endif Party List</h3>
                <a href=" {{ route('users.add') }} " class="btn btn-rounded btn-success md-5" style="float: right"> Add User </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>party_hosted_by</th>
                              <th>party_name</th>
                              <th>party_description</th>
                              <th> Party date start </th>
                              <th> Party date End </th>
                              <th> City </th>
                              <th>Party status  </th>
                              <th> View In detail </th>
                              <th width="15%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($partyData as $key => $user)
                          <tr>
                              <td> {{$key+1}} </td>
                              <td> {{$user->party_hosted_by}} </td>
                              <td> {{$user->party_name}} </td>
                              <td>  {{ Str::title(Str::limit($user->party_description, 200)) }} </td>
                              {{-- <td> {{ $user->party_starting_date }}  </td> --}}
                              <td> {{ date('jS F, Y' , strToTime($user->party_starting_date)) }}  </td>

                              <td> {{ date('jS F, Y' , strToTime($user->party_ending_date)) }} </td>
                              <td> {{$user->party_city}} </td>

                              @if ($user->party_status == null)
                                  <td> <a href=" {{ route('adminparty.partystatus' ,$user->id ) }}  "><span class="badge badge-lg badge-info" style="background: rgb(99, 85, 85)">Pending</span></a> </td>
                              @elseif ($user->party_status == 'approve')
                              <td> <a href="{{ route('adminparty.partystatus' ,$user->id ) }} "><span class="badge badge-lg badge-info" style="background: green"> Approved</span></a> </td>
                              @else
                                  <td> <a href="{{ route('adminparty.partystatus' ,$user->id ) }} "><span class="badge badge-lg badge-info" style="background: rgb(243, 72, 4)"> Rejected </span></a> </td>
                              @endif

                              <td  style="float: right !important">
                                <a class="btn btn-success " href=" {{Route('adminparty.viewpartydetail',$user->id)}} ">View More</a>

                              </td>

                              
                              <td>
                                <!--button here-->
                                <a class="btn btn-info" href="{{ route('adminparty.edit' ,$user->id ) }} ">Edit</a>
                                &nbsp;&nbsp;
                                <a class="btn btn-danger" href=" {{Route('adminparty.delete',$user->id)}}" id="delete">Delete</a>

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

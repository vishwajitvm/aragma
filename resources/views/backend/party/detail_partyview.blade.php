@extends('admin.admin_master')
@section('admin')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
 

            <div class="col-12 col-lg-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Party Details </h4>
                    <a href=" {{ route('adminparty.edit' ,$dataEdit->id ) }} " class="btn btn-rounded btn-success md-5" style="float: right"> Edit the party </a>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            
                            <tbody>
                              <tr>
                                <th scope="row"> Party Hosted By</th>
                                <td> <b>{{ $dataEdit->party_hosted_by }}</b> </td>
                              </tr>

                              <tr>
                                <th scope="row" width="30%"> Party Name</th>
                                <td> {{ $dataEdit->party_name }} </td>
                              </tr>

                              <tr>
                                <th scope="row" width="30%"> Party Description</th>
                                <td> {{ $dataEdit->party_description }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party starting date</th>
                                <td> {{ $dataEdit->party_starting_date }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party ending date</th>
                                <td> {{ $dataEdit->party_ending_date }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party starting time</th>
                                <td> {{ $dataEdit->party_starting_time }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party ending time</th>
                                <td> {{ $dataEdit->party_ending_time }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party city</th>
                                <td> {{ $dataEdit->party_city }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party location </th>
                                <td> {{ $dataEdit->party_location }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party fees </th>
                                <td> {{ $dataEdit->party_fees }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Discount </th>
                                <td> {{ $dataEdit->party_discount }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party include </th>
                                <td> {{ $dataEdit->party_includes }} </td>
                              </tr>


                              <tr>
                                <th scope="row" width="30%"> Party status </th>
                                @if ($dataEdit->party_status == null)
                                  <td> <a href="{{ route('adminparty.partystatus' ,$dataEdit->id ) }}"><span class="badge badge-lg badge-info" style="background: rgb(99, 85, 85)">Pending</span></a> </td>
                              @elseif ($dataEdit->party_status == 'approve')
                              <td> <a href=" {{ route('adminparty.partystatus' ,$dataEdit->id ) }} "><span class="badge badge-lg badge-info" style="background: green"> Approved</span></a> </td>
                              @else
                                  <td> <a href="{{ route('adminparty.partystatus' ,$dataEdit->id ) }}"> <span class="badge badge-lg badge-info" style="background: rgb(243, 72, 4)"> Rejected </span> </a> </td>
                              @endif
                              </tr>
                              

                              
                            </tbody>
                          </table>
                      </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--col 1 end here -->


            <div class="row">
                <style>
                    .imgzoom{ width: 150px ; height:150px ; margin:2px ; transition: transform ease-out 0.8s; border: 1px solid white }
                    .imgzoom:hover{ transform: scale(2.5); border: 5px solid white }
                </style>
             <!--col 2 start here-->
             <div class="col-12 col-lg-4" >
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title"> Party Banner Images </h4>
                  </div>
                <!-- Default box -->
			  <div class="box bg-transparent no-shadow b-0">
				<div class="box-body">
					<div id="gallery-content">
                     
                 <div id="gallery-content-center">
                     <a  href="{{ url('upload/party_banner_img/'. $dataEdit->party_banner_image) }}"  data-toggle="lightbox" data-gallery="multiimages" data-title=" Party Banner images "><img src=" {{ url('upload/party_banner_img/'. $dataEdit->party_banner_image) }} "   alt=""  style="width: 90%">  </a>
					      </div>
					</div>
					</div>
				</div>            

                </div>
                <!-- /.box -->
             </div>

             <div class="col-12 col-lg-4" >
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title"> Party Gallry Images </h4>
                  </div>
                <!-- Default box -->
			  <div class="box bg-transparent no-shadow b-0">
				<div class="box-body">
					<div id="gallery-content">
                     @php
                     $imgData = explode('|' , $dataEdit->party_gallary_images)
                     @endphp
               @foreach ($imgData as $item)
                 <div id="gallery-content-center">
                     <a  href="{{ URL::to($item) }}"  data-toggle="lightbox" data-gallery="multiimages" data-title=" Party Banner images "><img src=" {{ URL::to($item) }}"  alt="" class="all studio imgzoom" >  </a>
					      </div>
               @endforeach
					</div>
					</div>
				</div>            

                </div>
                <!-- /.box -->
             </div>

              <!--col 2 start here-->
             <div class="col-12 col-lg-4">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title"> Party Video </h4>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    @php
                    $videoData = explode('|' , $dataEdit->party_gallary_videos)
                @endphp
                @foreach ($videoData as $item)
                    <video width="400" height="400"  controls>
                        <source src="{{ URL::to($item) }}" type="video/mp4">
                        <source src="{{ URL::to($item) }}" type="video/ogg">
                        Your browser does not support HTML video.
                      </video>
                @endforeach
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
             </div>


            </div>

            
            
        </div>
    


        </div>

    
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->

@endsection

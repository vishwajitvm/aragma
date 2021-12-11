@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!--Jqery ajax cdn -->

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      

        <!-- Main content -->
		<section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit Party's</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate method="POST" action=" {{Route('adminparty.update', $dataEdit->id) }} " enctype="multipart/form-data" > <!--form-->
                        {{-- {{Route('adminparty.store')}}  --}}
                        @csrf  
                         <div class="row">
                           <div class="col-12">	

                            

                            <!--row Stared here-->
                            <div class="row">
                                
                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        {{-- <h5>Party Hosted By<span class="text-danger">*</span></h5> --}}
                                        <div class="controls">
                                            <input type="text" name="party_hosted_by" value=" {{ $user->name }} " required  class="form-control"   aria-invalid="false" hidden> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="party_name" value=" {{ $dataEdit->party_name }} "  class="form-control"   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->


                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5>Party Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="party_description"  class="form-control"    cols="30" rows="8">{{ $dataEdit->party_description }}</textarea>
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->


                                <div class="col-md-6"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Starting Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="party_starting_date"  class="form-control" value={{ $dataEdit->party_starting_date }}   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->


                                <div class="col-md-6"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Ending Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="party_ending_date"  class="form-control" value={{ $dataEdit->party_ending_date }}    aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->


                                <div class="col-md-6"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Starting Time <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="time" name="party_starting_time"  class="form-control" value= {{ $dataEdit->party_starting_time }}    aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-6"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Ending Time <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="time" name="party_ending_time"  class="form-control" value= {{ $dataEdit->party_ending_time }}   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <style>
                                    ::-webkit-calendar-picker-indicator {
                                        filter: invert(1);
                                    }
                                </style>

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party City <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="party_city"  class="form-control" value=" {{ $dataEdit->party_city }} "   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Location <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="party_location"  class="form-control" value=" {{ $dataEdit->party_location }} "   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party Fees <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="party_fees"  class="form-control" value=" {{ $dataEdit->party_fees }} "   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5> Party  Discount  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="party_discount"  class="form-control" value=" {{ $dataEdit->party_discount }} "   aria-invalid="false"> 
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <!--check box start here -->
                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <div class="box-body">

                                            <div class="demo-checkbox">
                                                @php
                                                    $data = explode(',' , $dataEdit->party_includes) ;
                                                @endphp
                                                
                                                @foreach ($includeinparty as $item)

                                                @if (in_array($item , $data))
                                                <input type="checkbox" id="{{$item}}" name="party_includes[]" checked value="{{ $item }}" class="filled-in chk-col-success"  />
                                                <label for="{{ $item }}"> {{ $item }} </label>
   
                                                @else
                                                <input type="checkbox" id="{{$item}}" name="party_includes[]" value="{{ $item }}" class="filled-in chk-col-success"  />
                                                <label for="{{ $item }}"> {{ $item }} </label>

                                                @endif

                                                {{-- <input type="checkbox" id="{{$item}}" name="party_includes[]" value="{{ $item }}" class="filled-in chk-col-success"  />
                                                <label for="{{ $item }}"> {{ $item }} </label> --}}
                                                @endforeach


                                            </div>
                        
                                        </div>
                        
                                    </div>
                                </div><!--col-6 Ended here-->

                                <!--check box endup here-->
                               
                            </div>
                            <!--row Ended here-->
                           </div>
                         </div>


                              <!--row Stared here-->
                            <div class="row">

                                <!--col-6 stared here-->
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        {{-- <label class="col-form-label col-lg-2">Custom BS file input</label> --}}
                                        <div class="col-md-12">
                                            <h5>Choose Banner Image For Party </h5>
                                            <div class="custom-file">
                                                <input type="file" name="party_banner_image"  class="form-control " accept="image/png, image/gif, image/jpeg"   id="party_banner_image">

                                                
                                            </div>
                                        </div>
                                    </div>
                                     <!--image display after selecting UISNG AJEX-->
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" accept="image/PNG, image/gif, image/JPEG"  src="{{ (!empty($dataEdit->party_banner_image))?url('upload/party_banner_img/'.$dataEdit->party_banner_image):url('upload/no_image.jpg') }}" alt="" style="width: 200px;height:100px;border:2px solid black">
                                            {{-- <img src="" alt="" > --}}
                                    

                                        </div>
                                    </div>
                                
                                    <!--image display ended here-->

                                </div><!--col-6 Ended here-->
                                
                                <!--col-6 stared here-->
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h5>Choose Party Gallry Images </h5>
                                            <div class="custom-file">
                                                <input type="file" name="party_gallary_images[]"  multiple accept="image/png, image/jpeg" onchange="preview()" class="form-control subMachineImage"  id="file-input" >
                                                <p id="num-of-files" >No Files Chosen</p>

                                                    <div id="images" >
                                                        @if ($dataEdit->party_gallary_images  == true)
                                                        @php
                                                        $imgData = explode('|' , $dataEdit->party_gallary_images)
                                                    @endphp
                                                    @foreach ($imgData as $item)
                                                        <img src=" {{ URL::to($item) }} "  id="showImage" style="width: 120px ; height:120px"  alt="">
                                                    @endforeach
    
                                                        @endif
                                                    </div> <!--image diplay here--> <br> 
                                                
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--col-6 Ended here-->



                                <div class="col-md-12">
                                    <div class="form-group row">
                                        {{-- <label class="col-form-label col-lg-2">Custom BS file input</label> --}}
                                        <div class="col-md-12">
                                            <h5>Choose Party Gallary Videos </h5>
                                            <div class="custom-file">
                                                <input type="file" accept="video/*" name="party_gallary_videos[]" multiple class="form-control">

                                                @php
                                                $videoData = explode('|' , $dataEdit->party_gallary_videos)
                                            @endphp
                                            @foreach ($videoData as $item)
                                                <video width="200" class="spanVideoData" id="showvideo`" height="200" controls>
                                                    <source src="{{ URL::to($item) }}" type="video/mp4">
                                                    <source src="{{ URL::to($item) }}" type="video/ogg"> 
                                                    Your browser does not support HTML video.
                                                  </video> 
                                            @endforeach
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5>Party Status <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <select name="party_status" id="party_status" required  class="form-control">
                                                <option value="" selected="" disabled>-----Select Party Status-----</option>
                                                <option value={{null}} > On hold </option>
                                                <option value="approve" {{ $dataEdit->party_status == "approve" ? "Selected": "" }} >Approve</option>
                                                <option value="deny" {{ $dataEdit->party_status == "deny" ? "Selected": "" }} >Deny</option>

                                            </select>
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->

                            </div>
                            <!--row Ended here-->
                           
                           <br>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                               {{-- <button type="submit" class="btn btn-info btn-rounded mt-10">Submit</button> --}}

                           </div>
                       </form><!--form-->
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
           <!-- /.content -->

   
    
    </div>
</div>
<!-- /.content-wrapper -->


    <script>
    let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");
    let numOfFiles = document.getElementById("num-of-files");

    function preview(){
        imageContainer.innerHTML = "";
        numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        for(i of fileInput.files){
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload=()=>{
                let img = document.createElement("img");
                img.classList.add('multi-img')
                img.setAttribute("src",reader.result);
                figure.insertBefore(img,figCap);

            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }
</script>



<script type="text/javascript">
	$(document).ready(function(){
		$('#party_banner_image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection

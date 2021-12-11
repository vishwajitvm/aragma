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
                 <h4 class="box-title"> Aprove or deny the party status </h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate method="POST" action=" {{Route('adminparty.approveupdate', $dataEdit->id) }} " enctype="multipart/form-data" > <!--form-->
                        @csrf  
                         <div class="row">

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5>Party Status <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <select name="party_status" id="party_status" required  class="form-control">
                                                <option value="" selected="" disabled>-----Select Party Status-----</option>
                                                <option value={{null}}  > On hold </option>
                                                <option value="approve" {{ $dataEdit->party_status == "approve" ? "Selected": "" }} >Approve</option>
                                                <option value="deny" {{ $dataEdit->party_status == "deny" ? "Selected": "" }} >Deny</option>

                                            </select>
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->


                           
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

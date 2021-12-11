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
                 <h4 class="box-title">Party Request Status</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate method="POST" action=" {{ Route('partyrequest.updateuserstatus', $dataParty->id) }} " enctype="multipart/form-data" > <!--form-->
                        @csrf  
                              <!--row Stared here-->
                            <div class="row">

                                <div class="col-md-12"><!--col-6 stared here-->
                                    <div class="form-group">
                                        <h5>Party Status <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="user_party_request_status" id="user_party_request_status" required  class="form-control">
                                                <option value=""  selected="" disabled>---Party status---</option>
                                                <option value="approve" {{ $dataParty->user_party_request_status =='approve'?'selected':'' }}>Approved</option>
                                                <option value="deny" {{ $dataParty->user_party_request_status =='deny'?'selected':'' }}>Denyed</option>
                                                <option value="" {{ $dataParty->user_party_request_status == null?'selected':'' }}>No Response</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--col-6 Ended here-->
                                
                            </div>
                            <!--row Ended here-->
                           
                           <br><br>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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



<script type="text/javascript">
	$(document).ready(function(){
		$('#machine_image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection

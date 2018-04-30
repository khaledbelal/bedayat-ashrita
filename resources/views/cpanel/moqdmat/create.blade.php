@extends('layouts.stack')

@section('title')
    اضافة مقدمة
@endsection
  
 @section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/dropzone/basic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/dropzone/dropzone.min.css') }}">
 
@endsection
 
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/forms/selects/select2.rtl.css') }}">
@endsection


@section('content') 
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul> 
                        </div>
                    </div>

					<div class="card-block">
	                    <div class="row upload">
	                        <div class="col-xl-12 col-lg-12 col-md-12  "> 
			        			<form class="form-horizontal dropzone border border-primary" id='dropzone'  method="POST" action="{{ route('cpanel-upload-moqdma') }}" enctype="multipart/form-data">
							    	<input name="file" class="d-none" type="file" multiple /> 
							    	<input type="hidden" name="hid_patient" id="hid_patient" >
					                {{ csrf_field() }} 
					            </form>  
			 				</div>
		 				</div>
	 				</div> 
                </div>
            </div>
        </div>
    </div>
</section>

<section id="uploaded-section" >
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul> 
                        </div>
                    </div>
	                 	
					<form class="form-horizontal" method="post" action="{{ route('cpanel-store-moqdma') }}">
						<div class="card-block">
		                    <div class="row">
		                    	<div class="col-xl-4 col-lg-12 col-md-12">  
		                    		<fieldset class="form-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                                    <label for="sheikh_id">للشيخ :</label>
			                    		<select class="form-control select2"  onchange="$('.sheikh_id').val(this.value);">
			                    			<option value="">اختر</option>
			                    			@foreach($sheikhs as $sheikh)
			                    				<option value="{{ $sheikh->id }}">{{$sheikh->name}}</option>
			                    			@endforeach
			                    		</select>
			                    	</fieldset>
		                    	</div>
		                    </div>
		                    <hr>
			 				<div class="row moqdmat-details">
			 					
			 				</div>
			 				<div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 mb-1"> 
                                	<button type="submit" class="btn btn-primary">اضافة <i class="ft-thumbs-up position-right"></i></button> 
					                {{ csrf_field() }} 
                                </div>
                            </div> 
		 				</div>
					</form>
            	</div>
            </div>
        </div>
    </div>
</section> 
@endsection

@section('page_vendor_js')  
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/forms/select/select2.full.min.js') }} " type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/dropzone/dropzone-amd-module.min.js') }} " type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/dropzone/dropzone.min.js') }} " type="text/javascript"></script>
@endsection

@section('page_level_js') 
<script src="{{ URL('/templates/stack/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>  
<script type="text/javascript">
	$('#uploaded-section').hide(); 
	function get_file(file_name,type) { 
		file_ext = file_name.split(".");

		if(type == 'ext')
			return file_ext[1];
		else if(type == 'name')
			return file_ext[0]; 
	} 
	var arr_files = []; 
	var myDropzone = new Dropzone("#dropzone"); 
	myDropzone.on("addedfile", function(file) {  
		if(get_file(file.name,"ext") !='mp3'){
			alert('الامتاداد '+get_file(file.name,"ext")+' غير متاح');
		 	myDropzone.removeFile(file);
		}
		else if(jQuery.inArray(file.name, arr_files) !== -1){
			alert('المقدمة '+get_file(file.name,"name")+' موجودة مسبقا .. يجب تغيير الاسم');
		 	myDropzone.removeFile(file);
		}
		else{
			arr_files.push(file.name);
		}
	});
 

	myDropzone.on("success", function(file) {
		$('#uploaded-section').show();
		$('.moqdmat-details').append('<div class="col-xl-4 col-lg-12 col-md-12 "><fieldset class="form-group"><label >اسم المقدمة :</label><input type="hidden" class="form-control" name="server_name[]" value="'+file.name+'"><input type="text" class="form-control" name="name[]" value="'+get_file(file.name,"name")+'" required autofocus></fieldset>	    	<fieldset class="form-group">	            <label>الشيخ :</label>	    		<select class="form-control sheikh_id" name="sheikh_id[]" required>        			<option value="">اختر</option>        			@foreach($sheikhs as $sheikh)        				<option value="{{ $sheikh->id }}">{{$sheikh->name}}</option>        			@endforeach        		</select>	    	</fieldset>	    	<fieldset class="form-group">	            <label >الوصف :</label> 	    		<textarea  class="form-control" name="description[]"></textarea>	    	</fieldset>		</div>'); 
	});

	/*myDropzone.options = {
		previewTemplate: document.querySelector('#template-container').innerHTML,
		// Specifing an event as an configuration option overwrites the default
		// `addedfile` event handler.
		addedfile: function(file) {
		file.previewElement = Dropzone.createElement(this.options.previewTemplate);
		// Now attach this new element some where in your page
		},
		thumbnail: function(file, dataUrl) {
		// Display the image in your file.previewElement
		},
		uploadprogress: function(file, progress, bytesSent) {
		alert(progress);
		}
		// etc...
	};*/
	$('#sheikh_id').select2({
	    placeholder: "اختر"
	});
</script>
@endsection


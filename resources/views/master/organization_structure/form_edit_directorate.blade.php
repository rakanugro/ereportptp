<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PT. Pelabuhan Tanjung Priuk</title>

	<link href="{{ URL::asset('templateslide/assets/css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('templateslide/assets/css/imagehover/imagehover.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('templateslide/assets/uikit/css/uikit.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('EliteAdmin/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

	<!-- metronic -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<link href="{{ URL::asset('metronic2/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('metronic2/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

	<link rel="shortcut icon" href="{{ URL::asset('metronic2/assets/demo/default/media/img/logo/favicon.ico') }}" />
	<!-- metronic -->

</head>

<style>
.uk-modal-dialog{
	margin-top:70px !important;
	width:900px !important;
	border-radius: 10px;
}
body{
	background-color: #283a5a;
}
</style>

<body>

	<div class="fl-main-container">
		<!---Header----------->
		<div class="fl-header fl-header-margin" uk-sticky>
			<div>
				<img src="{{ URL::asset('templateslide/assets/img/logo/ptpwhite.png') }}" class="fl-logo" onclick="location.href = '{{ url('dashboard')}}'">
				
				<span class="fl-title-logo">
					E-Reporting PT. Pelabuhan Tanjung Priok	
				</span>

				<span class="fl-menu-tool">
					<input type="button" class="uk-button uk-button-primary fl-button" value="menu" onclick="location.href = '{{ url('dashboard')}}'">
				</span>
			</div>	
		</div>

		<div class="fl-container">
			<div class="fl-title-page" >
				<span style="font-size:20px">				
					<img class="uk-preserve-width uk-border-circle" src="{{ URL::asset('templateslide/assets/img/icon/sopReadMore.png') }}" width="65" alt="">
					Edit Directorate
				</span>

				<div class="fl-table">
					<form id="form_blade" action="/master/save_directorate_edit" method="POST">
						{{ csrf_field() }}
						<div class="form-group m-form__group row">
							<input type="hidden" name="id" value='{{ $id }}'>
							<div class="col-lg-4">
								<label class="">
									Directorate Code:
								</label>
								<input name="directorate_code" id="directorate_code" class="uk-input uk-child-width-1-2" type="text" onchange="check_code()" placeholder="Directorate Code" value="{{$dircode}}" required>
								<div class="help-block with-errors" style="color:red;" id="error-directorate_code"></div>
								@if ($errors->has('directorate_code'))
								<span class="help-block">
									<strong>{{ $errors->first('directorate_code') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Directorate Name:
								</label>
								<input name="directorate_name" id="directorate_name" class="uk-input uk-child-width-1-2" type="text" value="{{$dirname}}" placeholder="Directorate Name" required>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Tipe Directorat:
								</label>
								<select class="form-control select2-list" name="is_cabang"   id="is_cabang" required>
									<option value="">--Pilih Tipe Directorat--</option>
									<option value="0" {{ $iscabang == "0" ? 'selected' : '' }}>PUSAT</option>
									<option value="1" {{ $iscabang == "1" ? 'selected' : '' }}>CABANG</option>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Status:
								</label>
								<select class="form-control select2-list" name="status"   id="status" required>
									<option value="">--Pilih Status--</option>
									<option value="Y" {{ $status == "Y" ? 'selected' : '' }}>AKTIF</option>
									<option value="N" {{ $status == "N" ? 'selected' : '' }}>INAKTIF</option>
								</select>
							</div>
						</div>
						<div>
							<br>
						</div>
						<div>
							<button class="uk-button uk-button-primary fl-button" type="submit">
								<i class="fa fa-plus"></i>&nbsp;Update
							</button>
							<button onclick="location.href = '{{ url('/master/organization_structurex')}}'" class="uk-button uk-button-danger fl-button float-right" type="button">Back</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="{{ URL::asset('metronic2/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('metronic2/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->   
<!--begin::Page Resources -->
<script src="{{ URL::asset('metronic2/assets/demo/default/custom/components/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
<!-- metronic -->
<script src="{{ URL::asset('templateslide/assets/datepicker/moment.min.js') }}"></script>
<script type="text/javascript">
	
	function save_edit_directorate(formid)
	    {   
			submit_form(formid);
		}

	function check_code()
	{
		var codedir = $('#directorate_code').val();
		$.ajax({
			type: "GET",
			url: "{{ url('/master/check-codedirectorat') }}",
			data: {codedir : codedir}, 
			cache: false,
			success: function(data){
				if(data == 0)
				{
					$('#directorate_code').parent('div').removeClass('has-error');
					$('#error-directorate_code').text('');
                      //$('#btn-submit').removeAttr('disabled', 'disabled');
                  }
                  else
                  {
                  	$('#directorate_code').parent('div').addClass('has-error');
                  	$('#error-directorate_code').text('Code Directorate '+codedir+' Sudah Ada !!!');
                  	$('#directorate_code').val('');
                  }
              }
          });
	}

	$(".select2-list").select2({
		allowClear: true
	});
</script>
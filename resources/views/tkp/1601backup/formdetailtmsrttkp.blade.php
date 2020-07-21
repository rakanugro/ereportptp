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
					Detail Master TKP
				</span>
			</div>
			
			<div class="fl-table">
				<form id="form_mst_tkp" action="/tkp/master_tkp_save_edit_indikator" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" id="id" value="{{ $id }}">
					<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Directorate:
								</label>
								<br>
								<select style="width: 70% !important;" class="form-control select2-list" id="directorat_list" name="directorat_list" disabled="disabled">
									<option value="">--Directorate--</option>
									@foreach($directorat_list as $org)
									 	@if( $org->DIRECTORATE_ID == $iddir)
											<option value="{{ $org->DIRECTORATE_ID }}-{{ $org->IS_CABANG }}" selected>{{ $org->DIRECTORATE_NAME }}</option>
										@else
											<option value="{{ $org->DIRECTORATE_ID }}-{{ $org->IS_CABANG }}">{{ $org->DIRECTORATE_NAME }}</option>
										@endif
									@endforeach
								</select>
							</div>
							<div class="col-lg-4">
								<label>
									Division/Branch Office:
								</label>
								<br>
								@if($iscabang == '1')
								<select style="width: 70% !important;" class="form-control select2-list" id="organize_struct_list" name="organize_struct_list" disabled="disabled">
									<option value="">--Division/Branch Office--</option>
									@foreach($datalist as $org)
									 	@if( $org->BRANCH_OFFICE_ID == $idbranch)
											<option value="{{ $org->BRANCH_OFFICE_ID  }}-1">{{ $org->BRANCH_OFFICE_NAME }}</option>
										@else
											<option value="{{ $org->BRANCH_OFFICE_ID  }}-1">{{ $org->BRANCH_OFFICE_NAME }}</option>
										@endif
									@endforeach
								</select>
								@else
								<select style="width: 70% !important;" class="form-control select2-list" id="organize_struct_list" name="organize_struct_list" disabled="disabled">
									<option value="">--Division/Branch Office--</option>
									@foreach($datalist as $org)
									 	@if( $org->DIVISION_ID == $iddiv)
											<option value="{{ $org->DIVISION_ID }}-0" selected>{{ $org->DIVISION_NAME }}</option>
										@else
											<option value="{{ $org->DIVISION_ID  }}-0">{{ $org->DIVISION_NAME }}</option>
										@endif
									@endforeach
								</select>
								@endif
							</div>
							<div class="col-lg-4">
								<label>
									Sub Division:
								</label>
								<br>
								<select style="width: 70% !important;" id="sub_division_list" class="form-control select2-list" name="sub_division_list" disabled="disabled">
									<option value="">--Sub Division--</option>
									@foreach($datalist2 as $subdivision)
										@if( $subdivision->SUB_DIVISION_ID == $idsubdiv)
											<option value="{{ $subdivision->SUB_DIVISION_ID }}-{{$subdivision->ORGANIZATION_STRUCTURE_ID}}" selected>{{ $subdivision->SUB_DIVISION_NAME }}</option>
										@else
											<option value="{{ $subdivision->SUB_DIVISION_ID }}-{{$subdivision->ORGANIZATION_STRUCTURE_ID}}">{{ $subdivision->SUB_DIVISION_NAME }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Indicator Name:
								</label>
								<input name="indicator_name" class="uk-input uk-child-width-1-2" type="text" value="{{ $nameindicator }}" placeholder="Indicator Name" disabled>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Satuan:
								</label>
								<input name="unit" class="uk-input uk-child-width-1-2" type="text" value="{{ $unit }}" placeholder="Satuan" disabled>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-7">
								<label>
									Tipe TKP:
								</label>
								<br>
								<select style="width: 85% !important;" id="tipetkp" class="form-control select2-list" name="tipetkp" disabled="disabled">
									<option value="ROE" {{ $tipetkp == "ROE" ? 'selected' : '' }}>ROE</option>
									<option value="ROI" {{ $tipetkp == "ROI" ? 'selected' : '' }}>ROI</option>
									<option value="Cash Ratio" {{ $tipetkp == "Cash Ratio" ? 'selected' : '' }}>Cash Ratio</option>
									<option value="Current Ratio" {{ $tipetkp == "Current Ratio" ? 'selected' : '' }}>Current Ratio</option>
									<option value="Collection Period" {{ $tipetkp == "Collection Period" ? 'selected' : '' }}>Collection Period</option>
									<option value="Inventory Turnover" {{ $tipetkp == "Inventory Turnover" ? 'selected' : '' }}>Inventory Turnover</option>
									<option value="TMS Terhadap TA" {{ $tipetkp == "TMS Terhadap TA" ? 'selected' : '' }}>TMS Terhadap TA</option>
									<option value="TATO" {{ $tipetkp == "TATO" ? 'selected' : '' }}>TATO</option>
									<option value="Operasional" {{ $tipetkp == "Operasional" ? 'selected' : '' }}>Operasional</option>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Target:
								</label>
								<input id="target" name="target" class="uk-input uk-child-width-1-2"  value="{{$target}}" type="text" placeholder="Target" disabled>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Bobot:
								</label>
								<input id="bobot" name="bobot" class="uk-input uk-child-width-1-2"  value="{{$bobot}}" type="text" placeholder="Bobot" disabled>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
									Formula:
								</label>
								<input id="formula" name="formula" class="uk-input uk-child-width-1-2"  value="{{$formula}}" type="text" placeholder="Formula" disabled>
							</div>
							<div class="col-lg-6">
								<label>
									Formula:
								</label>
								<textarea type="text"  class="form-control m-input" name="formula_alias" id="formula_alias"  disabled="disabled">{{$formulaalias}}</textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-7">
								<label>
									Status:
								</label>
								<br>
								<select style="width: 85% !important;" id="status" class="form-control select2-list" name="status" disabled="disabled" >
									<option value="Y" {{ $status == "Y" ? 'selected' : '' }}>AKTIF</option>
									<option value="N" {{ $status == "N" ? 'selected' : '' }}>INAKTIF</option>
								</select>
							</div>
						</div>
					
					<div>
						<br>
					</div>
					<div>
						<br>
					</div>
					<div>
						<br>
					</div>
					<div>
						<button onclick="location.href = '{{ url('tkp')}}'" class="uk-button uk-button-danger fl-button float-right" type="button">Back</button>
					</div>
					<div>
						<br>
					</div>
					<div>
						<br>
					</div><div>
						<br>
					</div>
					<div>
						<br>
					</div>
				</form>
			</div>

		</div>	
	</div>


<!-- metronic -->
<script src="{{ URL::asset('metronic2/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('metronic2/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->   
<!--begin::Page Resources -->
<script src="{{ URL::asset('metronic2/assets/demo/default/custom/components/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
<!-- metronic -->

<!-- <script src="{{ URL::asset('templateslide/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/uikit/js/uikit.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/datepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/datepicker/daterangepicker.js') }}"></script>

<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.marquee.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.pause.js') }}"></script>
<script src="{{ URL::asset('templateslide/assets/js/marquee/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('js/form-repeater.js') }}"></script>
<script src="{{ URL::asset('EliteAdmin/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script> -->
<script type="text/javascript">
	$(document).ready( function () {
		
		$("#formButton").click(function() {
			$("#form1").toggle();
		});

		$('#directorat_list').on('change', function(){
			var idgabungan = $(this).val();
			//alert(idgabungan);
			var pisah = idgabungan.split('-');
			var iddir = pisah[0];
			var iscbg = pisah[1];


			if(iscbg == 1)
			{
				$.get('{{ url('getdivbranch/getbranch') }}/'+iddir, function (data) {
					$('#organize_struct_list').empty();
					$('#organize_struct_list').append('<option value="">Pilih Branch Office</option>');
					$.each(data, function (index, element) {
						$('#organize_struct_list').append('<option value="'+ element.BRANCH_OFFICE_ID +'-'+'1'+'">'+ element.BRANCH_OFFICE_NAME +'</option>');
					});
					$("#organize_struct_list").select2({
						allowClear: true
					});
				});	
			}
			else
			{
				$.get('{{ url('getdivbranch/getdiv') }}/'+iddir, function (data) {
					$('#organize_struct_list').empty();
					$('#organize_struct_list').append('<option value="">Pilih Divisi</option>');
					$.each(data, function (index, element) {
						$('#organize_struct_list').append('<option value="'+ element.DIVISION_ID +'-'+'0'+'">'+ element.DIVISION_NAME +'</option>');
					});
					$("#organize_struct_list").select2({
						allowClear: true
					});
				});	
			}
			
		});

		$('#organize_struct_list').on('change', function(){
			var idgabungan = $(this).val();
			//alert(idgabungan);
			var pisah = idgabungan.split('-');
			var iddivbranch = pisah[0];
			var iscbg = pisah[1];


			if(iscbg == 1)
			{
				$.get('{{ url('getsubdiv/getsubdivbranch') }}/'+iddivbranch, function (data) {
					$('#sub_division_list').empty();
					$('#sub_division_list').append('<option value="">Pilih Sub Divisi</option>');
					$.each(data, function (index, element) {
						$('#sub_division_list').append('<option value="'+ element.SUB_DIVISION_ID +'-'+element.ORGANIZATION_STRUCTURE_ID+'">'+ element.SUB_DIVISION_NAME +'</option>');
					});
					$("#sub_division_list").select2({
						allowClear: true
					});
				});	
			}
			else
			{
				$.get('{{ url('getsubdiv/getsubdivdivisi') }}/'+iddivbranch, function (data) {
					$('#sub_division_list').empty();
					$('#sub_division_list').append('<option value="">Pilih Sub Divisi</option>');
					$.each(data, function (index, element) {
						$('#sub_division_list').append('<option value="'+ element.SUB_DIVISION_ID +'-'+element.ORGANIZATION_STRUCTURE_ID+'">'+ element.SUB_DIVISION_NAME +'</option>');
					});
					$("#sub_division_list").select2({
						allowClear: true
					});
				});	
			}
			
		});

	} );

	function showModal(){
		UIkit.modal("#mymodal").show();
	}

	function save_mst_sarmut(formid)
    {   
		submit_form(formid);
    }

    function plusplus(){
		var a = $("#exampleSelect11 option:selected").val();
		var b = $("#exampleSelect1 option:selected").val();
		var saatini = $("#formula").val();
		if(saatini.includes(b)){
			alert('Sub Indicator telah Ada.');
		}else{
			$("#formula").val(saatini+" "+a+" "+b);
		}
	}

	function clearformula() {
		document.getElementById("formula").value = "";
	}

	function average(){
		var saatini = $("#formula").val();
		// var a =  saatini.split('');
		// var b = a[0];
		// var c = a.splice(1);
		// var d = replace(/,/g, '');
		// alert(d);
		var gabung = saatini.split(/[^0-9\.]+/);
		var a = gabung.length;
		var fixcount = a - 1;
		$("#formula").val("("+saatini+" "+")"+":"+fixcount);
	}

	$(".select2-list").select2({
            allowClear: true
        });
</script>
	
</body>
</html>

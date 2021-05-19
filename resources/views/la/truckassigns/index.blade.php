@extends("la.layouts.app")

@section("main-content")
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="mainPage" class="box box-widget" style="display:none">
	<div class="box-header with-border">
		<div class="content-header">
			<h1><i class="fa {{$module->fa_icon}}"></i> PHÂN CÔNG XE<small>| Danh sách phân công xe</small></h1>
		</div>
	</div>
	<div class="box-body">
		<table class="tableq">
			<tbody>
				<tr>
					<td class="align-middle" style="width:65px"><label for="truckassigns-airport" class="control-label">Sân bay:</label></td>
					<td style="width:230px">
						{!! Form::select('airport', $airport, null, ['id' => 'truckassigns-airport', 'class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'airport-select']) !!}
					</td>
					<td class="align-middle text-right" style="width:50px"><label for="airport" class="control-label">Ngày:</label></td>
					<td style="width:200px">
						<div class="input-group date"><input id="truckassigns-date" class="form-control" placeholder="Ngày kế hoạch..." required="1" name="date" type="text" value="" aria-required="true"><span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span></div>
					</td>
					<td class="align-middle text-right" style="width:35px"><label for="airport" class="control-label">Ca:</label></td>
					<td style="width:110px">
						<select id="truckassigns-shift" class="form-control select2" style="width: 100%;"></select>
					</td>
					<td>
						@la_access("TruckAssigns", "create")
						<button class="btn btn-default" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						@endla_access
						<button class="btn btn-default" id="HistoryBtn"><i class="fas fa-history"></i>&nbsp;&nbsp;Lịch sử</button>
					</td>
                </tr>
			</tbody>
		</table>
		
		<table class="tableq" style="border-top: 1px solid #f4f4f4;border-bottom: 1px solid #f4f4f4;">
			<tbody>
				<tr>
					<td class="align-middle" style="padding:8px;width:295px">
						<span>Ca làm việc: </span>
						<span id="shift_name" style="padding-right:50px"></span>
					</td>
					<td class="align-middle" style="padding:8px">
						<span>Thời gian từ: </span>
						<span id="time_start"></span>
						<span>. Đến: </span>
						<span id="time_end"></span>
					</td>
                </tr>
			</tbody>
		</table>
			
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
		<thead>
		<tr class="success">
			<th style="text-align:center;width:30px"><i class="checkbox-toggle fa fa-square-o"></i></th>
			<th style="text-align:center;width:30px;"><i class="far fa-list-alt"></i></th>
			<th style="width:30%">XE TRA NẠP</th>
			<th style="width:30%">LÁI XE</th>
			<th style="width:30%">THỢ BƠM</th>
			<th></th>
		</tr>
		</thead>
		<tbody></tbody>
		</table>
		
		<table id="actionBar" class="tableq" style="display:none">
			<tbody>
				<tr>
					<td class="align-middle" style="padding:8px;width:295px">
						<button class="btn btn-default" id="quickEditTrucksBtn"><i class="fas fa-bolt" aria-hidden="true"></i>&nbsp;&nbsp;Đổi xe nhanh</button>
						<div id="editGroup" class="btn-group">
							<button class="btn btn-default"><i class="fas fa-edit" aria-hidden="true"></i>&nbsp;&nbsp;Sửa phân công xe</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li id="EditTrucksBtn"><a href="#"><i class="fas fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;Đổi xe tra nạp</a></li>
								<li id="EditWorkersBtn"><a href="#"><i class="fas fa-users-cog" aria-hidden="true"></i>&nbsp;&nbsp;Đổi nhân viên tra nạp</a></li>
							</ul>
						</div>
						<button class="btn btn-default pull-right" id="cancelBtn" style="display:none"><i class="fas fa-ban" aria-hidden="true"></i>&nbsp;&nbsp;Hủy thao tác</button>
						<button class="btn btn-default pull-right" id="updateBtn" style="display:none"><i class="fas fa-sync-alt" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
					</td>
                </tr>
			</tbody>
		</table>
	</div>
</div>
@la_access("TruckAssigns", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm phân công xe mới</small></h1>
			</div>
			<div  id="AddModalContent" class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				{!! Form::submit( 'Tạo mới', ['id'=>'AddTruckAssignsBtn','class'=>'btn btn-success']) !!}
			</div>
		</div>
	</div>
</div>
@endla_access
@la_access("TruckAssigns", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("TruckAssigns", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa TruckAssign</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.truckassigns.destroy', 1], 'method'=>'delete', 'id' => 'truckassign-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi TruckAssigns listing không?
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				{!! Form::submit( 'Xóa', ['class'=>'btn btn-danger']) !!}
            </div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/uikit.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/linq.js/2.2.0.2/linq.js"></script>
<script>
var dataShifts = [];
var dataTrucks = [];
var dataDrivers = [];
var dataTechnicalers = [];
var dataDTAjax = {};

var timeStart = 0;
var timeEnd = 0;

var addError = 0;
var addItem = 0;

var table = $("#example1").DataTable({
	processing: true,
	ajax: {
		url: "{{ url(config('laraadmin.adminRoute') . '/truckassign_dt_ajax') }}",
		type: "GET",
		data: function (d) {
			return  $.extend(d, dataDTAjax);
		}
	},
	language: {
		url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
	},
	columns: [
		{data: "id", type: "string",
			render: function (data) {
				return '<input id="check-'+data+'" type="checkbox">';
			}
		},
		{render: function(data) {return ""}},
		{data: "truck", type: "string",
			render: function (data) {
				var htlm = '<select id="truck-'+data+'" class="form-control select2 truck" rel="select2" disabled>'+
							renderOption(dataTrucks, data, false)+
							'</select>';
				return htlm;
			}
		},
		{data: "driver", type: "string",
			render: function (data, type, row) {
				var htlm = '<select id="driver-'+row.truck+'" class="form-control select2 worker driver" rel="select2" disabled>'+
							renderOption(dataDrivers, data, true)+
							'</select>';
				return htlm;
			}
		},
		{data: "technicaler", type: "string",
			render: function (data, type, row) {
				var htlm = '<select id="technicaler-'+row.truck+'" class="form-control select2 worker technicaler" rel="select2" disabled>'+
							renderOption(dataTechnicalers, data, true)+
							'</select>';
				return htlm;
			}
		},
		{render: function(data) {return ""}}
	],
	order: [[ 5, "asc" ]],
	rowId: 'id',
	searching: false,
	paging: false,
	info: false,
	columnDefs: [
		{ className: "text-center", targets: [0, 1] },
		{ orderable: false , targets: [0, 1, 2, 3, 4, 5] },
		{ visible: false, targets: [5] }
	],
	drawCallback: function(settings) {
		$('#example1 input:checkbox').change(function() {
			var n = 0;
			$.each($("#example1 input:checkbox"), function(key, value) {
				if($("#"+value.id).prop('checked')){
					n++;
				}
			});
			if(n > 2){
				swal("", "Chức năng đổi xe nhanh không cho phép chọn quá hai xe tra nạp!", "warning");
				$(this).prop('checked', false);
			}
		});
		
		$("#example1 [rel=select2]").select2({});
		
		if(table.page.info().recordsDisplay != 0){
			$("#actionBar").show();
			$("#quickEditTrucksBtn").show();
			$("#editGroup").show();
			$("#updateBtn").hide();
			$("#cancelBtn").hide();
		}else{
			$("#actionBar").hide();
		};
		
		$("#mainPage").fadeIn(2000);
	}
});

table.on( 'order.dt search.dt', function () {
	table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		cell.innerHTML = i+1;
	} );
}).draw();
	
$(function () {
	$('#truckassigns-date').datepicker({
		format: 'dd/mm/yyyy',
		language: "vi",
		autoclose: true,
		todayHighlight: true
	});
    
	$('#truckassigns-date').datepicker('setDate', moment.utc(+7).format());
	
	FullSetShift();
	
	$('#truckassigns-airport').change(function() {
		FullSetShift();
	});
		
	$('#truckassigns-date').change(function() {
		SemiSetShift();
	});
		
	$('#truckassigns-shift').change(function() {
		SemiSetShift();
	});
});
// Add Process
$("#AddBtn").click(function() {
	$.ajax({
		type: "GET",
		url: "{{ url(config('laraadmin.adminRoute') . '/truckassign_addAjax') }}",
		data:{
			_token:'{{ csrf_token() }}',						
			airport: $('#truckassigns-airport').val(),
			date: moment($("#truckassigns-date").val(), "DD/MM/YYYY").format('YYYY-MM-DD'),
			shift: $('#truckassigns-shift').val()
        },
		success: function(data) {
			if(data == 0){
				window.location.href = "{{ url(config('laraadmin.adminRoute') . '/') }}";
			}else{
				if(data == 1){
					swal("", "Phân công xe tra nạp đã tồn tại!", "warning");
				}else{
					if(dataTrucks.length == 0){
						swal("", "Chưa có dữ liệu xe tra nạp!", "warning");
					}else{
						if(dataDrivers.length == 0 || dataTechnicalers.length == 0){
							swal("", "Chưa có dữ liệu nhân viên tra nạp!", "warning");
						}else{
							var driverOption = renderOption(dataDrivers, 0, true);
					
							var technicalerOption = renderOption(dataTechnicalers, 0, true);
							
							var html = '<table class="table table-bordered truckassigns-add-table"><thead>';
							
							html +=	'<tr>'+
										'<td style="text-align:center;width:50px;"><i class="far fa-list-alt"></i></td>'+
										'<td><b>XE TRA NẠP</b></td>'+
										'<td style="width:200px;"><b>LÁI XE</b></td>'+
										'<td style="width:200px;"><b>THỢ BƠM</b></td>'+
									'</tr></thead><tbody>';
							
							var i = 1;
							$.each(dataTrucks, function(key,value) {
								html +=	'<tr id="'+value.id+'">'+
											'<td style="text-align:center;vertical-align: middle;">'+i+'</td>'+
											'<td style="vertical-align: middle;">'+value.name+'</td>'+
											'<td class="driver">'+
												'<select id="driver-'+value.id+'" class="form-control select2" rel="select2">'+
													driverOption+
												'</select>'+
											'</td>'+
											'<td class="technicaler">'+
												'<select id="technicaler-'+value.id+'" class="form-control select2" rel="select2">'+
													technicalerOption+
												'</select>'+
											'</td>'+
										'</tr>';
								i++;
							});
							
							html += '</tbody></table>';

							$('#AddModalContent').html(html);
							
							$(".truckassigns-add-table select").each(function(){
								$(this).change(function() {
									addError = 0;
									addItem = 0;
									
									var dataChecks = $(".truckassigns-add-table select");
									
									$(".truckassigns-add-table").find('.select2-selection--single').css('border-color', '#d2d6de');
									
									for (i = 0; i < dataChecks.length - 1; i++) {
										if(parseInt(dataChecks[i].value) != 0){
											for (j = i + 1; j < dataChecks.length; j++) {
												if(parseInt(dataChecks[i].value) == parseInt(dataChecks[j].value)){
													$("#"+dataChecks[i].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
													$("#"+dataChecks[j].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
													addError = 1;
												}
											}
											addItem++;
										}else{
											var Team = $("#"+dataChecks[i].id).parent().parent().find('select');
											for (k = 0; k < Team.length; k++) {
												if(parseInt(Team[k].value) != 0){
													$("#"+dataChecks[i].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
													addError = 1;
												}
											}
										}
									}
								});
							});
							$(".truckassigns-add-table [rel=select2]").select2({});
							$('#AddModal').modal('show');
						}	
					}
				}
			}
		}
	});
});

$("#AddTruckAssignsBtn").click(function() {
	if(addItem == 0){
		swal("", "Chưa phân công nhân viên tra nạp!", "warning");
	}else{
		if(addError == 1){
			swal("", "Phân công nhân viên tra nạp sai quy định!", "warning");
		}else{
			var addData = [];
			$.each($(".truckassigns-add-table tbody tr"), function( index, value ) {
				addData.push({
					airport: parseInt($('#truckassigns-airport').val()),
					date: moment($("#truckassigns-date").val(), "DD/MM/YYYY").format('YYYY-MM-DD'),
					shift: parseInt($('#truckassigns-shift').val()),
					truck: parseInt(value.id),
					driver: parseInt($('#'+value.id +' .driver select').val()),
					technicaler: parseInt($('#'+value.id +' .technicaler select').val()),
					time_start: timeStart,
					time_end: timeEnd
				});
			});
			$.ajax({
				type: "POST",
				url: "{{ url(config('laraadmin.adminRoute') . '/truckassign_storeAjax') }}",
				data:{
					_token:'{{ csrf_token() }}',						
					addData: addData
				},
				success: function( data ) {
					console.log(data);
				}
			});
		}
	}
});

function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#truckassign-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm sân bay mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
$("#EditTrucksBtn").click(function() {
	$("#example1 .truck").removeAttr('disabled');
	$("#example1 .truck").each(function(){
		$(this).change(function() {
			addError = 0;
			addItem = 0;					
			var dataChecks = $("#example1 .truck");
									
			$("#example1").find('.select2-selection--single').css('border-color', '#d2d6de');
			
			for (i = 0; i < dataChecks.length - 1; i++) {
				for (j = i + 1; j < dataChecks.length; j++) {
					if(parseInt(dataChecks[i].value) == parseInt(dataChecks[j].value)){
						$("#"+dataChecks[i].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
						$("#"+dataChecks[j].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
						addError = 1;
					}
				}
			}
		});
	});
	$("#quickEditTrucksBtn").hide();
	$("#editGroup").hide();
	$("#updateBtn").show();
	$("#cancelBtn").show();
});

$("#EditWorkersBtn").click(function() {
	$("#example1 .worker").removeAttr('disabled');
	$("#example1 .worker").each(function(){
		$(this).change(function() {
			addError = 0;
			addItem = 0;					
			var dataChecks = $("#example1 .worker");
									
			$("#example1").find('.select2-selection--single').css('border-color', '#d2d6de');
									
			for (i = 0; i < dataChecks.length - 1; i++) {
				if(parseInt(dataChecks[i].value) != 0){			
					for (j = i + 1; j < dataChecks.length; j++) {
						if(parseInt(dataChecks[i].value) == parseInt(dataChecks[j].value)){
							$("#"+dataChecks[i].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
							$("#"+dataChecks[j].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
							addError = 1;
						}
						addItem++;
					}
				}else{
					var Team = $("#"+dataChecks[i].id).parent().parent().find('.worker');
					for (k = 0; k < Team.length; k++) {
						if(parseInt(Team[k].value) != 0){
							$("#"+dataChecks[i].id).parent().find('.select2-selection--single').css('border-color', '#dd4b39');
							addError = 1;
						}
					}
				}
			}
		});
	});
	$("#quickEditTrucksBtn").hide();
	$("#editGroup").hide();
	$("#updateBtn").show();
	$("#cancelBtn").show();
});
// Update Process
$("#updateBtn").click(function() {
	var updateData = [];
	
	$.each($("#example1 tbody tr"), function(index, value) {
		updateData.push({
			id: parseInt(value.id),
			truck: $('#' + value.id + ' .truck').val(),
			driver: $('#' + value.id + ' .driver').val(),
			technicaler: $('#' + value.id + ' .technicaler').val()
		});
	});
	
	$.ajax({
		type: "POST",
		url: "{{ url(config('laraadmin.adminRoute') . '/truckassign_updateAjax') }}",
		data:{
			_token:'{{ csrf_token() }}',						
			updateData: updateData
		},
		success: function( data ) {
			if(data == 0){
				window.location.href = "{{ url(config('laraadmin.adminRoute') . '/') }}";
			}else{
				table.ajax.reload();
				toastr.success('', 'Đã cập nhật phân công xe tra nạp', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
			}
		}
	});
});
// Cancel Process
$("#cancelBtn").click(function() {
	table.ajax.reload();
	toastr.error('', 'Đã hủy thao tác sửa phân công xe', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
});
function FullSetShift() {
	$.ajax({
		url: "{{ url(config('laraadmin.adminRoute') . '/truckassign_dt_shifts') }}" + "/" + $("#truckassigns-airport").val(),
		success: function(data) {
			dataShifts = data.shifts;
			dataTrucks = data.trucks;
			dataDrivers = data.drivers;
			dataTechnicalers = data.technicalers;
			
			var shiftOptions = {};
			
			$.each(dataShifts, function (index, value){  
				shiftOptions[value.name] = value.id;
			});

			var $el = $("#truckassigns-shift");
			$el.empty(); // remove old options
			$.each(shiftOptions, function(key,value) {
			  $el.append($("<option></option>")
				 .attr("value", value).text(key));
			});
			
			SemiSetShift();
		}	
	});
}

function SemiSetShift() {
	var shift = Enumerable.From(dataShifts)
				.Where("$.id == " + $("#truckassigns-shift").val())
				.ToArray();
			
	timeStart = shift[0].time_start + Date.parse(moment($("#truckassigns-date").val(), "DD/MM/YYYY"))/1000;
					
	timeEnd = shift[0].time_end + Date.parse(moment($("#truckassigns-date").val(), "DD/MM/YYYY"))/1000;
					
	if(shift[0].nextday == 1){
		timeEnd += 86400;
	}
			
	$("#shift_name").html($("#truckassigns-shift option:selected").text().toUpperCase());
	
	$("#time_start").html(moment.unix(timeStart).utc(+7).format('HH giờ mm, DD/MM/YYYY').replace(",", ", ngày"));
			
	$("#time_end").html(moment.unix(timeEnd).utc(+7).format('HH giờ mm, DD/MM/YYYY').replace(",", ", ngày"));
	
	dataDTAjax = {
		airport: $('#truckassigns-airport').val(),
		date: moment($("#truckassigns-date").val(), "DD/MM/YYYY").format('YYYY-MM-DD'),
		shift: $('#truckassigns-shift').val()
	},
			
	table.ajax.reload();
}

function renderOption(data, selected, nullvalue) {
	var out = '';
	
	if(nullvalue == true){
		out += '<option value="0">&nbsp;</option>';
	}
	
	$.each(data, function(key, value) {
		if(value.id == selected){
			out  += '<option value="'+value.id+'" selected>'+value.name+'</option>';
		}else{
			out  += '<option value="'+value.id+'">'+value.name+'</option>';
		}
	});
	
	return out;			
}
</script>
@endpush
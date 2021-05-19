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
<div class="box box-widget">
	<div class="box-header with-border">
		<div class="content-header">
			<h1><i class="fa {{$module->fa_icon}}"></i> GIÁ BÁN TẠM TÍNH<small>| Danh sách giá bán tạm tính</small></h1>
		</div>
	</div>
	<div class="box-body">
		<table class="tableq">
			<tbody>
				<tr>
					<td class="align-middle" style="width:65px"><label for="airport" class="control-label">Sân bay:</label></td>
					<td style="width:230px">
						{!! Form::select('airport', $airport, null, ['id' => 'temporaryprices-airport', 'class' => 'form-control', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'import']) !!}
					</td>
					<td class="align-middle text-right" style="width:60px"><label for="airport" class="control-label">Tháng:</label></td>
					<td class="align-middle" style="width:110px">
						<select id="month" class="form-control select2" style="width: 100%;">
							<option value="1">Tháng 1</option>
							<option value="2">Tháng 2</option>
							<option value="3">Tháng 3</option>
							<option value="4">Tháng 4</option>
							<option value="5">Tháng 5</option>
							<option value="6">Tháng 6</option>
							<option value="7">Tháng 7</option>
							<option value="8">Tháng 8</option>
							<option value="9">Tháng 9</option>
							<option value="10">Tháng 10</option>
							<option value="11">Tháng 11</option>
							<option value="12">Tháng 12</option>
						</select>
					</td>
					<td class="align-middle text-right" style="width:50px"><label for="airport" class="control-label">Năm:</label></td>
					<td class="align-middle" style="width:110px">
						<select id="year" class="form-control select2" style="width: 100%;">
							@for ($i = 2021; $i <= date("Y") +1; $i++)
								<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</td>
					<td>
						@la_access("TemporaryPrices", "create")
						<button class="btn btn-default" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						@endla_access
						<button class="btn btn-default" id="HistoryBtn"><i class="fas fa-history"></i>&nbsp;&nbsp;Lịch sử</button>
						<button class="btn btn-default" id="FilterBtn"><i class="fas fa-filter"></i>&nbsp;&nbsp;Hiện bộ lọc</button>
					</td>
                </tr>
			</tbody>
		</table>
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
			<thead>
				<tr class="success">
					<th style="text-align:center;"><i class="checkbox-toggle fa fa-square-o"></i></th>
					<th style="text-align:center;"><i class="far fa-list-alt"></i></th>
					<th>Loại khách hàng</th>
					<th>Loại hợp đồng</th>
					<th>Loại chặng bay</th>
					<th>Số lượng</th>
					<th>Tiền tệ</th>
					<th>Đơn giá</th>
					<th style="width:65px"></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		<table class="tableq">
			<tbody>
				<tr>
					<td>
						@la_access("TemporaryPrices", "create")
						<button class="btn btn-default" id="CopyBtn"><i class="fas fa-copy"></i>&nbsp;&nbsp;Copy</button>
						@endla_access
						<button class="btn btn-default" id="DeleteBtn"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</button>
					</td>
                </tr>
			</tbody>
		</table>
	</div>
</div>
@la_access("TemporaryPrices", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="AddModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("TemporaryPrices", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("TemporaryPrices", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa TemporaryPrice</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.temporaryprices.destroy', 1], 'method'=>'delete', 'id' => 'temporaryprice-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi TemporaryPrices listing không?
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
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/searchBuilder.dataTables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.searchBuilder.min.js') }}"></script>
<script>
$(function () {
	var d = new Date();
	$("#month").val(d.getMonth() + 1);
	$("#year").val(d.getFullYear());
	
	var ajaxData = {
		airport: $("#temporaryprices-airport").val(),
		month: $("#month").val(),
		year: $("#year").val()
	}
	
	function TableReload() {
		ajaxData = {
			airport: $("#temporaryprices-airport").val(),
			month: $("#month").val(),
			year: $("#year").val()
		}
		table.ajax.reload();
	}
	
	$("#temporaryprices-airport").change(function() {TableReload()});
	$("#month").change(function() {TableReload()});
	$("#year").change(function() {TableReload()});
	
	var table = $("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: {
			url: "{{ url(config('laraadmin.adminRoute') . '/temporaryprice_dt_ajax') }}",
			type: "GET",
			data: function (d) {
				return  $.extend(d, ajaxData);
			}
		},
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		dom: 'Qlfrtip',
		columns: [
			{render: function(data) {return '<input type="checkbox">'}},
			{render: function(data) {return ""}},
			{data: 1, type: "string"},
			{data: 2, type: "string",
				render: function (data, type, row) {
					if(row[1] == "Nội địa"){
						return "-";
					}else{
						return data == 0 ? "Không hợp đồng" : "Có hợp đồng";
					}
				}
			},
			{data: 3, type: "string",
				render: function (data, type, row) {
					if(row[1] == "Nội địa"){
						return "-";
					}else{
						return data;
					}
				}
			},
			{data: 4, type: "string"},
			{data: 5, type: "string"},
			{data: 6, type: "string"},
			{
				render: function (data, type, row) {
					var show_actions = '';
					
						show_actions += '<div class="btn-group"><button type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-fw fa-cog"></i></button><button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu">';
						
						show_actions += '<li><a href="' + "{{ url(config('laraadmin.adminRoute') . '/customers') }}" + '/' + row[0] + '"><i class="fa fa-eye"></i>Chi tiết</a></li>';
						
						@la_access("Staffs", "edit")
						show_actions += '<li class="divider" style="margin:3px 0"></li>';
						show_actions += '<li><a href="#" onclick="EditProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/customers') }}" + '/' + row[0] + '/edit' + "'" + ')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
						@endla_access
						
						@la_access("Staffs", "delete")
						show_actions += '<li><a href="#" onclick="DeleteProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/customers/') }}" + row[0] + "', '" + row[2] + "'" + ')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa bỏ</a></li>';
						@endla_access
						
						show_actions += '</ul></div>';
						
						return show_actions;
				}
			}
		],
		order: [[ 2, "asc" ],[ 3, "asc" ]],
		searchBuilder: {
            columns: [ 2, 3, 4, 5, 6, 7]
        },
		searching: false,
		paging: false,
		info: false,
		columnDefs: [
			{ className: "text-center", targets: [0, 1] },
			{ orderable: false , targets: [0, 1, 8] }
		],
	});
	
	table.on( 'order.dt search.dt', function () {
        table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
	
	$('#example1 input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
// Filter Process
$("#FilterBtn").click(function() {
	if ( $(".dtsb-searchBuilder").css('display') == 'none' || $(".dtsb-searchBuilder").css("visibility") == "hidden"){
		$(".dtsb-searchBuilder").show();
		$("#FilterBtn").html('<i class="fas fa-filter"></i>&nbsp;&nbsp;Ẩn bộ lọc');
	}else{
		$(".dtsb-searchBuilder").hide();
		$("#FilterBtn").html('<i class="fas fa-filter"></i>&nbsp;&nbsp;Hiện bộ lọc');
	}
	
});
// Add Process
$("#AddBtn").click(function() {
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/temporaryprice_fm_add') }}" }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#temporaryprice-add-form").validate({
			submitHandler: function(form) {
				var dataAdd = {};
				
				var form = $('#temporaryprice-add-form').serializeArray().reduce(function(obj, item) {
					dataAdd[item.name] = item.value;
				});
				
				dataAdd['airport'] = $("#temporaryprices-airport").val();
				dataAdd['month'] = $("#month").val();
				dataAdd['year'] = $("#year").val();
				
				delete dataAdd['contract_hidden'];
				
				dataAdd['contract'] = dataAdd.hasOwnProperty('contract')? 1 : 0;
				console.log(dataAdd);
				
				$.ajax({
					type: "POST",
					url: "{{ url(config('laraadmin.adminRoute') . '/temporaryprice_add_ajax') }}",
					data:{
						_token:'{{ csrf_token() }}',						
						dataAdd: dataAdd
					},
					success: function( data ) {
						if(data == 0){
							swal("Bạn không có quyền tạo đơn giá tạm tính!");
						}else{
							if(data == 1){
								swal("", "Đơn giá tạm tính đã tồn tại. Đề nghị kiểm tra lại!", "warning");
							}else{
								$('#AddModal').modal('hide');
								$('#example1').DataTable().ajax.reload();
								toastr.success('', 'Đã thêm đơn giá tạm tính mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
							}	
						}
					}
				});
			}
		});
	});
});
function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#temporaryprice-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm sân bay mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#temporaryprice-edit-form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseEdit});
				return false;
			}
		});
	});
}
function ResponseEdit()  {
	$('#EditModal').modal('hide');
	$('#example1').DataTable().ajax.reload();		
	toastr.info('', 'Đã cập nhật dữ liệu mới', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Delete Process
function DeleteProcess(url, name){
	$('#temporaryprice-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#temporaryprice-delete-form").validate({
		submitHandler: function(form) {
			$(form).ajaxSubmit({success: ResponseDelete});
			return false;
		}
	});
}
function ResponseDelete()  {
	$('#DeleteModal').modal('hide');
	$('#example1').DataTable().ajax.reload();		
	toastr.warning('', 'Đã xóa dữ liệu khỏi danh sách', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}

//Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#example1 input[type='checkbox']").iCheck("uncheck");
        $(this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#example1 input[type='checkbox']").iCheck("check");
        $(this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
</script>
@endpush
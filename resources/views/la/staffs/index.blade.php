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
			<h1><i class="fa {{$module->fa_icon}}"></i> NHÂN VIÊN TRA NẠP<small>| Danh sách nhân viên tra nạp</small></h1>
		</div>
	</div>
	<div class="box-body">
		<table class="tableq">
			<tbody>
				<tr>
					<td class="align-middle" style="width:65px"><label for="airport" class="control-label">Sân bay:</label></td>
					<td style="width:230px">
						{!! Form::select('airport', $airport, null, ['id' => 'staffs-airport', 'class' => 'form-control', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'import']) !!}
					</td>
					<td>
						@la_access("Staffs", "create")
						<button class="btn btn-default" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						<div class="btn-group">
							<button class="btn btn-default"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Nhập/xuất file Excel</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li id="ImportBtn"><a href="#"><i class="fas fa-upload"></i>&nbsp;&nbsp;Nhập danh sách nhân viên</a></li>
								<li><a href="#"><i class="fas fa-download"></i></i>&nbsp;&nbsp;Xuất danh sách nhân viên</a></li>
							</ul>
						</div>
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
			<th style="text-align:center;"><i class="far fa-list-alt"></i></th>
			<th>Mã nhân viên</th>
			<th>Tên nhân viên</th>
			<th>Email</th>
			<th style="text-align:center;">Lái xe</th>
			<th style="text-align:center;">Thợ bơm</th>
			<th style="text-align:center;">Trạng thái</th>
			<th></th>
		</tr>
		</thead>
		<tbody></tbody>
		</table>
	</div>
</div>
@la_access("Staffs", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div id="AddModalContent" class="modal-content"></div>
	</div>
</div>
<div class="modal fade" id="ImportModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="ImportModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> NHẬP FILE EXCEL<small>| Nhập danh sách nhân viên từ file Excel</small></h1>
            </div>
			{!! Form::open(['id' => 'staff-import-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="Airport" class="col-sm-3 control-label text-right">Sân bay:</label>
							<div class="col-sm-9">
								{!! Form::select('airport', $airport, null, ['id' => 'staff-airport-import', 'class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'irport']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="Airport" class="col-sm-3 control-label text-right">File Excel:</label>
							<div class="col-sm-9">
								<input type="file" name="InputFile" id="InputFile">
							</div>
						</div>
						<div class="form-group">
							<label for="passwordIP" class="col-sm-3 control-label">Mật khẩu:</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="passwordIP" id="passwordIP" placeholder="Mật khẩu" data-rule-minlength="6" data-rule-maxlength="250" autocomplete="new-password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="passwordIP_confirm" class="col-sm-3 control-label">Nhắc lại mật khẩu:</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="passwordIP_confirm" placeholder="Nhắc lại mật khẩu" data-rule-minlength="6" data-rule-maxlength="250" autocomplete="new-password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3"></div>
							<div class="col-sm-8">
								<label>
								  <input type="checkbox" class="flat-red" id="resetPassword" checked>
								  Giữ mật khẩu các tài khoản đã tạo
								</label>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				{!! Form::submit( 'Nhập dữ liệu', ['class'=>'btn btn-success']) !!}
            </div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access
@la_access("Staffs", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Staffs", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa nhân viên tra nạp</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.staffs.destroy', 1], 'method'=>'delete', 'id' => 'staff-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi danh sách nhân viên tra nạp không?
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.searchBuilder.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/xlsx/xlsx.full.min.js') }}"></script>
<script>
$(function () {
	var urlajax = "{{ url(config('laraadmin.adminRoute') . '/staff_dt_ajax') }}" + "/" + $("#staffs-airport").val();
	
	$("#staffs-airport").change(function() {
		urlajax = "{{ url(config('laraadmin.adminRoute') . '/staff_dt_ajax') }}" + "/" + $("#staffs-airport").val();
		table.ajax.url(urlajax).load();
	});
	
	var table = $("#example1").DataTable({
        processing: true,
		ajax: urlajax,
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		dom: 'Qlfrtip',
		columns: [
			{render: function(data) {return ""}},
			{data: "employee_code", type: "string"},
			{data: "name", type: "string"},
			{data: "email", type: "string"},
			{data: "driver",
				render: function(data, type, row, meta) {
					if(data == 1){
						return type === 'display' ? '<i class="fas fa-check" style="color:forestgreen;"></i><span style="display:none">Có năng định</span>' : data;
					}else{
						return type === 'display' ? '<i class="fas fa-times" style="color:orangered;"></i><span style="display:none">Không có năng định</span>' : data;
					}
				}
			},
			{data: "technicaler",
				render: function (data, type, row) {
					if(data == 1){
						return type === 'display' ? '<i class="fas fa-check" style="color:forestgreen;"></i><span style="display:none">Có năng định</span>' : data;
					}else{
						return type === 'display' ? '<i class="fas fa-times" style="color:orangered;"></i><span style="display:none">Không có năng định</span>' : data;
					}
				}
			},
			{data: "IsActive",
				render: function (data, type, row) {
					if(data == 1){
						return '<div class="Switch Round Off" style="vertical-align:top"><div class="Toggle"></div></div>';
					}else{
						return '<div class="Switch Round On" style="vertical-align:top"><div class="Toggle"></div></div>';
					}
				}
			},
			{
				render: function (data, type, row) {
					var show_actions = '';
					
						show_actions += '<div class="btn-group"><button type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-fw fa-cog"></i></button><button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu">';
						
						show_actions += '<li><a href="' + "{{ url(config('laraadmin.adminRoute') . '/staffs') }}" + '/' + row.id + '"><i class="fa fa-eye"></i>Chi tiết</a></li>';
						
						@la_access("Staffs", "edit")
						show_actions += '<li class="divider" style="margin:3px 0"></li>';
						show_actions += '<li><a href="#" onclick="EditProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/staffs') }}" + '/' + row.id + '/edit' + "'" + ')"><i class="fa fa-key"></i>Đổi mật khẩu</a></li>';
						show_actions += '<li><a href="#" onclick="EditProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/staffs') }}" + '/' + row.id + '/edit' + "'" + ')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
						@endla_access
						
						@la_access("Staffs", "delete")
						show_actions += '<li><a href="#" onclick="DeleteProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/staffs/') }}" + row.id + "', '" + row.name + "'" + ')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa bỏ</a></li>';
						@endla_access
						
						show_actions += '</ul></div>';
						
						return show_actions;	
				}
			}
        ],
		order: [[ 1, "asc" ]],
		searchBuilder: {
            columns: [ 1, 2, 3, 4, 5]
        },
		paging: false,
		info: false,
		columnDefs: [
			{ className: "text-center", targets: [0, 4, 5, 6] },
			{ orderable: false , targets: [0, 4, 5, 6, 7] }
		]
	});
	
	table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
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
// Import Process
$("#ImportBtn").click(function() {
	$('#ImportModal').modal('show');
	$("#staff-import-form").validate({
		rules : {
			passwordIP_confirm : {
				equalTo : "#passwordIP"
			},
            InputFile: {
				required: true,
                extension: "xls,xlsx"
            }
		},
		submitHandler: function(form) {
			var dataStaffs = [];
			var f = document.getElementById('InputFile').files[0];
			var reader = new FileReader();
			var name = f.name;
			reader.onload = function(e) {
				var data = e.target.result;
				var wb = XLSX.read(data, {type: 'binary'});
				if(wb.SheetNames.length > 0) {
					ws = wb.Sheets[wb.SheetNames[0]];
						
					wsCount = XLSX.utils.decode_range(ws['!ref']).e.r;
							
					for(var i = 1; i <= wsCount; i++) {
						dataStaffs.push({
							"employee_code" : GetCE(ws, 0, i),
							"name" : GetCE(ws, 1, i),
							"airport" : parseInt($('#staff-airport-import').val()),
							"email" : GetCE(ws, 2, i),
							"idqlhh" : GetCE(ws, 3, i),
							"driver" : parseInt(GetCE(ws, 4, i)),
							"technicaler" : parseInt(GetCE(ws, 5, i)),
							"create" : parseInt(GetCE(ws, 6, i)),
							"edit" : parseInt(GetCE(ws, 7, i)),
							"delete" : parseInt(GetCE(ws, 8, i)),
							"create1" : parseInt(GetCE(ws, 9, i)),
							"IsActive" : parseInt(GetCE(ws, 10, i)),
						});
					}
					
					$.ajax({
						type: "POST",
						url: "{{ url(config('laraadmin.adminRoute') . '/staff_import_ajax') }}",
						data:{
							_token:'{{ csrf_token() }}',
							password: $('#passwordIP').val(),
							resetPassword: $('#resetPassword').is(":checked"),							
							dataStaffs: dataStaffs
                        },                              
                        success: function( data ) {
							$('#ImportModal').modal('hide');
							toastr.success('', 'Nhập danh sách nhân viên thành công.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
						}
					});
				}else{
					alert('LỖI: File dữ liệu không có bản ghi');
				}
			};		
			reader.readAsBinaryString(f);
		}
	}).resetForm();
});
// Add Process
$("#AddBtn").click(function() {
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/staff_fm_add') }}" + '/' + $("#staffs-airport").val() }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#staff-add-form").validate({
			rules : {
                password_confirm : {
                    equalTo : "#password"
                }
            },
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseAdd});
				return false;
			}
		});
	});
});
function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#staff-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm nhân viên tra nạp mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#staff-edit-form").validate({
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
	$('#staff-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#staff-delete-form").validate({
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
// GetDataCellExcel
function GetCE(ws, col, row){
	try{
		let data = ws[XLSX.utils.encode_cell({c:col, r:row})];
		if(data == null){
			data = '';
		}else{
			data = data.w;
		}
		return data;
	}catch(e){
		error = 1;
	}
};
</script>
@endpush
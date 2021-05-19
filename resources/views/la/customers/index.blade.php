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
			<h1><i class="fa {{$module->fa_icon}}"></i> KHÁCH HÀNG<small>| Danh sách khách hàng</small></h1>
		</div>
	</div>
	<div class="box-body">
		<table class="tableq">
			<tbody>
				<tr>
					<td class="align-middle" style="width:65px"><label for="airport" class="control-label">Sân bay:</label></td>
					<td style="width:230px">
						{!! Form::select('airport', $airport, null, ['id' => 'customers-airport', 'class' => 'form-control', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'import']) !!}
					</td>
					<td>
						@la_access("Customers", "create")
						<button class="btn btn-default" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						<div class="btn-group">
							<button class="btn btn-default"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Nhập/xuất file Excel</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li id="ImportBtn"><a href="#"><i class="fas fa-upload"></i>&nbsp;&nbsp;Nhập danh sách khách hàng</a></li>
								<li><a href="#"><i class="fas fa-download"></i></i>&nbsp;&nbsp;Xuất danh sách khách hàng</a></li>
							</ul>
						</div>
						@endla_access
						<button class="btn btn-default" id="HistoryBtn"><i class="fas fa-history"></i>&nbsp;&nbsp;Lịch sử</button>
						<button class="btn btn-default" id="FilterBtn"><i class="fas fa-filter"></i>&nbsp;&nbsp;Hiện bộ lọc</button>
					</td>
                </tr>
			</tbody>
		</table>
		<table id="example1" class="uk-table uk-table-hover uk-table-striped display nowrap">
			<thead>
			<tr class="success">
				<th style="width:20px"></th>
				<th style="text-align:center;"><i class="far fa-list-alt"></i></th>
				<th>Mã</th>
				<th>Tên khách hàng</th>
				<th>Nhóm</th>
				<th>Loại KH</th>
				<th style="text-align:center;">Hợp đồng</th>
				<th>Đại lý thanh toán</th>
				<th style="text-align:center;">Trạng thái</th>
				<th style="width:65px"></th>
			</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
@la_access("Customers", "create")
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
				<h1><i class="fa fa-trash"></i> NHẬP FILE EXCEL<small>| Nhập danh sách khách hàng từ file Excel</small></h1>
            </div>
			{!! Form::open(['id' => 'customer-import-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="Airport" class="col-sm-3 control-label text-right">Sân bay:</label>
							<div class="col-sm-9">
								{!! Form::select('airport', $airport, null, ['id' => 'customer-airport-import', 'class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'irport']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="Airport" class="col-sm-3 control-label text-right">File Excel:</label>
							<div class="col-sm-9">
								<input type="file" name="InputFile" id="InputFile">
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
@la_access("Customers", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Customers", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa khách hàng</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.customers.destroy', 1], 'method'=>'delete', 'id' => 'customer-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi danh sách khách hàng không?
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
<script src="{{ asset('la-assets/plugins/xlsx/xlsx.full.min.js') }}"></script>
<script>
function format ( d ) {
	var name = '';
	if(d[16] != ""){
		name = d[16] + ' - ' + d[8];
	}else{
		name = d[8];
	}
    var detail = '<table style="padding-left:50px;width:100%;border-left:1px solid rgb(244, 244, 244);border-right:1px solid rgb(244, 244, 244);">'+
        '<tr>'+
            '<td style="width:100px;">Tên công ty:</td>'+
            '<td colspan="3">'+name+'</td>'+
        '</tr>'+
		'<tr>'+
            '<td>Địa chỉ:</td>'+
            '<td colspan="3">'+d[9]+'</td>'+
        '</tr>'+
        '<tr>'+
			'<td>Mã số thuế:</td>'+
            '<td>'+d[10]+'</td>'+
            '<td style="width:33%;">Số hợp đồng:<span style="padding-left:20px;">'+d[11]+'</span></td>'+
			'<td style="width:33%;">Hiệu lực hợp đồng:<span style="padding-left:20px;">'+d[12]+'</span></td>'+
        '</tr>'+
        '<tr>'+
            '<td>Đơn vị số lượng:</td>'+
            '<td>'+d[13]+'</td>'+
			'<td>Đơn vị tiền tệ:<span style="padding-left:20px;">'+d[14]+'</span></td>'+
            '<td></td>'+
        '</tr>';
		
	if(d[3] == "Đại lý"){
		detail += '<tr><td colspan="4"><p class="text-center text-red"><b>THANH TOÁN CHO CÁC HÃNG HÀNG KHÔNG</b></p></td></tr>';
		if(d[15].length > 0){	
			detail += '<tr><td colspan="4"><div class="row">';
			var i = 1
			d[15].forEach(function(item) {
			   detail += '<div class="col-md-3 col-sm-6 col-xs-12" style="padding-top:5px;padding-bottom:5px">'+i+'. '+item['name']+'</div>';
			   i++;
			});
			
			detail += '</div></td></tr>';
		}else{
			detail += '<tr><td colspan="4"><p class="text-center">Không tìm thấy dòng nào phù hợp</p></td></tr>';
		}
	}
	
    detail += '</table>';
	
	return detail;
}

$(function () {
	var urlajax = "{{ url(config('laraadmin.adminRoute') . '/customer_dt_ajax') }}" + "/" + $("#customers-airport").val();
	
	$("#customers-airport").change(function() {
		urlajax = "{{ url(config('laraadmin.adminRoute') . '/customer_dt_ajax') }}" + "/" + $("#customers-airport").val();
		table.ajax.url(urlajax).load();
	});
	
	var wtab = '';
	$(".sidebar-toggle").click(function() {
		var wset = '100%';
		if(wtab == ''){
			wtab = $(".dataTables_scrollHeadInner").css("width");
		}else{
			if(wtab != $(".dataTables_scrollHeadInner").css("width")){
				wset = wtab;
			}
		}
		$(".dataTables_scrollHeadInner").css("width",wset);
		$(".dataTables_scrollHeadInner > table").css("width",wset);
		$("#example1").css("width",wset);
	});
	
	var table = $("#example1").DataTable({
		processing: true,
		ajax: urlajax,
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		dom: 'Qlfrtip',
		columns: [
			{
                className: 'details-control',
                orderable: false,
                data: null,
                defaultContent: ''
            },
			{render: function(data) {return ""}},
			{data: 1, type: "string"},
			{data: 2, type: "string"},
			{data: 3, type: "string"},
			{data: 4, type: "string"},
			{data: 5, type: "string",
				render: function(data) {
					return data === 1 ? '<i class="fas fa-check" style="color:forestgreen;"></i><span style="display:none">Có hợp đồng</span>' : '<i class="fas fa-times" style="color:orangered;"></i><span style="display:none">Không hợp đồng</span>';
				}
			},
			{data: 6, type: "string",
				render: function(data) {
					return data === null ? '<span style="display:none">Không qua đại lý</span>' : data;
				}
			},
			{data: 7, type: "string",
				render: function(data) {
					return data === 1 ? '<div class="Switch Round Off" style="vertical-align:top"><div class="Toggle"></div></div>' : '<div class="Switch Round On" style="vertical-align:top"><div class="Toggle"></div></div>';
				}
			},
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
		order: [[ 4, "asc" ],[ 5, "asc" ],[ 3, "asc" ]],
		searchBuilder: {
            columns: [ 2, 3, 4, 5, 6, 7]
        },
		pageLength: 50,
		lengthChange: false,
		info: false,
		columnDefs: [
			{ className: "text-center", targets: [0, 1, 6, 8] },
			{ orderable: false , targets: [0, 1, 8, 9] }
		],
		pageResize: true,
		scrollX: true
	});
	
	// Add event listener for opening and closing details
    $('#example1 tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
	
	table.on( 'order.dt search.dt', function () {
        table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
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
	$("#customer-import-form").validate({
		rules : {
            InputFile: {
				required: true,
                extension: "xls,xlsx"
            }
		},
		submitHandler: function(form) {
			var dataCustomers = [];
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
						dataCustomers.push({
							"code" : GetCE(ws, 0, i),
							"name" : GetCE(ws, 1, i),
							"nameinvoice" : GetCE(ws, 2, i),
							"address" : GetCE(ws, 3, i),
							"taxcode" : GetCE(ws, 4, i),
							"group" : parseInt(GetCE(ws, 5, i)),
							"local" : parseInt(GetCE(ws, 6, i)),
							"contract" : parseInt(GetCE(ws, 7, i)),
							"contractnumber" : GetCE(ws, 8, i),
							"expirationdate" : GetCE(ws, 9, i),
							"unit" : parseInt(GetCE(ws, 10, i)),
							"currency" : parseInt(GetCE(ws, 11, i)),
							"agency" : GetCE(ws, 12, i),
							"IsActive" : parseInt(GetCE(ws, 13, i)),
							"airport" : parseInt($('#customer-airport-import').val())
						});
					}
					
					$.ajax({
						type: "POST",
						url: "{{ url(config('laraadmin.adminRoute') . '/customer_import_ajax') }}",
						data:{
							_token:'{{ csrf_token() }}',						
							dataCustomers: dataCustomers
                        },                              
                        success: function( data ) {
							$('#ImportModal').modal('hide');
							$('#example1').DataTable().ajax.reload();
							toastr.success('', 'Nhập danh sách khách hàng thành công.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
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
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/customer_fm_add') }}" + '/' + $("#customers-airport").val() }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#customer-add-form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseAdd});
				return false;
			}
		});
	});
});
function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#customer-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm khách hàng mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#customer-edit-form").validate({
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
	$('#customer-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#customer-delete-form").validate({
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
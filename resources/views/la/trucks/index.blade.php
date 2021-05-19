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
			<h1><i class="fa {{$module->fa_icon}}"></i> XE TRA NẠP<small>| Danh sách xe tra nạp</small></h1>
		</div>
	</div>
	<div class="box-body">		
		<table class="tableq">
			<tbody>
				<tr>
					<td class="align-middle" style="width:65px"><label for="airport" class="control-label">Sân bay:</label></td>
					<td style="width:230px">
						{!! Form::select('airport', $airport, null, ['id' => 'trucks-airport', 'class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'irport']) !!}
					</td>
					<td>
						@la_access("Trucks", "create")
						<button class="btn btn-default" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						@endla_access
						<button class="btn btn-default" id="HistoryBtn"><i class="fas fa-history"></i>&nbsp;&nbsp;Lịch sử</button>
						<button class="btn btn-default" id="FilterBtn"><i class="fa fa-filter"></i>&nbsp;&nbsp;Mở bộ lọc</button>
					</td>
                </tr>
			</tbody>
		</table>
			  
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
		<thead>
		<tr>
			<th style="text-align:center;"><i class="far fa-list-alt"></i></th>
			<th>Biển kiểm soát</th>
			<th style="text-align:center;">Hãng</th>
			<th style="text-align:center;">Năm sử dụng</th>
			<th style="text-align:center;">Dung tích</th>
			<th style="text-align:center;">Đơn vị tính</th>
			<th style="text-align:center;">Excel.ID</th>
			<th style="text-align:center;">Trạng thái</th>
			<th></th>
		</tr>
		</thead>
		<tbody></tbody>
		</table>
	</div>
</div>
@la_access("Trucks", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div id="AddModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Trucks", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Trucks", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa xe tra nạp</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.trucks.destroy', 1], 'method'=>'delete', 'id' => 'truck-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi danh sách xe tra nạp không?
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
<script>
$(function () {
	var urlajax = "{{ url(config('laraadmin.adminRoute') . '/truck_dt_ajax') }}" + "/" + $("#trucks-airport").val();
	
	$("#trucks-airport").change(function() {
		urlajax = "{{ url(config('laraadmin.adminRoute') . '/truck_dt_ajax') }}" + "/" + $("#trucks-airport").val();
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
			{data: "name", type: "string"},
			{data: "mark", type: "string"},
			{data: "usedyear", type: "string"},
			{data: "capacity", type: "string"},
			{data: "unit", type: "string"},
			{data: "excelid", type: "string"},
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
						
						show_actions += '<li><a href="' + "{{ url(config('laraadmin.adminRoute') . '/trucks') }}" + '/' + row.id + '"><i class="fa fa-eye"></i>Chi tiết</a></li>';
						
						@la_access("Trucks", "edit")
						show_actions += '<li class="divider" style="margin:3px 0"></li>';
						show_actions += '<li><a href="#" onclick="EditProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/trucks') }}" + '/' + row.id + '/edit' + "'" + ')"><i class="fa fa-edit"></i>Chỉnh sửa</a></li>';
						@endla_access
						
						@la_access("Trucks", "delete")
						show_actions += '<li><a href="#" onclick="DeleteProcess(' + "'" + "{{ url(config('laraadmin.adminRoute') . '/trucks/') }}" + row.id + "', '" + row.name + "'" + ')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa bỏ</a></li>';
						@endla_access
						
						show_actions += '</ul></div>';
						
						return show_actions;	
				}
			}
		],
		order: [[ 1, "asc" ]],
		searchBuilder: {
            columns: [ 1, 2, 3, 4, 5, 6]
        },
		paging: false,
		info: false,
		columnDefs: [
			{ className: "text-center", targets: [0, 2, 3, 4, 5, 6, 7] },
			{ orderable: false , targets: [0, 7, 8] }
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
// Add Process
$("#AddBtn").click(function() {
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/truck_fm_add') }}" + '/' + $("#trucks-airport").val() }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#truck-add-form").validate({
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
	$("#truck-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm xe tra nạp mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#truck-edit-form").validate({
			rules : {
                password_confirm : {
                    equalTo : "#password"
                }
            },
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
	$('#truck-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#truck-delete-form").validate({
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
</script>
@endpush
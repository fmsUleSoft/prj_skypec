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
			<h1><i class="fa {{$module->fa_icon}}"></i> CA TRA NẠP<small>| Danh sách ca tra nạp</small></h1>
		</div>
	</div>
	<div class="box-body">
	
			<div class="row form-horizontal form-filter">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="Airport" class="col-sm-3 control-label text-right">Sân bay: </label>
						<div class=" col-sm-9">
							{!! Form::select('airport', $airport, null, ['id' => 'shifts-airport', 'class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'irport']) !!}
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="form-group">
						@la_access("Shifts", "create")
						<button class="btn btn-success pull-left" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
						@endla_access
					</div>
				</div>
			</div>
	
	
	
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
		<thead>
		<tr class="success">
			<th>Id</th>
			<th>Sân bay</th>
			<th>Tên hiển thị</th>
			<th style="text-align:center;">Giờ bắt đầu</th>
			<th style="text-align:center;">Giờ kết thúc</th>
			<th style="text-align:center;">Đang hoạt động</th>
			@la_access("Shifts", "edit")
			<th></th>
			@endla_access
		</tr>
		</thead>
		<tbody></tbody>
		</table>
	</div>
</div>
@la_access("Shifts", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="AddModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Shifts", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Shifts", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa ca tra nạp</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.shifts.destroy', 1], 'method'=>'delete', 'id' => 'shift-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi danh sách ca tra nạp không?
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
<script>
$(function () {
	var urlajax = "{{ url(config('laraadmin.adminRoute') . '/shift_dt_ajax') }}" + "/" + $("#shifts-airport").val();
	
	$("#shifts-airport").change(function() {
		urlajax = "{{ url(config('laraadmin.adminRoute') . '/shift_dt_ajax') }}" + "/" + $("#shifts-airport").val();
		$('#example1').DataTable().ajax.url(urlajax).load();
	});
	
	$("#example1").DataTable({ 
		processing: true,
        serverSide: true,
        ajax: urlajax,
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		searching: false,
		paging: false,
		info: false,
		@if($show_actions)
			columnDefs: [ { orderable: false, targets: [-1] }, { visible: false, targets: [1] }, { className: "text-center", "targets": [3, 4, 5] }],
		@else
			columnDefs: [ { visible: false, targets: [1] }],
		@endif
	});
});
// Add Process
$("#AddBtn").click(function() {
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/shift_fm_add') }}" }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#shift-add-form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseAdd});
				return false;
			}
		});
	});
});
function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#shift-add-form").validate().resetForm();		
	$('#AddModal').modal('hide');
	$('#example1').DataTable().ajax.reload();
	toastr.success('', 'Đã thêm ca tra nạp mới.', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#shift-edit-form").validate({
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
	$('#shift-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#shift-delete-form").validate({
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
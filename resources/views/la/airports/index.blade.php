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
			<h1><i class="fa {{$module->fa_icon}}"></i> SÂN BAY<small>| Danh sách sân bay</small></h1>
			<span class="headerElems">
			@la_access("Airports", "create")
				<button class="btn btn-success btn-sm pull-right" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm sân bay mới</button>
			@endla_access
			</span>
		</div>
	</div>
	<div class="box-body">
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th></th>
			@endif
		</tr>
		</thead>
		<tbody></tbody>
		</table>
	</div>
</div>
@la_access("Airports", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="AddModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Airports", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@la_access("Airports", "delete")
<div class="modal fade" id="DeleteModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="DeleteModalContent" class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-trash"></i> XÓA<small>| Xóa sân bay</small></h1>
            </div>
			{!! Form::open(['route' => [config('laraadmin.adminRoute') . '.airports.destroy', 1], 'method'=>'delete', 'id' => 'airport-delete-form']) !!}
			<div class="modal-body">
                Bạn có chắc chắn muốn xóa <b><span class="name-delete text-red"></span></b> khỏi danh sách sân bay không?
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
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/airport_dt_ajax') }}",
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		searching: false,
		paging: false,
		info: false,
		@if($show_actions)
			columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
});
// Add Process
$("#AddBtn").click(function() {
	$.ajax({ url: "{{ url(config('laraadmin.adminRoute') . '/airport_fm_add') }}" }).done(function(htmlcode) {
		$('#AddModalContent').html(htmlcode);
		loadUI();
		$('#AddModal').modal('show');
		$("#airport-add-form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseAdd});
				return false;
			}
		});
	});
});
function ResponseAdd(responseText, statusText, xhr, $form)  {
	$("#airport-add-form").validate().resetForm();		
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
		$("#airport-edit-form").validate({
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
	$('#airport-delete-form').attr('action', url);
	$('.name-delete').html(name);
	$('#DeleteModal').modal('show');
	$("#airport-delete-form").validate({
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
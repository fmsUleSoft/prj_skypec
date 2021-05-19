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
			<h1><i class="fa {{$module->fa_icon}}"></i> PHÂN QUYỀN NGƯỜI DÙNG<small>| Danh sách nhóm quyền người dùng</small></h1>
			<span class="headerElems">
			@la_access("Airports", "create")
				<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm nhóm quyền mới</button>
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
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Roles", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm nhóm quyền người sử dụng mới</small></h1>
			</div>
			{!! Form::open(['action' => 'LA\RolesController@store', 'id' => 'role-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_input($module, 'name', null, null, "form-control text-uppercase", ["placeholder" => "Là CHỮ IN HOA dùng '_' để nối các khoảng trắng, ví dụ: 'SUPER_ADMIN'", "autocomplete" => "off"])
					@la_input($module, 'display_name', null, null, "form-control", ["autocomplete" => "off"])
					@la_input($module, 'description', null, null, "form-control", ["autocomplete" => "off"])
					@la_input($module, 'parent')
					@la_input($module, 'IsActive')
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/role_dt_ajax') }}",
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
	$("#role-add-form").validate({
		
	});
});
</script>
@endpush
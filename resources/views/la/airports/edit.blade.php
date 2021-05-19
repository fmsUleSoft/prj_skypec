<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $airport->Name !!}</small></h1>
</div>			
{!! Form::model($airport, ['route' => [config('laraadmin.adminRoute') . '.airports.update', $airport->id ], 'method'=>'PUT', 'id' => 'airport-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_input($module, 'IATAcode', null, null, "form-control", ["autocomplete" => "off"])
		@la_input($module, 'ICAOcode', null, null, "form-control", ["autocomplete" => "off"])
		@la_input($module, 'Name', null, null, "form-control", ["autocomplete" => "off"])
		@la_input($module, 'Area')
		@la_input($module, 'IsActive')
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
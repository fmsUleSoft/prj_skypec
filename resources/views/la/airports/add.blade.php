<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm sân bay mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\AirportsController@store', 'id' => 'airport-add-form']) !!}
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
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm Truck mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\TrucksController@store', 'id' => 'truck-add-form']) !!}
<div class="modal-body">
	<div class="box-body">
        @la_form($module)
		
		{{--
		@la_input($module, 'Airport')
		@la_input($module, 'Name')
		@la_input($module, 'Mark')
		@la_input($module, 'Tablet')
		@la_input($module, 'LCR')
		@la_input($module, 'ChassisNumber')
		@la_input($module, 'EngineNumber')
		@la_input($module, 'UsedYear')
		@la_input($module, 'Capacity')
		@la_input($module, 'Unit')
		@la_input($module, 'IsActive')
		--}}
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
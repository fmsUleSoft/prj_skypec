<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $truck->Name !!}</small></h1>
</div>			
{!! Form::model($truck, ['route' => [config('laraadmin.adminRoute') . '.trucks.update', $truck->id ], 'method'=>'PUT', 'id' => 'truck-edit-form']) !!}
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
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
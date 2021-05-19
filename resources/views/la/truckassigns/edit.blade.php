<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $truckassign->Name !!}</small></h1>
</div>			
{!! Form::model($truckassign, ['route' => [config('laraadmin.adminRoute') . '.truckassigns.update', $truckassign->id ], 'method'=>'PUT', 'id' => 'truckassign-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_form($module)
		
		{{--
		@la_input($module, 'airport')
					@la_input($module, 'date')
					@la_input($module, 'shift')
					@la_input($module, 'truck')
					@la_input($module, 'driver')
					@la_input($module, 'technicaler')
		--}}
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
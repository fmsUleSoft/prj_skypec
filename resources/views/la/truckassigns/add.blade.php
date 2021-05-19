<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm TruckAssign mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\TruckAssignsController@store', 'id' => 'truckassign-add-form']) !!}
<div class="modal-body">
	<div class="box-body">
		{!! Form::select('airport', $airport, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'airport']) !!}
					@la_input($module, 'date')
		{!! Form::select('shift', $shift, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Ca...', 'rel' => 'select2', 'name' => 'shift']) !!}
		
		{!! Form::select('truck', $truck, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Xe tra nạp...', 'rel' => 'select2', 'name' => 'truck']) !!}
		{!! Form::select('driver', $driver, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Lái xe...', 'rel' => 'select2', 'name' => 'driver']) !!}
		{!! Form::select('technicaler', $technicaler, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Thợ bơm...', 'rel' => 'select2', 'name' => 'technicaler']) !!}


	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
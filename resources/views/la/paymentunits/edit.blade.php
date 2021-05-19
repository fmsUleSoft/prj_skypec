<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $paymentunit->name !!}</small></h1>
</div>			
{!! Form::model($paymentunit, ['route' => [config('laraadmin.adminRoute') . '.paymentunits.update', $paymentunit->id ], 'method'=>'PUT', 'id' => 'paymentunit-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_form($module)
		
		{{--
		@la_input($module, 'name')
					@la_input($module, 'description')
					@la_input($module, 'IsActive')
		--}}
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
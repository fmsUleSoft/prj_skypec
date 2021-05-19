<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $temporaryprice->Name !!}</small></h1>
</div>			
{!! Form::model($temporaryprice, ['route' => [config('laraadmin.adminRoute') . '.temporaryprices.update', $temporaryprice->id ], 'method'=>'PUT', 'id' => 'temporaryprice-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_form($module)
		
		{{--
		@la_input($module, 'airport')
					@la_input($module, 'month')
					@la_input($module, 'year')
					@la_input($module, 'time_start')
					@la_input($module, 'time_end')
					@la_input($module, 'local')
					@la_input($module, 'contract')
					@la_input($module, 'routetype')
					@la_input($module, 'unit')
					@la_input($module, 'currency')
					@la_input($module, 'unitprice')
		--}}
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
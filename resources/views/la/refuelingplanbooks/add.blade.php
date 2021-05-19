<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm RefuelingPlanBook mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\RefuelingPlanBooksController@store', 'id' => 'refuelingplanbook-add-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_form($module)

		{{--
		@la_input($module, 'airport')
					@la_input($module, 'date')
					@la_input($module, 'status')
		--}}
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
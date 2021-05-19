<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm tiền tệ thanh toán mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\PaymentCurrencysController@store', 'id' => 'paymentcurrency-add-form']) !!}
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
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
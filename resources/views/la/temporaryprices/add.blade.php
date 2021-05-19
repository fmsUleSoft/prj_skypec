<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm giá bán tạm tính mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\TemporaryPricesController@store', 'id' => 'temporaryprice-add-form']) !!}
<div class="modal-body">
	<div class="hr-text" style="margin-top:10px;">
		<hr><span class="hr-detail text-red">  Phân loại</span>
	</div>
	<table class="table table-bordered table-q">
		<tr>
			<td style="width:25%"><b>LOẠI KHÁCH HÀNG</b></td>
			<td style="width:25%"><b>LOẠI HỢP ĐỒNG</b></td>
			<td style="width:25%"><b>LOẠI CHẶNG BAY</b></td>
		</tr>
		<tr>
			<td>@la_input($module, 'customerlocal')</td>
			<td>@la_input($module, 'contract') Có hợp đồng</td>
			<td>@la_input($module, 'routetype')</td>
		</tr>
	</table>
	<div class="hr-text" style="margin-top:20px;">
		<hr><span class="hr-detail text-red">  Đơn giá</span>
	</div>
	<table class="table table-bordered table-q">
		<tr>
			<td style="width:25%"><b>ĐƠN VỊ SỐ LƯỢNG</b></td>
			<td style="width:25%"><b>TIỀN TỆ</b></td>
			<td style="width:25%"><b>ĐƠN GIÁ</b></td>
		</tr>
		<tr>
			<td>@la_input($module, 'unit')</td>
			<td>@la_input($module, 'currency')</td>
			<td>@la_input($module, 'unitprice')</td>
		</tr>
	</table>

	
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
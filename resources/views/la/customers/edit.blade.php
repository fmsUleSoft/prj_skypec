<?php
if ($customer->agency == null){
	$customer->agency = 0;
}
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $customer->name !!}</small></h1>
</div>
{!! Form::model($customer, ['route' => [config('laraadmin.adminRoute') . '.customers.update', $customer->id ], 'method'=>'PUT', 'id' => 'customer-edit-form']) !!}
<div class="modal-body">
		<table class="table table-bordered table-q">
			<tr>
				<td style="width:25%"><b>MÃ KHÁCH HÀNG</b></td>
				<td style="width:25%"><b>TÊN KHÁCH HÀNG</b></td>
				<td style="width:25%"><b>MÃ SỐ THUẾ</b></td>
				<td><b>TRẠNG THÁI</b></td>
			</tr>
			<tr>
				<td>@la_input($module, 'code')</td>
				<td>@la_input($module, 'name')</td>
				<td>@la_input($module, 'taxcode')</td>
				<td>@la_input($module, 'IsActive') Đang hoạt động</td>
			</tr>
			<tr>
				<td colspan="2"><b>TÊN VIẾT HÓA ĐƠN</b></td>
				<td colspan="2"><b>ĐỊA CHỈ</b></td>
			</tr>
			<tr>
				<td colspan="2">@la_input($module, 'nameinvoice')</td>
				<td colspan="2">@la_input($module, 'address')</td>
			</tr>
		</table>
		<table class="table table-bordered" style="margin-bottom:0px;">
			<tr>
				<td style="width:50%">
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Phân loại khách hàng</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">Nhóm khách hàng</td>
							<td style="border-top:none;">@la_input($module, 'group')</td>
						</tr>
						<tr>
							<td>Loại khách hàng</td>
							<td>@la_input($module, 'local')</td>
						</tr>
						<tr>
							<td>Hợp đồng</td>
							<td>@la_input($module, 'contract')</td>
						</tr>
						<tr>
							<td>Số hợp đồng</td>
							<td>@la_input($module, 'contractnumber')</td>
						</tr>
						<tr>
							<td>Hiệu lực hợp đồng</td>
							<td>@la_input($module, 'expirationdate')</td>
						</tr>
					</table>
				</td>
				<td>
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Thanh toán</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">Đơn vị số lượng</td>
							<td style="border-top:none;">@la_input($module, 'unit')</td>
						</tr>
						<tr>
							<td>Đơn vị tiền tệ</td>
							<td>@la_input($module, 'currency')</td>
						</tr>
						<tr>
							<td>Đại lý thanh toán</td>
							<td>{!! Form::select('agency', $agency, null, ['class' => 'form-control', 'data-placeholder' => 'Thanh toán qua...', 'rel' => 'select2', 'name' => 'agency']) !!}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
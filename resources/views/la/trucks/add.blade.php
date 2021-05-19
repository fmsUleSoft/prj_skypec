<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm xe tra nạp mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\TrucksController@store', 'id' => 'truck-add-form', 'autocomplete' => 'off']) !!}
<div class="modal-body">
		{!! Form::select('airport', $airport, null, ['class' => 'form-control', 'required' => '1', 'name' => 'airport', 'style' => 'display:none']) !!}
		<table class="table table-bordered table-q">
			<tr>
				<td style="width:25%"><b>BIỂN KIỂM SOÁT</b></td>
				<td style="width:25%"><b>ĐỊNH DANH TRÊN EXCEL</b></td>
				<td style="width:25%"><b>HÃNG SẢN XUẤT</b></td>
				<td><b>TRẠNG THÁI</b></td>
			</tr>
			<tr>
				<td>@la_input($module, 'name')</td>
				<td>@la_input($module, 'excelid')</td>
				<td>@la_input($module, 'mark')</td>
				<td>@la_input($module, 'IsActive') Đang hoạt động</td>
			</tr>
		</table>
		<table class="table table-bordered" style="margin-bottom:0px;">
			<tr>
				<td style="width:50%">
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Thông tin xe tra nạp</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">Số khung</td>
							<td style="border-top:none;">@la_input($module, 'chassisnumber')</td>
						</tr>
						<tr>
							<td>Số máy</td>
							<td>@la_input($module, 'enginenumber')</td>
						</tr>
						<tr>
							<td>Dung tích</td>
							<td>@la_input($module, 'capacity')</td>
						</tr>
						<tr>
							<td>Đơn vị tính</td>
							<td>@la_input($module, 'unit')</td>
						</tr>
						<tr>
							<td>Năm sử dụng</td>
							<td>@la_input($module, 'usedyear')</td>
						</tr>
						
					</table>
				</td>
				<td>
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Thông số kết nối LCR</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">SSID</td>
							<td style="border-top:none;">@la_input($module, 'ssid')</td>
						</tr>
						<tr>
							<td>Mật khẩu</td>
							<td><input autocomplete="new-password" class="form-control" placeholder="Mật khẩu..." data-rule-minlength="6" data-rule-maxlength="256" required="1" name="password" type="password" value="" aria-required="true" aria-autocomplete="list" aria-invalid="false" id="password" ></td>
						</tr>
						<tr>
							<td>Nhắc lại mật khẩu</td>
							<td><input autocomplete="new-password" class="form-control" placeholder="Nhắc lại mật khẩu..." data-rule-minlength="6" data-rule-maxlength="256" required="1" name="password_confirm" type="password" value="" aria-required="true" aria-autocomplete="list" aria-invalid="false"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
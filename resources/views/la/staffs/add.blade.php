<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm nhân viên tra nạp mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\StaffsController@store', 'id' => 'staff-add-form', "autocomplete" => "off"]) !!}
<div class="modal-body">
		{!! Form::select('airport', $airport, null, ['class' => 'form-control', 'required' => '1', 'name' => 'airport', 'style' => 'display:none']) !!}
		<table class="table table-bordered table-q">
			<tr>
				<td style="width:25%"><b>MÃ NHÂN VIÊN</b></td>
				<td style="width:25%"><b>TÊN NHÂN VIÊN</b></td>
				<td colspan="2"><b>NĂNG ĐỊNH</b></td>
				<td><b>TRẠNG THÁI</b></td>
			</tr>
			<tr>
				<td>@la_input($module, 'employee_code')</td>
				<td>@la_input($module, 'name')</td>
				<td>@la_input($module, 'driver') Lái xe</td>
				<td>@la_input($module, 'technicaler') Thợ bơm</td>
				<td>@la_input($module, 'IsActive') Đang hoạt động</td>
			</tr>
		</table>
		<table class="table table-bordered" style="margin-bottom:0px;">
			<tr>
				<td style="width:50%">
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Tài khoản</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">Tên trên QLHH</td>
							<td style="border-top:none;">@la_input($module, 'idqlhh')</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>@la_input($module, 'email')</td>
						</tr>
						<tr>
							<td>Mật khẩu</td>
							<td>@la_input($module, 'password', null, null, "form-control", ["id" => "password", "autocomplete" => "new-password"])</td>
						</tr>
						<tr>
							<td>Nhắc lại mật khẩu</td>
							<td><input autocomplete="new-password" class="form-control" placeholder="Nhắc lại mật khẩu..." data-rule-minlength="6" data-rule-maxlength="250" required="1" name="password_confirm" type="password" value="" aria-required="true" aria-autocomplete="list" aria-invalid="false"></td>
						</tr>
					</table>
				</td>
				<td>
					<div class="hr-text" style="margin-top:-9px;">
						<span class="hr-detail text-red">Quyền thao tác</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:80px">@la_input($module, 'create')</td>
							<td style="border-top:none;">Tạo kế hoạch trên App</td>
						</tr>
						<tr>
							<td>@la_input($module, 'edit')</td>
							<td>Sửa kế hoạch trên App</td>
						</tr>
						<tr>
							<td>@la_input($module, 'delete')</td>
							<td>Xóa kế hoạch trên App</td>
						</tr>
						<tr>
							<td>@la_input($module, 'create1')</td>
							<td>Tạo khách hàng mới trên App</td>
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
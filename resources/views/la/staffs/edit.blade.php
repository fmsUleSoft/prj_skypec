<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $staff->name !!}</small></h1>
</div>			
{!! Form::model($staff, ['route' => [config('laraadmin.adminRoute') . '.staffs.update', $staff->id ], 'method'=>'PUT', 'id' => 'staff-edit-form']) !!}
<div class="modal-body">
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
					</table>
					<div class="hr-text" style="margin-top:20px;">
						<hr><span class="hr-detail text-red">Làm việc tại sân bay</span>
					</div>
					<table class="table table-q table-col">
						<tr>
							<td style="border-top:none;width:140px">Sân bay</td>
							<td style="border-top:none;">{!! Form::select('airport', $airport, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'airport']) !!}</td>
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
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
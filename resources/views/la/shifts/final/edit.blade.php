<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $shift->name !!}</small></h1>
</div>			
{!! Form::model($shift, ['route' => [config('laraadmin.adminRoute') . '.shifts.update', $shift->id ], 'method'=>'PUT', 'id' => 'shift-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		<div class="form-group">
			<label for="Airport">Sân bay* :</label>
			{!! Form::select('airport', $airport, null, ['class' => 'form-control', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'airport']) !!}
		</div>
		@la_input($module, 'name', null, null, "form-control", ["autocomplete" => "off"])
		@la_input($module, 'description', null, null, "form-control", ["autocomplete" => "off"])
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Giờ bắt đầu* :</label>
					<div class="input-group time24">
						{!! Form::text('time_start', $value = gmdate('H:i', $shift->time_start), ['class' => 'form-control', 'required' => '1', 'placeholder' => 'Giờ bắt đầu...', 'aria-required' => 'true', 'autocomplete' => 'off']) !!}
						<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Giờ kết thúc* :</label>
					<div class="input-group time24">
						{!! Form::text('time_end', $value = gmdate('H:i', $shift->time_end), ['class' => 'form-control', 'required' => '1', 'placeholder' => 'Giờ bắt đầu...', 'aria-required' => 'true', 'autocomplete' => 'off']) !!}
						<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
					</div>
					<div class="form-group">
						{!! Form::checkbox('nextday', $shift->nextday) !!}
						<label>Ngày hôm sau</label>
					</div>
				</div>
			</div>
			<div class="col-lg-4">@la_input($module, 'IsActive')</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
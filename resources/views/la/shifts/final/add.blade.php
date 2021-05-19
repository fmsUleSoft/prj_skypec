<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm ca tra nạp mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\ShiftsController@store', 'id' => 'shift-add-form']) !!}
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
						{!! Form::text('time_start', null, ['class' => 'form-control', 'required' => '1', 'placeholder' => 'Giờ bắt đầu...', 'aria-required' => 'true', 'autocomplete' => 'off']) !!}
						<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Giờ kết thúc* :</label>
					<div class="input-group time24">
						{!! Form::text('time_end', null, ['class' => 'form-control', 'required' => '1', 'placeholder' => 'Giờ bắt đầu...', 'aria-required' => 'true', 'autocomplete' => 'off']) !!}
						<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
					</div>
					<div class="form-group">
						{!! Form::checkbox('nextday', 'value') !!}
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
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
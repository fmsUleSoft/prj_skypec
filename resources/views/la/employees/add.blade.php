<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm Employee mới</small></h1>
</div>
{!! Form::open(['action' => 'LA\EmployeesController@store', 'id' => 'employee-add-form']) !!}
<div class="modal-body">
	<div class="box-body">
		@la_form($module)

		{{--
		@la_input($module, 'name')
					@la_input($module, 'date_birth')
					@la_input($module, 'gender')
					@la_input($module, 'email')
					@la_input($module, 'mobile')
					@la_input($module, 'airport')
					@la_input($module, 'designation')
					@la_input($module, 'dept')
					@la_input($module, 'city')
					@la_input($module, 'address')
					@la_input($module, 'about')
					@la_input($module, 'date_hire')
					@la_input($module, 'date_left')
					@la_input($module, 'salary_cur')
		--}}
		<div class="form-group">
			<label for="role">Role* :</label>
			<select class="form-control" required="1" data-placeholder="Select Role" rel="select2" name="role">
				<?php $roles = App\Role::all(); ?>
				@foreach($roles as $role)
					@if($role->id != 1)
						<option value="{{ $role->id }}">{{ $role->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
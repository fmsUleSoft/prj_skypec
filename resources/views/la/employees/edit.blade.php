<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h1><i class="fa fa-edit"></i> CHỈNH SỬA<small>| {!! $employee->name !!}</small></h1>
</div>	
{!! Form::model($employee, ['route' => [config('laraadmin.adminRoute') . '.employees.update', $employee->id ], 'method'=>'PUT', 'id' => 'employee-edit-form']) !!}
<div class="modal-body">
	<div class="box-body">
		
		<div class="row">
			<div class="col-lg-4">@la_input($module, 'name')</div>
			<div class="col-lg-4">@la_input($module, 'date_birth')</div>
			<div class="col-lg-4">@la_input($module, 'gender')</div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">@la_input($module, 'email')</div>
			<div class="col-lg-6">@la_input($module, 'mobile')</div>
		</div>
		<hr class="my-4" style="margin-top:0px;">
		<div class="form-group">
			
			<label for="Airport">Được cấp phép sử dụng tại các sân bay*:</label>
			{{Form::select('airport', $airport, StrArr2Arr($employee->airport), array('multiple' => 'multiple', 'class' => 'form-control', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'airport[]'))}}
		</div>
					
		@la_input($module, 'designation')
			
		<div class="form-group">
			<label for="role">Quyền người sử dụng* :</label>
			<select class="form-control" required="1" data-placeholder="Select Role" rel="select2" name="role">
				<?php $roles = App\Role::all(); ?>
				@foreach($roles as $role)
					@if($role->id != 1 || Entrust::hasRole("SUPER_ADMIN"))
						@if($user->hasRole($role->name))
							<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
						@else
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endif
					@endif
				@endforeach
			</select>
		</div>
	
	</div>
</div>	
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	{!! Form::submit( 'Cập nhật', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
@extends("la.layouts.app")

@section("main-content")
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box box-widget">
	<div class="box-header with-border">
		<div class="content-header">
			<h1><i class="fa {{$module->fa_icon}}"></i> KẾ HOẠCH TRA NẠP<small>| Quản lý kế hoạch tra nạp</small></h1>
		</div>
	</div>
	<div class="box-body">
		

			<div class="form-horizontal form-filter">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="Airport" class="col-sm-3 control-label text-right">Sân bay:</label>
						<div class=" col-sm-9">
							{!! Form::select('airport', $airport, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'Airport']) !!}
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="form-group">
						<label for="reservation" class="col-sm-4 control-label text-right">Ngày kế hoạch:</label>
						
						<div class=" col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="reservation">
							</div>
							<!-- /.input group -->
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<button class="btn btn-info pull-left"><i class="fa fa-filter"></i>&nbsp;&nbsp;Lọc</button>
						@la_access("RefuelingPlanBooks", "create")
						<button class="btn btn-success pull-left" id="AddBtn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tạo mới</button>
					@endla_access
					</div>
				</div>
			</div>
			
		<table id="example1" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th></th>
			@endif
		</tr>
		</thead>
		<tbody></tbody>
		</table>
	</div>
</div>
@la_access("RefuelingPlanBooks", "create")
<div class="modal fade" id="AddModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="AddModalContent" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1><i class="fa fa-plus-square"></i> TẠO MỚI<small>| Thêm kế hoạch tra nạp mới</small></h1>
			</div>
			{!! Form::open(['action' => 'LA\RefuelingPlanBooksController@store', 'id' => 'refuelingplanbook-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<div class="row">
						<div class="col-lg-6">		
							<div class="form-group">
								<label for="Airport">Sân bay:</label>
								{!! Form::select('airport', $airport, null, ['class' => 'form-control select2', 'required' => '1', 'data-placeholder' => 'Sân bay...', 'rel' => 'select2', 'name' => 'Airport']) !!}
							</div>
						</div>
						<div class="col-lg-6">@la_input($module, 'date', null, null, "form-control", ["autocomplete" => "off"])</div>
					</div>
					<hr class="my-4" style="margin-top:0px;margin-bottom:15px;">
					<div class="form-group">
						<label for="Airport">Chọn phương thức tạo kế hoạch:</label>
						<a class="btn btn-app" style="width:120px;height:80px;margin-bottom:0px;"><i class="fa fa-upload"></i> Nhập dữ liệu<br>theo biểu mẫu QT25<br>
						<label>
						  <input type="radio" name="method-create" class="minimal" value="0">
						</label>
						</a>
						<a class="btn btn-app disabled" style="width:120px;height:80px;margin-bottom:0px;"><i class="fa fa-magic"></i> Tạo kế hoạch từ<br> nguồn lịch bay có sẵn<br>
						<label>
						  <input type="radio" name="method-create" class="minimal" value="1">
						</label>
						</a>
					</div>
					<hr class="my-4 hr-create" style="margin-top:0px;margin-bottom:10px;display:none">
					<div class="form-group qt25-create" style="display:none">
						<label for="exampleInputFile1">Chọn file dữ liệu</label>
						<input type="file1" id="exampleInputFile1">
					</div>
					<div class="form-group auto-create" style="display:none">
						<label for="exampleInputFile2">Chọn thư mục chứa kế hoạch bay gốc</label>
						<input type="file2" id="exampleInputFile2">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					{!! Form::submit( 'Tạo mới', ['class'=>'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="width:1140px;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			
			
			
				<div class="mailbox-controls">
					<!-- Check all button -->
					<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
					</button>
					<div class="btn-group">
					  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
					  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
					  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
					</div>
					<!-- /.btn-group -->
					<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
					<div class="pull-right">
					  1-50/200
					  <div class="btn-group">
						<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
						<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
					  </div>
					  <!-- /.btn-group -->
					</div>
					<!-- /.pull-right -->
				  </div>
				  
				  
				<div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">28 mins ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">11 hours ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">15 hours ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">Yesterday</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">2 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">2 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">4 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">12 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">12 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">14 days ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">15 days ago</td>
                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
  
				  
				  
				  
				  
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endla_access

@la_access("RefuelingPlanBooks", "edit")
<div class="modal fade" id="EditModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div id="EditModalContent" class="modal-content"></div>
	</div>
</div>
@endla_access
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/uikit.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/datatables/dataTables.uikit.min.js') }}"></script>
<script>
$(function (){
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/refuelingplanbook_dt_ajax') }}",
		language: {
			url: "{{ asset('la-assets/plugins/datatables/vietnamese.json') }}"
		},
		searching: false,
		paging: false,
		info: false,
		@if($show_actions)
			columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
});

// Add Process
$("#AddBtn").click(function() {
	$('#exampleModalScrollable').modal("show");
});



// Edit Process
function EditProcess(url){
	$.ajax({ url: url }).done(function(htmlcode) {
		$('#EditModalContent').html(htmlcode);
		loadUI();
		$('#EditModal').modal("show");
		$("#refuelingplanbook-edit-form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({success: ResponseEdit});
				return false;
			}
		});
	});
}
function ResponseEdit()  {
	$('#EditModal').modal('hide');
	$('#example1').DataTable().ajax.reload();		
	toastr.info('', 'Đã cập nhật dữ liệu mới', {positionClass: "toast-bottom-right", timeOut: "3000"}).css({ "width":"auto", "max-width":"100em" });
}
</script>
@endpush
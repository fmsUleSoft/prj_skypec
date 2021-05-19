<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/10866277e5.js" crossorigin="anonymous"></script>

<!-- jquery.validate + jquery.form -->
<script src="{{ asset('la-assets/plugins/jquery-validation/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/jquery-validation/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/jquery-form/jquery.form.js') }}" type="text/javascript"></script>

<!-- Select2 -->
<script src="{{ asset('la-assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('la-assets/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap DateRangePicker -->
<script src="{{ asset('la-assets/plugins/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- Bootstrap DatePicker -->
<script src="{{ asset('la-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.vi.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap TimePicker -->
<script src="{{ asset('la-assets/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap DateTimePicker -->
<script src="{{ asset('la-assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

<!-- Toastr -->
<script src="{{ asset('la-assets/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('la-assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('la-assets/js/adminlte.js') }}" type="text/javascript"></script>

<script src="{{ asset('la-assets/plugins/stickytabs/jquery.stickytabs.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

@stack('scripts')
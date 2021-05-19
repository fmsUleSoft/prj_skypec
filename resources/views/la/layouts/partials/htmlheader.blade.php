<head>
    <meta charset="UTF-8">
    <title>@hasSection('htmlheader_title')@yield('htmlheader_title') - @endif{{ LAConfigs::getByKey('sitename') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('la-assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    
	<!-- Ionicons -->
	<link href="{{ asset('la-assets/plugins/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    
	<!-- Select2 -->
	<link href="{{ asset('la-assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	
	<!-- Bootstrap DateRangePicker -->
	<link href="{{ asset('la-assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
	<!-- Bootstrap DatePicker -->
	<link href="{{ asset('la-assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Bootstrap TimePicker -->
	<link href="{{ asset('la-assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- iCheck -->
    <link href="{{ asset('la-assets/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<!-- Toastr -->
	<link rel="stylesheet" href="{{ asset('la-assets/plugins/toastr/toastr.min.css') }}">
	
	<!-- Theme style -->
    <link href="{{ asset('la-assets/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('la-assets/css/skins/'.LAConfigs::getByKey('skin').'.css') }}" rel="stylesheet" type="text/css" />
    <!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,300italic,400italic,600italic">
  
    @stack('styles')
    
</head>

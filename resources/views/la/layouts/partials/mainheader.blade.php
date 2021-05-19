<!-- Main Header -->
<header class="main-header">

	@if(LAConfigs::getByKey('layout') != 'layout-top-nav')
	<!-- Logo -->
	<a href="{{ url(config('laraadmin.adminRoute')) }}" class="logo">
		<!-- mini logo for sidebar mini 40x40 pixels -->
		<span class="logo-mini"><img src="{{ asset('la-assets/img/logo_mini.svg') }}" width="40" height="40" alt="homepage" class="light-logo"></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><img src="{{ asset('la-assets/img/logo_.svg') }}" width="430" height="60" class="light-logo" alt="homepage"></span>
	</a>
	@endif

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top">
	@if(LAConfigs::getByKey('layout') == 'layout-top-nav')
		<div class="container">
			<div class="navbar-header">
				<a href="{{ url(config('laraadmin.adminRoute')) }}" class="navbar-brand"><b>{{ LAConfigs::getByKey('sitename_part1') }}</b>{{ LAConfigs::getByKey('sitename_part2') }}</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			@include('la.layouts.partials.top_nav_menu')
			@include('la.layouts.partials.notifs')
		</div><!-- /.container-fluid -->
	@else
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<ul class="nav navbar-nav">
			<li><a href="index3.html" class="nav-link">Trang chủ</a></li>
			<li><a href="index3.html" class="nav-link">Hướng dẫn sử dụng</a></li>
		</ul>
		
		@include('la.layouts.partials.notifs')
	@endif
	
	</nav>
</header>

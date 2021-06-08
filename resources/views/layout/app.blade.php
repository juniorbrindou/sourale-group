<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }}</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		{{-- Navbar --}}
		@include('layout._navbar')
		{{-- Navbar --}}


		{{-- Main Sidebar Container --}}
		@include('layout._sidebar')
		{{-- Main Sidebar Container --}}


		{{-- Content Wrapper. Contains page content --}}
		<div class="content-wrapper">


			{{-- Breadcrumbs --}}
			@include('layout._breadcrumbs')
			{{-- /.breadcrumbs --}}


			{{-- Main content --}}
			@yield('main')
			{{-- /.content --}}

		</div>

		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->



		{{-- footer --}}
		@include('layout._footer')
		{{-- /.footer --}}

	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- overlayScrollbars -->
	<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('dist/js/adminlte.js')}}"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
	<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
	<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
	<!-- ChartJS -->
	<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('dist/js/demo.js')}}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
</body>

</html>
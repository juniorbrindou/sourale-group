<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Fixed Navbar Layout</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
	<!-- Site wrapper -->
	<div class="wrapper">


		{{-- Navbar --}}
			@include('layout._topbar')
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
		{{-- /.content-wrapper --}}


		{{-- footer --}}
			@include('layout._footer')
		{{-- /.footer --}}


		{{-- Control Sidebar --}}
		<aside class="control-sidebar control-sidebar-dark">
			{{-- Control sidebar content goes here --}}
		</aside>
		{{-- /.control-sidebar --}}


	</div>
	{{-- ./wrapper --}}
	
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="plugins/raphael/raphael.min.js"></script>
	<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="plugins/chart.js/Chart.min.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard2.js"></script>

</body>
</html>

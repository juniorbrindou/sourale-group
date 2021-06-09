<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | DataTables</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		@include('layout._navbar')

		<!-- Sidebar Menu -->
		@include('layout._sidebar')
		<!-- /.sidebar-menu -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>ARTICLES</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">ARTICLES</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Liste des articles </h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Code Article</th>
												<th>Nom de l'article</th>
												<th>Quantité</th>
												<th>Caution</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Trident</td>
												<td>Internet
													Explorer 4.0
												</td>
												<td>Win 95+</td>
												<td> 4</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>

												</td>
											</tr>
											<tr>
												<td>Trident</td>
												<td>Internet
													Explorer 5.0
												</td>
												<td>Win 95+</td>
												<td>5</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</td>
											</tr>
											<tr>
												<td>KHTML</td>
												<td>Konqureror 3.1</td>
												<td>KDE 3.1</td>
												<td>3.1</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</td>
											</tr>
											<tr>
												<td>KHTML</td>
												<td>Konqureror 3.3</td>
												<td>KDE 3.3</td>
												<td>3.3</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</td>
											</tr>
											<tr>
												<td>KHTML</td>
												<td>Konqureror 3.5</td>
												<td>KDE 3.5</td>
												<td>3.5</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</td>
											</tr>
											<tr>
												<td>Tasman</td>
												<td>Internet Explorer 4.5</td>
												<td>Mac OS 8-9</td>
												<td>-</td>
												<td>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Quantité</th>
												<th>Engine version</th>
												<th>
													<button type="button" class="btn btn-primary btn-md">
														<i class="fa fa-eye"></i>
														voir
													</button>

													<button type="button" class="btn btn-danger btn-md">
														<i class="fa fa-trash"></i>
														Suprimer
													</button>
												</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		@include('layout._footer')

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="plugins/jszip/jszip.min.js"></script>
	<script src="plugins/pdfmake/pdfmake.min.js"></script>
	<script src="plugins/pdfmake/vfs_fonts.js"></script>
	<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- Page specific script -->
	<script>
		$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
	</script>
</body>

</html>
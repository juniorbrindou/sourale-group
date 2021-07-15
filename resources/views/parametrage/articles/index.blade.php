@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Liste des articles </h3>

						<a href="{{ route('articles.create')}}" class="btn float-right  btn-md btn-success">
							<i class="fa fa-plus-circle"></i>
							Ajouter
						</a>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Code</th>
									<th>Nom de l'article</th>
									<th>Quantité</th>
									<th>Caution</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Art-0014</td>
									<td>Cuillere en or</td>
									<td>2.050</td>
									<td>300F CFA</td>
									<td>
										<a href="{{url('articles/1')}}" class="btn btn-primary btn-md">
											<i class="fa fa-eye"></i>
											voir
										</a>

										<button type="button" class="btn btn-danger btn-md">
											<i class="fa fa-trash"></i>
											Suprimer
										</button>

									</td>
								</tr>
								<tr>
									<td>Art-0095</td>
									<td>Chaise en argent</td>
									<td>150</td>
									<td>1000F CFA</td>
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
									<td>Art-0012</td>
									<td>Table en bois ronde courleur bleu</td>
									<td>20</td>
									<td>3000F CFA</td>
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
									<td>Art-0078</td>
									<td>Cuillere en jettables en plastique</td>
									<td>5.000</td>
									<td>0F CFA</td>
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
									<td>Art-0045</td>
									<td>Podium type bois</td>
									<td>3</td>
									<td>25.000F CFA</td>
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
									<td>Art-0005</td>
									<td>Plateau pour servir la nourriture</td>
									<td>450</td>
									<td>1.200F CFA</td>
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
									<th>Code Article</th>
									<th>Nom de l'article</th>
									<th>Quantité</th>
									<th>Caution</th>
									<th>
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
@endsection

@push('styles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@endpush


@push('scripts')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
	$(function () {
		$("#example1").DataTable({
		  "responsive": true, "lengthChange": true, "autoWidth": true,
		  "buttons": ["excel", "pdf", "print"]
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
@endpush
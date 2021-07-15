@extends('layout.app')

@section('main')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Liste des types d'articles</h3>

						<a href="{{ route('typeArticles.create')}}" class="btn float-right  btn-md btn-success">
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
									<th>Libelle</th>
									<th>description</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($typeArticles as $typeArticle)

								<tr>
									<td>{{ $typeArticle->code }} </td>
									<td>{{ $typeArticle->libelle }} </td>
									<td>{{ isset($typeArticle->description) ? $typeArticle->description : 'Aucune description' }}
									</td>
									<td>
										<button class="btn btn-warning btn-md" data-toggle="modal"
											data-target="#modal-see-{{$typeArticle->id}}">
											<i class="fa fa-eye"></i>
										</button>
										<a href="{{ route('typeArticles.edit', $typeArticle->id) }}" title="Modiffier"
											class="btn btn-primary btn-md">
											<i class="fa fa-pen"></i>
										</a>
										<button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
											data-target="#modal-danger">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>

								<div class="modal fade" id="modal-danger-{{$typeArticle->id}}">
									<div class="modal-dialog">
										<div class="modal-content bg-default">
											<div class="modal-header">
												<h4 class="modal-title">Attention ! Action Irréversible !</h4>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="text-danger">Voulez vous vraiment supprimer le type d'artcle
													<b>{{ $typeArticle->libelle }}</b></p>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="button" class="btn btn-primary"
													data-dismiss="modal">Annuler</button>
												<form method="POST" style="display: inline"
													action="{{ route('typeArticles.destroy', $typeArticle->id ) }}">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-outline-danger">Je
														Confirme</button>
												</form>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->



								<div class="modal fade" id="modal-see-{{$typeArticle->id}}">
									<div class="modal-dialog">
										<div class="modal-content bg-default">
											<div class="modal-header">
												<p>Détails</p>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<p>
													<b>LIBELLE : </b>{{ $typeArticle->libelle }}
												</p>
												<hr>
												<p>
													<b>DESCRIPTION : </b>{{ $typeArticle->description }}
												</p>
											</div>

											<div class="modal-footer justify-content-between">
												<button type="button" class="btn btn-primary btn-block"
													data-dismiss="modal">Fermer</button>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->

								@endforeach

							</tbody>
							<tfoot>
								<tr>
									<th>Code</th>
									<th>Libelle</th>
									<th>description</th>
									<th></th>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
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
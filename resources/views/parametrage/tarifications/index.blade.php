@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Liste des Prix </h3>

						<a href="{{ route('tarifications.create')}}" class="btn float-right  btn-md btn-success">
							<i class="fa fa-plus-circle"></i>
							Ajouter
						</a>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Prix</th>
									<th>Type d'article</th>
									<th>Categorie de l'article</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($tarifs as $tarif)
								<tr>
									<td>{{ $tarif->id}}</td>
									<td>{{ $tarif->prix}}</td>
									<td>{{$tarif->type_article->libelle}}</td>
									<td>{{$tarif->categorie_article->libelle}}</td>
									<td>
										<a href="{{ route('tarifications.edit', $tarif->id) }}" title="Modiffier"
											class="btn btn-primary btn-md">
											<i class="fa fa-pen"></i>
										</a>
										<button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
											data-target="#modal-danger-{{$tarif->id}}">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								<div class="modal fade" id="modal-danger-{{$tarif->id}}">
									<div class=" modal-dialog">
										<div class="modal-content bg-default">
											<div class="modal-header">
												<h4 class="modal-title">Attention ! Action Irréversible !</h4>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="text-danger">Voulez vous vraiment rétirer le prix
													<b>{{ $tarif->prix }} F </b> de la liste des prix</p>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="button" class="btn btn-primary"
													data-dismiss="modal">Annuler</button>
												<form method="POST" style="display: inline"
													action="{{ route('tarifications.destroy', $tarif->id ) }}">
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
								@endforeach

							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Prix</th>
									<th>Type d'article</th>
									<th>Categorie de l'article</th>
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
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
{{-- modal --}}
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">


<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@endpush


@push('scripts')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>


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
{{-- message flash enregistrement --}}
@if (session('success'))
<script>
	$(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			'timerProgressBar':true,
			timer: 4000
		}); 
		
		$(function() {
			Toast.fire({
				icon: 'success',
				title: 'Action Effectuée!'
			})
		});
	});
</script>
@endif
@endpush
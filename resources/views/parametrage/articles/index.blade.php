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
									<th>Image</th>
									<th>Libéllé</th>
									<th>Type</th>
									<th>Categorie</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($articles as $article)
								<tr>
									<td>{{$article->code}}</td>

									<td>
										@if($article->article_photo)
										<img alt="Avatar" class="img-perso"
											src="{{asset('storage/'.$article->article_photo)}}">
										@else
										<img alt="Avatar" class="img-perso"
											src="{{asset('storage/articles/default_article100x100.png')}}">
										@endif
									</td>
									<td>{{ ucwords($article->libelle)}}</td>
									<td>{{$article->type_article->libelle}}</td>
									<td>{{$article->categorie->libelle}}</td>
									<td>
										<a href="{{ route('articles.show', $article->id) }}"
											class="btn btn-warning btn-md mr-1">
											<i class="fa fa-eye"></i>
										</a>
										<a href="{{ route('articles.edit', $article->id) }}" title="Modiffier"
											class="btn btn-primary btn-md">
											<i class="fa fa-pen"></i>
										</a>
										<button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
											data-target="#modal-danger-{{$article->id}}">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>





								{{-- update type article --}}
								<div class="modal fade" id="modal-update-{{$typeArticle->id}}">
									<div class="modal-dialog">
										<div class="modal-content bg-default">
											<div class="modal-header">
												<h4>Modification</h4>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<form method="POST"
												action="{{ route('typeArticles.update', $typeArticle->id)}}">
												@csrf
												@method('PATCH')
												<div class="card-body">

													<div class="row">
														<div class="col-md-12">
															{{-- libelle --}}
															<div class="form-group">
																<label for="libelle">Type d'article</label>
																<input type="text"
																	class="form-control @error('libelle') is-invalid @enderror"
																	value="{{ $typeArticle->libelle }}" name="libelle"
																	id="libelle">
															</div>
															@error('libelle')
															<span class="text-danger"
																style="margin-top: -1.25rem;display: block; font-size:80%"
																role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>


													<div class="row">
														{{-- description --}}
														<div class="col-md-12">
															<div class="form-group">
																<label>Ajouter une description à l'article</label>
																<textarea
																	class="form-control @error('description') is-invalid @enderror"
																	name="description" rows="3"
																	placeholder="Ecrivez ici (optionnelle)...">{{ $typeArticle->description }}</textarea>
															</div>
														</div>
													</div>
												</div>
												<!-- /.card-body -->

												<div class="card-footer">
													<div class="row">
														<div class="col-md-6 col-sm-6 mb-2">
															<button type="button" class="btn btn-outline-secondary"
																data-dismiss="modal">Retour
															</button>
														</div>
														<div class="col-md-6 col-sm-6">
															<button type="submit"
																class="btn btn-primary btn-block">Enregistrer</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->
								{{-- fin update type article --}}




								{{-- suppression --}}
								<div class="modal fade" id="modal-danger-{{$article->id}}"">
									<div class=" modal-dialog">
									<div class="modal-content bg-default">
										<div class="modal-header">
											<h4 class="modal-title">Attention ! Action Irréversible !</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p class="text-danger">Voulez vous vraiment supprimer l'article
												<b>{{ ucwords($article->libelle) }}</b></p>
										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-primary"
												data-dismiss="modal">Annuler</button>
											<form method="POST" style="display: inline"
												action="{{ route('articles.destroy', $article->id ) }}">
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
								{{-- fin suppression --}}
					</div>
					<!-- /.modal -->
					@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Code</th>
							<th>Image</th>
							<th>Libéllé</th>
							<th>Type</th>
							<th>Categorie</th>
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
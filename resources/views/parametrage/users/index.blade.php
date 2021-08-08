@extends('layout.app')

@section('main')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Liste des Utilisateurs</h3>

			<div class="card-tools">
				<a href="{{ route('users.create')}}" class="btn float-right  btn-md btn-success">
					<i class="fa fa-plus-circle"></i>
					Ajouter
				</a>
			</div>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped projects">
				<thead>
					<tr>
						<th style="width: 25%">
							Login
						</th>
						<th style="width: 5%">
							Image
						</th>
						<th>
							Nom et Prenoms
						</th>
						<th style="width: 15%">
							Téléphone
						</th>
						<th style="width: 5%">
							Role
						</th>
						<th style="width: 25%">
						</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($users as $user)
					<tr>
						<td>
							<a>{{ $user->login }}</a><br /><small>Compte Créé Le {{ $user->created_at }}</small>
						</td>

						<td>
							<img alt="Avatar" class="table-avatar" src="{{ userAvatar($user->genre)}}">
						</td>

						<td>
							@if ($user->nom && $user->prenoms)
							{{ $user->nom .' '. $user->prenoms }}
							@else
							<span class="badge badge-danger">Aucun nom (ce compte est incomplet) </span>
							@endif
						</td>

						<td>
							{{ $user->tel1 }} <br> {{ $user->tel2 }}
						</td>
						{{-- {{$user->roles->pivot}} --}}
						<td class="project-state">
							<span class="badge badge-success">{{($user->role) ? $user->role : 'Sécretaire'}}</span>
						</td>

						<td class="project-actions text-right">
							<a class="btn btn-primary btn-sm" href="{{route('users.show', $user->id)}}">
								<i class="fas fa-eye"></i>Voir
							</a>

							{{-- Je peux supprimer seulement les autres --}}
							@if (Auth::user()->login != $user->login)
							<a class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#modal-danger-{{$user->id}}">
								<i class="fas fa-trash"></i>Supprimer
							</a>
							@endif
						</td>
					</tr>

					{{-- modal danger --}}
					<div class="modal fade" id="modal-danger-{{$user->id}}">
						<div class="modal-dialog">
							<div class="modal-content bg-default">
								<div class="modal-header">
									<h4 class="modal-title">Attention ! Action Irréversible !</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p class="text-danger">Voulez vous vraiment supprimer l'Utilisateur
										<b>{{ $user->nom.' '. $user->prenoms }}</b></p>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
									<form method="POST" style="display: inline"
										action="{{ route('users.destroy', $user->id) }}">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-outline-danger">Je
											Confirme
										</button>
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
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->

</section>
<!-- /.content -->
@endsection

@push('styles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

@endpush




@push('scripts')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

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
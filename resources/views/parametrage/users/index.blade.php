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
						<th style="width: 5%">
							Photo
						</th>
						<th style="width: 15%">
							Login
						</th>
						<th>
							Nom et Prenoms
						</th>
						<th style="width: 10%" class="text-center">
							Téléphone
						</th>
						<th style="width: 10%" class="text-center">
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
							<img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
						</td>
						
						<td>
							<a>{{ $user->login }}</a><br/><small>Compte Créé Le {{ $user->created_at }}</small>
						</td>
						
						<td>
							@if ($user->nom && $user->prenoms)
								{{ $user->nom .' '. $user->prenoms }}
							@else
								<span class="badge badge-danger">Aucun nom (ce compte est incomplet)  </span>
							@endif
						</td>

						<td>
							{{ $user->tel1 }} <br> {{ $user->tel2 }}
						</td>

						<td class="project-state">
							<span class="badge badge-success">{{($user->role) ? $user->role : 'Sécretaire'}}</span>
						</td>

						<td class="project-actions text-right">
							<a class="btn btn-primary btn-sm" href="#">
								<i class="fas fa-eye"></i>Voir
							</a>
							<a class="btn btn-info btn-sm" href="#">
								<i class="fas fa-pencil-alt">
								</i>Editer
							</a>
							<a class="btn btn-danger btn-sm" href="#">
								<i class="fas fa-trash"></i>Supprimer
							</a>
						</td>
					</tr>
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
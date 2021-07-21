@extends('layout.app')

@section('main')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Projects</h3>

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
						<th style="width: 1%">
							#
						</th>
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
							Role
						</th>
						<th style="width: 20%">
						</th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 1; $i++) 
						<tr>
							<td>#</td>
							<td>
								<img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
							</td>
							<td>
								<a>AdminLTE v3</a><br /><small>Created 01.01.2019</small>
							</td>
							<td class="project_progress">
								Lorem ipsum dolor sit 
							</td>
							<td class="project-state">
								<span class="badge badge-success">Success</span>
							</td>
							<td class="project-actions text-right">
								<a class="btn btn-primary btn-sm" href="#">
									<i class="fas fa-folder">
									</i>
									View
								</a>
								<a class="btn btn-info btn-sm" href="#">
									<i class="fas fa-pencil-alt">
									</i>
									Edit
								</a>
								<a class="btn btn-danger btn-sm" href="#">
									<i class="fas fa-trash"></i>Delete
								</a>
							</td>
						</tr>
					@endfor 

					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>
							<img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
						</td>
						<td>
							<a>{{ $user->login }}</a><br/><small>Compte Créé Le {{ $user->created_at }}</small>
						</td>
						<td class="project_progress">
							{{ $user->nom }} {{ $user->prenoms }}
						</td>
						<td class="project-state">
							<span class="badge badge-success">Success</span>
						</td>
						<td class="project-actions text-right">
							<a class="btn btn-primary btn-sm" href="#">
								<i class="fas fa-folder">
								</i>
								View
							</a>
							<a class="btn btn-info btn-sm" href="#">
								<i class="fas fa-pencil-alt">
								</i>
								Edit
							</a>
							<a class="btn btn-danger btn-sm" href="#">
								<i class="fas fa-trash"></i>Delete
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
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@endpush
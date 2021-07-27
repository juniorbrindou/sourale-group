@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" src="{{ userAvatar($user->genre)}}"
								alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">{{Auth::user()->login}}</h3>

						<p class="text-muted text-center">{{$user->nom .' '. $user->prenoms}}</p>

						@if (Auth::user()->login === $user->login)

						<form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" name="logout-form"
							id="logout-form">
							{{ csrf_field() }}
							<button class="btn btn-primary btn-block" type="submit">Déconnexion</button>
						</form>

						@endif
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							{{-- <li class="nav-item"><a class="nav-link " href="#activity"
									data-toggle="tab">Activity</a></li>
							<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
							</li> --}}
							<li class="nav-item"><a class="nav-link active" href="#settings"
									data-toggle="tab">Settings</a>
							</li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">


							{{-- <div class="tab-pane active" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm"
											src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="user image">
							<span class="username">
								<a href="#">Jonathan Burke Jr.</a>
							</span>
							<span class="description">Shared publicly - 7:30 PM today</span>
						</div>
						<!-- /.user-block -->
						<p>
							Lorem ipsum represents a long-held tradition for designers,
							typographers and the like. Some people hate it and argue for
							its demise, but others ignore the hate as they create awesome
							tools to help create filler text for everyone from bacon lovers
							to Charlie Sheen fans.
						</p>

						<p>
							<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
								Share</a>
							<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
								Like</a>
							<span class="float-right">
								<a href="#" class="link-black text-sm">
									<i class="far fa-comments mr-1"></i> Comments (5)
								</a>
							</span>
						</p>

						<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
					</div>
					<!-- /.post -->

					<!-- Post -->
					<div class="post clearfix">
						<div class="user-block">
							<img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user7-128x128.jpg')}}"
								alt="User Image">
							<span class="username">
								<a href="#">Sarah Ross</a>
								<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
							</span>
							<span class="description">Sent you a message - 3 days ago</span>
						</div>
						<!-- /.user-block -->
						<p>
							Lorem ipsum represents a long-held tradition for designers,
							typographers and the like. Some people hate it and argue for
							its demise, but others ignore the hate as they create awesome
							tools to help create filler text for everyone from bacon lovers
							to Charlie Sheen fans.
						</p>

						<form class="form-horizontal">
							<div class="input-group input-group-sm mb-0">
								<input class="form-control form-control-sm" placeholder="Response">
								<div class="input-group-append">
									<button type="submit" class="btn btn-danger">Send</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.post -->

				</div> --}}


				<!-- /.tab-pane -->
				{{-- <div class="tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="timeline timeline-inverse">
									<!-- timeline time label -->
									<div class="time-label">
										<span class="bg-danger">
											10 Feb. 2014
										</span>
									</div>
									<!-- /.timeline-label -->
									<!-- timeline item -->
									<div>
										<i class="fas fa-envelope bg-primary"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 12:05</span>

											<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
											</h3>

											<div class="timeline-body">
												Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
												weebly ning heekya handango imeem plugg dopplr jibjab, movity
												jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
												quora plaxo ideeli hulu weebly balihoo...
											</div>
											<div class="timeline-footer">
												<a href="#" class="btn btn-primary btn-sm">Read more</a>
												<a href="#" class="btn btn-danger btn-sm">Delete</a>
											</div>
										</div>
									</div>
									<!-- END timeline item -->
									<!-- timeline item -->
									<div>
										<i class="fas fa-user bg-info"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

											<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted
												your friend request
											</h3>
										</div>
									</div>
									<!-- END timeline item -->
									<!-- timeline item -->
									<div>
										<i class="fas fa-comments bg-warning"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

											<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
											</h3>

											<div class="timeline-body">
												Take me to your leader!
												Switzerland is small and neutral!
												We are more like Germany, ambitious and misunderstood!
											</div>
											<div class="timeline-footer">
												<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
											</div>
										</div>
									</div>
									<!-- END timeline item -->
									<!-- timeline time label -->
									<div class="time-label">
										<span class="bg-success">
											3 Jan. 2014
										</span>
									</div>
									<!-- /.timeline-label -->
									<!-- timeline item -->
									<div>
										<i class="fas fa-camera bg-purple"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 2 days ago</span>

											<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
											</h3>

											<div class="timeline-body">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
											</div>
										</div>
									</div>
									<!-- END timeline item -->
									<div>
										<i class="far fa-clock bg-gray"></i>
									</div>
								</div>
							</div> --}}
				<!-- /.tab-pane -->



				<div class="tab-pane active" id="settings">

					<!-- formulaire de modiffication de profile -->
					<form class="form-horizontal" action="{{route('users.update',$user->id)}}" method="POST">
						@csrf
						@method('PATCH')
						{{-- login --}}
						<div class="form-group row">
							<label for="inputName" class="col-sm-2 col-form-label">Login</label>
							<div class="col-sm-10">
								<input type="text" name="login" value="{{$user->login}}"
									class="form-control @error('login') is-invalid @enderror" id="inputName">

								@error('login')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror
							</div>

						</div>

						{{-- nom --}}
						<div class="form-group row">
							<label for="nom" class="col-sm-2 col-form-label">Nom</label>
							<div class="col-sm-10">
								<input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
									id="nom" value="{{ $user->nom}}">

								@error('nom')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror


							</div>
						</div>

						{{-- prenoms --}}
						<div class="form-group row">
							<label for="prenoms" class="col-sm-2 col-form-label">Prenoms</label>
							<div class="col-sm-10">
								<input type="text" name="prenoms"
									class="form-control @error('prenoms') is-invalid @enderror" id="prenoms"
									value="{{ $user->prenoms}}">

								@error('prenoms')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror
							</div>
						</div>

						{{-- tel1 --}}
						<div class="form-group row">
							<label for="tel1" class="col-sm-2 col-form-label">Contact 1</label>
							<div class="col-sm-10">
								<input type="tel" name="tel1" class="form-control @error('tel1') is-invalid @enderror"
									id="tel1" value="{{ $user->tel1}}">

								@error('tel1')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror

							</div>
						</div>

						{{-- tel2 --}}
						<div class="form-group row">
							<label for="tel2" class="col-sm-2 col-form-label">Contact 2</label>
							<div class="col-sm-10">
								<input type="tel" name="tel2" class="form-control @error('tel2') is-invalid @enderror"
									id="tel2" value="{{ $user->tel2}}">

								@error('tel2')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror

							</div>
						</div>

						{{-- genre --}}
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Genre</label>
							<div class="col-sm-10">
								<select required class="form-control select2 @error('genre') is-invalid @enderror"
									name="genre" style="width: 100%;">
									<option selected="selected" value="Mme">Mme</option>
									<option value="Mlle">Mlle</option>
									<option value="M">M</option>
								</select>
								@error('genre')
								<span class="text-danger" style="margin-top: -1.rem;display: block; font-size:80%"
									role="alert">
									<strong>{{$message}} </strong>
								</span>
								@enderror

							</div>
						</div>

						{{-- role --}}
						<div class="form-group row">
							<label for="inputSkills"
								class="col-sm-2 col-form-label @error('role_id') is-invalid @enderror">Role</label>
							<div class="col-sm-10">
								{{-- name="role_id" --}}
								<input type="text" class="form-control" value="1" id="inputSkills" disabled>
							</div>
						</div>

						<div class="row">
							<div class="offset-sm-2 col-sm-4">
								<input type="reset" class="btn btn-block btn-danger" value="Annuler">
							</div>

							<div class="offset-sm-1 col-sm-4">
								<button type="submit" class="btn btn-block btn-primary">Enregistrer</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div><!-- /.card-body -->
	</div>
	<!-- /.card -->
	</div>
	<!-- /.col -->
	</div>
	<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection


@push('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
@endpush




@push('scripts')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

@endpush
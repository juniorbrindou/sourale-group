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


                        <h3 class="text-center profile-username">{{Auth::user()->login}}</h3>


                        <ul class="mb-3 list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nom</b> <span class="float-right">{{$user->nom .' '. $user->prenoms}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>role</b> <span
                                    class="float-right">{{format_no_array($user->roles->pluck('name'))}}</span>
                            </li>
                        </ul>

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
                    <div class="p-2 card-header">
                        <ul class="nav nav-pills">
                            {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
							</li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" href="#settings" data-toggle="tab">Informations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#activity" data-toggle="tab">
                                    Gestion du Mot de Passe
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane" id="activity">
                                <!-- Post -->
                                <!-- formulaire de modiffication de profile -->
                                <form class="form-horizontal" action="{{route('users.updatePassword',$user->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    {{-- oldPassword --}}
                                    <div class="form-group row">
                                        <label for="oldPassword" class="col-sm-3 col-form-label">Mot de passe
                                            Actuel</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="oldPassword"
                                                class="form-control @error('oldPassword') is-invalid @enderror"
                                                id="oldPassword" value="{{ old('oldPassword') }}">

                                            @error('oldPassword')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- nouveau mot de passe --}}
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Nouveau Mot de
                                            passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" value="{{ old('password') }}">

                                            @error('password')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Confirmation du nouveau mot de passe --}}
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-3 col-form-label">Confirmez le
                                            nouveau mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation">

                                            @error('password_confirmation')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="offset-sm-3 col-sm-4">
                                            <input type="reset" class="btn btn-block btn-danger" value="Annuler">
                                        </div>

                                        <div class="offset-sm-1 col-sm-4">
                                            <button type="submit" class="btn btn-block btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>

                            </div>


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

											<h3 class="border-0 timeline-header"><a href="#">Sarah Young</a> accepted
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
                                <form class="form-horizontal" action="{{route('users.update',$user->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    {{-- login --}}
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Login</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="login" value="{{$user->login}}"
                                                class="form-control @error('login') is-invalid @enderror"
                                                id="inputName">

                                            @error('login')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- nom --}}
                                    <div class="form-group row">
                                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nom"
                                                class="form-control @error('nom') is-invalid @enderror" id="nom"
                                                value="{{ $user->nom}}">

                                            @error('nom')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
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
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- tel1 --}}
                                    <div class="form-group row">
                                        <label for="tel1" class="col-sm-2 col-form-label">Contact 1</label>
                                        <div class="col-sm-10">
                                            <input type="tel" name="tel1"
                                                class="form-control @error('tel1') is-invalid @enderror" id="tel1"
                                                value="{{ $user->tel1}}">

                                            @error('tel1')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>

                                    {{-- tel2 --}}
                                    <div class="form-group row">
                                        <label for="tel2" class="col-sm-2 col-form-label">Contact 2</label>
                                        <div class="col-sm-10">
                                            <input type="tel" name="tel2"
                                                class="form-control @error('tel2') is-invalid @enderror" id="tel2"
                                                value="{{ $user->tel2}}">

                                            @error('tel2')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>

                                    {{-- genre --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Genre</label>
                                        <div class="col-sm-10">
                                            <select required
                                                class="form-control select2 @error('genre') is-invalid @enderror"
                                                name="genre" style="width: 100%;">
                                                <option selected="selected" value="Mme">Mme</option>
                                                <option value="Mlle">Mlle</option>
                                                <option value="M">M</option>
                                            </select>
                                            @error('genre')
                                            <span class="text-danger"
                                                style="margin-top: -1.rem;display: block; font-size:80%" role="alert">
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
                                            @if (Auth::user()->login === $user->login)

                                            @dump($roles)
                                            <input type="text" class="form-control"
                                                value="{{format_no_array($user->roles->pluck('name'))}}"
                                                id="inputSkills" disabled>
                                            @endif
                                            @role('admin|super-admin')
                                            <select required class="form-control select2" name="role"
                                                style="width: 100%;">
                                                @foreach ($roles as $role)
                                                <option @if ($loop->first) selected="selected" @endif
                                                    value="{{$role->name}}"> {{$role->name}}
                                                </option> @endforeach

                                            </select>
                                            @endrole

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

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css')}}">
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
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js')}}"></script>

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
	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
	  theme: 'bootstrap4'
	})

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
	//Money Euro
	$('[data-mask]').inputmask()

	//Date picker
	$('#reservationdate').datetimepicker({
		format: 'L'
	});

	//Date and time picker
	$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

	//Date range picker
	$('#reservation').daterangepicker()
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({
	  timePicker: true,
	  timePickerIncrement: 30,
	  locale: {
		format: 'MM/DD/YYYY hh:mm A'
	  }
	})
	//Date range as a button
	$('#daterange-btn').daterangepicker(
	  {
		ranges   : {
		  'Today'       : [moment(), moment()],
		  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
		  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
		  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		startDate: moment().subtract(29, 'days'),
		endDate  : moment()
	  },
	  function (start, end) {
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	  }
	)

	//Timepicker
	$('#timepicker').datetimepicker({
	  format: 'LT'
	})

	//Bootstrap Duallistbox
	$('.duallistbox').bootstrapDualListbox()

	//Colorpicker
	$('.my-colorpicker1').colorpicker()
	//color picker with addon
	$('.my-colorpicker2').colorpicker()

	$('.my-colorpicker2').on('colorpickerChange', function(event) {
	  $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	})

	$("input[data-bootstrap-switch]").each(function(){
	  $(this).bootstrapSwitch('state', $(this).prop('checked'));
	})

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
	window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
	url: "/target-url", // Set the url
	thumbnailWidth: 80,
	thumbnailHeight: 80,
	parallelUploads: 20,
	previewTemplate: previewTemplate,
	autoQueue: false, // Make sure the files aren't queued until manually added
	previewsContainer: "#previews", // Define the container to display the previews
	clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
	// Hookup the start button
	file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
	document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
	// Show the total progress bar when upload starts
	document.querySelector("#total-progress").style.opacity = "1"
	// And disable the start button
	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
	document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
	myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
	myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
@endpush

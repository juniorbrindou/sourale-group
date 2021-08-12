@extends('layout.app')

@section('main')

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12 ">
				<!-- general form elements -->
				<div class="card card-primary box-perso">
					<div class="card-header">
						<h3 class="card-title">Nouveau Prix</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form method="POST" action="{{ route('tarifications.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="card-body">

							<div class="row">
								<div class="col-md-4 col-xs-12">

									{{-- prix --}}
									<div class="form-group">
										<label for="prix">Prix *</label>
										<input type="number" required
											class="form-control @error('prix') is-invalid @enderror"
											value="{{ old('prix') }}" name="prix" id="prix"
											placeholder="Entrer le prix">
									</div>
									@error('prix')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>


								<div class="col-md-4 ">
									<div class="form-group">
										<label>Type d'article *</label>
										<select required class="form-control select2" name="type_article_id"
											style="width: 100%;">

											@foreach ($type_articles as $type_article)
											<option @if ($loop->first) selected="selected" @endif
												value="{{$type_article->id}}"> {{$type_article->libelle}}
											</option> @endforeach

										</select>
									</div>
									<!-- /.form-group -->
								</div>

								{{-- categorie_id --}}
								<div class="col-md-4 ">
									<div class="form-group">
										<label>Catégorie d'article *</label>
										<select required class="form-control select2" style="width: 100%;"
											name="categorie_article_id" required>

											@foreach ($categories as $categorie)
											<option @if ($loop->first) selected="selected" @endif
												value="{{$categorie->id}}"> {{$categorie->libelle}}
											</option>
											@endforeach

										</select>
									</div>
								</div>


							</div>


							<div class="col-md-3">
								{{-- encore --}}
								<div class="form-group mt-3">
									<label for="switch">Enregistrer Encore</label>
									<input type="checkbox" name="encore" checked data-bootstrap-switch
										data-off-color="danger" data-on-color="success">
								</div>
							</div>

						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<a href="{{ route('tarifications.index') }}"
										class="btn btn-warning btn-block mb-2 text-light">Retour</a>
								</div>
								<div class="col-md-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
								</div>
							</div>
						</div>

					</form>
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col -->


		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>

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
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/dropzone.js')}}"></script>

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
		
		
		$("input[data-bootstrap-switch]").each(function(){
	  	$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})
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
		file.previewElement.querySelector(".start").onclick = function() {
			 myDropzone.enqueueFile(file)
			}
	})

  myDropzone.on("sending", function(file) {
	// Show the total progress bar when upload starts
	document.querySelector("#total-progress").style.opacity = "1"
	// And disable the start button
	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

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
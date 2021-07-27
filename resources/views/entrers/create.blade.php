@extends('layout.app')

@section('main')

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary box-perso">
					<div class="card-header">
						<h3 class="card-title">Entrée de Stock</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form method="POST" action="{{ route('approvisionnement.store')}}">
						@csrf
						<div class="card-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Article Concerné *</label>
										<select class="form-control select2" style="width: 100%;" name="article_id">

											@foreach ($articles as $article)
											<option @if ($loop->first) selected="selected" @endif
												value="{{$article->id}}"> {{$article->libelle}}
											</option>
											@endforeach

										</select>
									</div>
								</div>

								{{-- qte_recu --}}
								<div class="col-md-3 col-xs-12">
									<div class="form-group">
										<label for="qte_recu">Quantité *</label>
										<input type="number"
											class="form-control @error('qte_recu') is-invalid @enderror" name="qte_recu"
											id="qte_recu" placeholder="Entrer la quantité d'article"
											value="{{ old('qte_recu')}}">
									</div>
									@error('qte_recu')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								{{-- prix_achat_unitaire --}}
								<div class="col-md-3 col-xs-12">
									<div class="form-group">
										<label for="prix_achat_unitaire">Prix Unitaire</label>
										<input type="number"
											class="form-control @error('prix_achat_unitaire') is-invalid @enderror"
											name="prix_achat_unitaire" id="prix_achat_unitaire"
											placeholder="Entrer le prix unitaire de l'article"
											value="{{ old('prix_achat_unitaire')}}">
									</div>
									@error('prix_achat_unitaire')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Fournisseur</label>
										<select class="form-control select2" style="width: 100%;" name="fournisseur_id">

											<option selected="selected" value=""> Aucun Fournisseur</option>

											@foreach ($fournisseurs as $fournisseur)
											<option value="{{$fournisseur->id}}">
												{{$fournisseur->nom}}
											</option>
											@endforeach

										</select>
									</div>
								</div>

								{{-- date_reception --}}
								<div class="col-md-3 col-xs-12">
									<div class="form-group">

										<!-- Date and time -->
										<div class="form-group">
											<label>Date :</label>
											<div class="input-group date" id="reservationdatetime"
												data-target-input="nearest">
												<input type="datetime-local" name="date_reception"
													class="form-control" />
											</div>
										</div>


									</div>
									@error('date_reception')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="row">

								<div class="col-md-4">
									{{-- libelle --}}
									<div class="form-group">
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
										<a href="{{ route('approvisionnement.index') }}"
											class="btn btn-warning btn-block text-light mb-2">Retour</a>
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

		$("input[data-bootstrap-switch]").each(function(){
  			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})
	})
	$(function () {
	//Date and time picker
	moment.locale('fr_fr')
	$('#reservationdatetime').datetimepicker({ 
		icons: { time: 'far fa-clock', 
		format:'DD/MM/YYYY HH:mm:ss',
		format: 'LT'
	}
	});


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

@elseif(session('error'))
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
				icon: 'error',
				title: 'L\'action à échouée!'
			})
		});
	});
</script>

@endif
@endpush
<?php $__env->startSection('main'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div>
                    <div class="card bg-light card-success">
                        <div class="card-header">
                            <h3 class="card-title">Approvisionnement du <?php echo e($entrer->created_at); ?></h3>
                        </div>
                        <div class="card-body">
                            <div wire:loading.delay wire:target="submit, addDeleteLigne, resetLigne, addInBD">
                                <div class="custom-loading-spinner">
                                    Patientez...
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Auteur : <?php echo e($entrer->user->nom); ?></h3>

                                            <div class="card-tools">
                                                <div class="float-right input-group input-group-sm"
                                                    style="width: 150px;">
                                                    <b>Code: <?php echo e($entrer->code); ?></b>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="p-0 card-body table-responsive" style="height:500px;">
                                            <table class="table table-head-fixed ">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Image</th>
                                                        <th>Libelle</th>
                                                        <th>Prix</th>
                                                        <th>Quantité Ajoutée</th>
                                                        <th>Catégorie</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $lignes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ligne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($entrer->code); ?></td>
                                                        <td>

                                                            <?php if($ligne->article->article_photo): ?>
                                                            <img alt="Avatar" class="img-perso"
                                                                src="<?php echo e(asset('storage/'.$ligne->article->article_photo)); ?>">
                                                            <?php else: ?>
                                                            <img alt="Avatar" class="img-perso" style="cursor:pointer"
                                                                src="<?php echo e(asset('img/default_article100x100.png')); ?>">
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($ligne->article->libelle); ?></td>
                                                        <td><?php echo e(format_money($ligne->article->prix_tarification)); ?></td>
                                                        <td><?php echo e($ligne->qte); ?></td>
                                                        <td><?php echo e($ligne->article->categorie->libelle); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    Aucune information...
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-4 offset-4 col-sm-12">
                                    <a href="<?php echo e(route('approvisionnement.index')); ?>"
                                        class="mb-2 btn btn-warning btn-block text-light">Retour à la liste</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')); ?>">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bs-stepper/css/bs-stepper.min.css')); ?>">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/min/dropzone.min.css')); ?>">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>">


<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
<?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo e(asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo e(asset('plugins/bootstrap-switch/js/bootstrap-switch.js')); ?>"></script>
<!-- BS-Stepper -->
<script src="<?php echo e(asset('plugins/bs-stepper/js/bs-stepper.min.js')); ?>"></script>
<!-- dropzonejs -->
<script src="<?php echo e(asset('plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<!-- SweetAlert2 -->
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>


<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
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

<?php if(session('success')): ?>
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

<?php elseif(session('error')): ?>
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
<?php endif; ?>
<?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/entrers/show.blade.php ENDPATH**/ ?>
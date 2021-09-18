

<?php $__env->startSection('main'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Liste des Approvisionnements de stock</h3>

                        <a href="<?php echo e(route('approvisionnement.create')); ?>" class="float-right btn btn-md bg-dark">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter
                        </a>
                    </div>
                    <!-- /.card-header -->

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('approvisionnement.index', [])->html();
} elseif ($_instance->childHasBeenRendered('IIaVtYE')) {
    $componentId = $_instance->getRenderedChildComponentId('IIaVtYE');
    $componentTag = $_instance->getRenderedChildComponentTagName('IIaVtYE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('IIaVtYE');
} else {
    $response = \Livewire\Livewire::mount('approvisionnement.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('IIaVtYE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">

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
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

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
		$("#example1").DataTable({
		  "responsive": true, "lengthChange": true, "autoWidth": true,
		  "buttons": ["excel", "pdf", "print"],
          "order": [0,'desc']
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": false,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false,
		  "responsive": true,
		  "language":
            {
                    "decimal":        ".",
                    "emptyTable":     "Aucune donnée disponible",
                    "info":           "Afficher  _START_ à _END_ sur _TOTAL_ lignes",
                    "infoEmpty":      "Aucune information à afficher",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "thousands":      ".",
                    "loadingRecords": "chargement...",
                    "processing":     "Enregistrement...",
                    "search":         "Search:",
                    "zeroRecords":    "Aucun résultat trouvé",
                    "paginate": {
                        "first":      "Premier",
                        "last":       "Dernier",
                        "next":       "Suivant",
                        "previous":   "Précedent"
                    },
            },
		});
	  });
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

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
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

<?php echo \Livewire\Livewire::scripts(); ?>

<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\Documents\GitHub\sourale-group\resources\views/entrers/index.blade.php ENDPATH**/ ?>
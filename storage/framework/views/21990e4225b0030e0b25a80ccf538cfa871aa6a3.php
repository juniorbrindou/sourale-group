<?php $__env->startSection('main'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste des categories d'événements</h3>

                        <a href="<?php echo e(route('typeEvenements.create')); ?>" class="float-right btn btn-md bg-dark">
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
                                    <th>Libelle</th>
                                    <th>description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $typeEvenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeEvenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($typeEvenement->code); ?> </td>
                                    <td><?php echo e($typeEvenement->libelle); ?> </td>
                                    <td><?php echo e(isset($typeEvenement->description) ? $typeEvenement->description : 'Aucune description'); ?>

                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-md" data-toggle="modal"
                                            data-target="#modal-see-<?php echo e($typeEvenement->id); ?>">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="<?php echo e(route('typeEvenements.edit', $typeEvenement->id)); ?>"
                                            title="Modiffier" class="btn btn-primary btn-md" data-toggle="tooltip"
                                            -placement="top">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-danger-<?php echo e($typeEvenement->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-default">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Attention ! Action Irréversible !</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger">Voulez vous vraiment supprimer le type de
                                                    l'événement
                                                    <b><?php echo e($typeEvenement->libelle); ?></b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Annuler</button>
                                                <form method="POST" style="display: inline"
                                                    action="<?php echo e(route('typeEvenements.destroy', $typeEvenement->id )); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-outline-danger">Je
                                                        Confirme</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->




                                <div class="modal fade" id="modal-see-<?php echo e($typeEvenement->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-default">
                                            <div class="modal-header">
                                                <p>Détails</p>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p>
                                                    <b>LIBELLE : </b><?php echo e($typeEvenement->libelle); ?>

                                                </p>
                                                <hr>
                                                <p>
                                                    <b>DESCRIPTION : </b><?php echo e($typeEvenement->description); ?>

                                                </p>
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary btn-block"
                                                    data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["pdf", "print"]
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
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
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
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/parametrage/typeEvenements/index.blade.php ENDPATH**/ ?>
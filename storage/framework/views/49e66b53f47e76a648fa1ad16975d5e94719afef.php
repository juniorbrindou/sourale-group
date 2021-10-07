

<?php $__env->startSection('main'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="text-center profile-username"><?php echo e($client->nom); ?></h3>

                        <p class="text-center text-muted"><?php echo e($client->adresse); ?></p>
                        <p class="text-center text-muted"><?php echo e($client->tel1); ?></p>

                        <ul class="mb-3 list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nombre d'événments</b> <a class="float-right text-bold"> <?php echo e($evenements->count()); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Meilleur gain</b>
                                <a class="float-right text-bold">
                                    <?php echo e($bestEvenement->montant_total ?? '0'); ?> F CFA
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Total de gain</b> <a class="float-right text-bold"><?php echo e(format_money($gainTotal)); ?> F
                                    CFA</a>
                            </li>
                        </ul>
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
                            <li class="nav-item">
                                <a class="nav-link active">Liste des Evenements</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <?php $__empty_1 = true; $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-warning">
                                            <?php echo e(long_date($evenement->date_debut_evenement)); ?>

                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-warning"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header">
                                                <a href="#"><?php echo e($evenement->libelle); ?></a>
                                            </h3>

                                            <div class="timeline-body">
                                                <p><?php echo e($evenement->libelle); ?> à <?php echo e($evenement->lieu); ?></p>
                                                <p>
                                                    Caution : <?php echo e($evenement->caution); ?> F CFA <br>
                                                    Montant Total : <?php echo e($evenement->montant_total); ?> F CFA
                                                </p>
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="<?php echo e(route('locations.show',$evenement->id)); ?>"
                                                    class="btn btn-primary btn-sm">Voir l'évènement</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <?php endif; ?>
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/parametrage/clients/show.blade.php ENDPATH**/ ?>
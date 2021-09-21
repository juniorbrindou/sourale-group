<?php $__env->startSection('main'); ?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Liste des Utilisateurs</h3>

            <div class="card-tools">
                <a href="<?php echo e(route('users.create')); ?>" class="float-right btn btn-md bg-dark">
                    <i class="fa fa-plus-circle"></i>
                    Ajouter
                </a>
            </div>
        </div>
        <div class="p-0 card-body">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 25%">
                            Login
                        </th>
                        <th style="width: 5%">
                            Image
                        </th>
                        <th>
                            Nom et Prenoms
                        </th>
                        <th style="width: 15%">
                            Téléphone
                        </th>
                        <th style="width: 5%">
                            Role
                        </th>
                        <th style="width: 25%">
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a><?php echo e($user->login); ?></a><br /><small>Compte Créé Le <?php echo e($user->created_at); ?></small>
                        </td>

                        <td>
                            <img alt="Avatar" class="table-avatar" src="<?php echo e(userAvatar($user->genre)); ?>">
                        </td>

                        <td>
                            <?php if($user->nom): ?>
                            <?php echo e($user->nom); ?>

                            <?php else: ?>
                            <span class="badge badge-danger">Aucun nom (ce compte est incomplet) </span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php echo e($user->tel1); ?> <br> <?php echo e($user->tel2); ?>

                        </td>

                        <td class="project-state">
                            <span
                                class="badge badge-success"><?php echo e(($user->roles) ? format_no_array($user->roles->pluck('name')) : 'Sécretaire'); ?></span>
                        </td>

                        <td class="text-right project-actions">

                            
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>">
                                <i class="fas fa-eye"></i>Voir
                            </a>

                            
                            <?php if(Auth::user()->login != $user->login): ?>
                            <a class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-danger-<?php echo e($user->id); ?>">
                                <i class="fas fa-trash"></i>Supprimer
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>

                    
                    <div class="modal fade" id="modal-danger-<?php echo e($user->id); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4 class="modal-title">Attention ! Action Irréversible !</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-danger">Voulez vous vraiment supprimer l'Utilisateur
                                        <b><?php echo e($user->nom); ?></b></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                    <form method="POST" style="display: inline"
                                        action="<?php echo e(route('users.destroy', $user->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-outline-danger">Je
                                            Confirme
                                        </button>
                                    </form>
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

<!-- SweetAlert2 -->
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>


<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/parametrage/users/index.blade.php ENDPATH**/ ?>
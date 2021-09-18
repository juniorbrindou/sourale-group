<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $entrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($entree->id); ?></td>
                <td><?php echo e($entree->code); ?></td>
                <td><?php echo e($entree->created_at); ?></td>
                <td><?php echo e($entree->user->nom); ?> <?php echo e($entree->user->prenoms); ?> </td>
                <td>
                    <a href="<?php echo e(route('approvisionnement.show', $entree->id)); ?>" class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>
<!-- /.card-body -->
<?php /**PATH C:\Users\Brindou\Documents\GitHub\sourale-group\resources\views/livewire/approvisionnement/index.blade.php ENDPATH**/ ?>
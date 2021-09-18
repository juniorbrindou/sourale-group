<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Quantité</th>
                <th>Article</th>
                <th>Date de sortie</th>
                <th>Motif</th>
                <th>Auteur</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sorties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sortie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($sortie->id); ?></td>
                <td><?php echo e($sortie->qte); ?></td>
                <td><?php echo e($sortie->article->libelle); ?></td>
                <td><?php echo e($sortie->created_at); ?> </td>
                <td><?php echo e($sortie->motif); ?> </td>
                <td><?php echo e($sortie->user->nom); ?> <?php echo e($sortie->user->prenoms); ?> </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
</div>
<!-- /.card-body -->
<?php /**PATH C:\Users\Brindou\Documents\GitHub\sourale-group\resources\views/livewire/destockage/index.blade.php ENDPATH**/ ?>
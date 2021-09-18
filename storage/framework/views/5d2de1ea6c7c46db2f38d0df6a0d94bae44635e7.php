<?php $__currentLoopData = $tarifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($tarif->id); ?></td>
    <td><?php echo e(format_money($tarif->prix)); ?></td>
    <td><?php echo e($tarif->type_article->libelle); ?></td>
    <td><?php echo e($tarif->categorie_article->libelle); ?></td>
    <td>
        <button type="submit" class="btn btn-success btn-md" title="Modiffier" data-toggle="modal"
            data-target="#modal-update-<?php echo e($tarif->id); ?>">
            <i class="fa fa-pen"></i>
        </button>

    </td>
</tr>

<div class="modal fade" id="modal-update-<?php echo e($tarif->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                Modifer le prix
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('tarifications.update', $tarif->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="prix">Prix *</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['prix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e($tarif->prix); ?>" required name="prix" id="prix" placeholder="Entrer le prix">
                    </div>
                    <?php $__errorArgs = ['prix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>

                    <button type="submit" class="btn btn-success">Je Confirme</button>
                </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/livewire/tarification/index.blade.php ENDPATH**/ ?>
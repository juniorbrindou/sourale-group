<form wire:submit.prevent='save'>
    <div class="field" wire:ignore>
        <input type="number" autofocus wire:model.defer="qte_retour" style="width: 5rem;">
        <button type="submit" class="btn btn-success" wire:click="save()">
            <i class="fa fa-check"></i>
        </button>
    </div>
    <?php $__errorArgs = ['qte_retour'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="text-danger" style="margin-top: -0.25rem;display: block; font-size:80%" role="alert">
        <strong><?php echo e($message); ?></strong>
    </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</form>
<?php /**PATH C:\SouraleApp\last-project\resources\views/livewire/location/cloturation.blade.php ENDPATH**/ ?>
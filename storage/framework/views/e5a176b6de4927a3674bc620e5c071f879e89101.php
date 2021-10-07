<div class="content-header">
	<div class="container-fluid">
		<div class="mb-2 row">
            <div class="col-sm-6">
                <?php if (! ($breadcrumbs->isEmpty())): ?>
                    <ol class="breadcrumb">
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if(!is_null($breadcrumb->url) && !$loop->last): ?>
                                <li class="breadcrumb-item active">
                                    <a class="btn btn-primary" href="<?php echo e($breadcrumb->url); ?>">
                                        <?php echo e($breadcrumb->title); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item active">
                                    <button class="btn btn-secondary"><?php echo e($breadcrumb->title); ?></button>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/layout/_breadcrumbs.blade.php ENDPATH**/ ?>
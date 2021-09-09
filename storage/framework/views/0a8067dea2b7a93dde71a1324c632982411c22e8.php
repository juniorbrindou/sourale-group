<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">

		<div class="row mb-2">


			<div class="col-sm-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">
						<a class="btn btn-secondary" href="<?php echo e(url('/')); ?>">Tableau de Bord</a>
					</li>

					<?php if(str_contains(request()->getPathInfo(),'edit')): ?>

					<?php endif; ?>

					<?php $__currentLoopData = $segments = request()->segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(last($segments) != 'dashboard'): ?>

					<li class="breadcrumb-item">
						<a href="<?php echo e(url(implode('/', array_slice($segments, 0, $index +1 )))); ?>"
							class="btn btn-primary"><?php echo e(Str::title($segment)); ?></a>
					</li>
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</ol>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<div class="float-sm-right">

					<h1 class="m-0 text-capitalize"><?php echo e(page_title()); ?></h1>
				</div>
			</div><!-- /.col -->


		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header --><?php /**PATH C:\xampp\htdocs\Sourale-group\resources\views/layout/_breadcrumbs.blade.php ENDPATH**/ ?>
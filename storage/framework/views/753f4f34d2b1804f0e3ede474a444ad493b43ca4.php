<!DOCTYPE html>
<html lang=<?php echo e(str_replace('_', '-', app()->getLocale())); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset('dist/img/favicon.ico')); ?>" />
    <title><?php echo e(config('app.name')); ?></title>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/style.css')); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('preloader'); ?>

        
        <?php echo $__env->make('layout._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        


        
        <?php echo $__env->make('layout._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        


        
        <div class="content-wrapper">


            
            <?php echo $__env->make('layout._breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            


            
            <?php echo $__env->yieldContent('main'); ?>
            

        </div>

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->



        
        <?php echo $__env->make('layout._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        window.addEventListener('sweetAlert',function(e){
			Swal.fire(e.detail);
		});
    </script>
</body>

</html>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/layout/app.blade.php ENDPATH**/ ?>
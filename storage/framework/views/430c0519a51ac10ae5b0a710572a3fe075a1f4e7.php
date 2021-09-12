<?php $__env->startSection('main'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-2"><i class="fas fa-shipping-fast"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">En cours de Location</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Disponibles en Stock</span>
                        <span class="info-box-number">41410 Articles</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Locations</span>
                        <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Clients</span>
                        <span class="info-box-number">200</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Rapport récapitulatif</h5>

                        <div class="card-tools">
                            <button type="button" title="Réduire" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Zoé: 1 Jan, 2021 - 16 Juil, 2021</strong>
                                </p>

                                
                                <div class="chart row">
                                    <div class="col-md-6">
                                        <div id="chartContainer1" style="height: 180px;"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="chartContainer2" style="height: 180px;"></div>
                                    </div>
                                </div>

                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Objectifs et accomplissements</strong>
                                </p>

                                <div class="progress-group">
                                    Arcticles Ajoutés
                                    <span class="float-right"><b>160</b>/200</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Articles perdus/dégradés en location
                                    <span class="float-right"><b>310</b></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="float-right"><b>480</b>/800</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    Articles perdus/dégradés en location
                                    <span class="float-right"><b>250</b></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        17%</span>
                                    <h5 class="description-header">12.315.100 F CFA</h5>
                                    <span class="description-text">TOTAL REVENU</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                        0%</span>
                                    <h5 class="description-header">315.100F CFA</h5>
                                    <span class="description-text">TOTAL PERTES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        20%</span>
                                    <h5 class="description-header">12.000.000F CFA</h5>
                                    <span class="description-text">BÉNÉFICE BRUT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                        18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">


                <!-- tableau des dernieres commandes -->
                <div class="card">
                    
                    <div class="border-transparent card-header">

                        <h3 class="card-title">Dernières Locations </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    

                    
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>numéro de commande </th>
                                        <th>Article</th>
                                        <th>Statut</th>
                                        <th>Autres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                90,80,-90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        <a href="javascript:void(0)" class="float-left btn btn-sm btn-info">Passer une nouvelle
                            commande</a>
                        <a href="javascript:void(0)" class="float-right btn btn-sm btn-secondary">Voir toutes les
                            commandes</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="mb-3 info-box bg-danger">
                    <span class="info-box-icon"><i class="fa fa-glass-cheers"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Package Luxieux</span>
                        <span class="info-box-number">52 <i class="fas fa-truck"></i> sur 122 <i
                                class="fas fa-archive"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="mb-3 info-box bg-warning">
                    <span class="info-box-icon"><i class="far fa-heart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Package doré</span>
                        <span class="info-box-number">52 <i class="fa fa-truck"></i> sur 122 <i
                                class="fas fa-archive"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="mb-3 info-box bg-gray">
                    <span class="info-box-icon"><i class="fa fa-adn"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Package argenté</span>
                        <span class="info-box-number">52 <i class="fa fa-truck"></i> sur 122 <i
                                class="fa fa-archive"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="mb-3 info-box bg-default">
                    <span class="info-box-icon"><i class="fa fa-feather-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Package plume</span>
                        <span class="info-box-number">52 <i class="fas fa-truck"></i> sur 122 <i
                                class="fas fa-archive"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <!-- /.info-box -->
                <div class="mb-3 info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-comment"></i></span>

                    <div class="info-box-content ">
                        <span class="info-box-text">Commande sans Package</span>
                        <span class="info-box-number">52 <i class="fas fa-truck"></i> sur 122 <i
                                class="fas fa-archive"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>







<?php $__env->startPush('styles'); ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.css')); ?>">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script> -->
<!-- canva -->
<script src="<?php echo e(asset('plugins/canvasjs-3.4.1/canvasjs.min.js')); ?>"></script>

<!-- Bootstrap -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo e(asset('plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<!-- ChartJS -->
<script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('dist/js/pages/dashboard2.js')); ?>"></script>

<script type="text/javascript">
    window.onload = function () {
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            // title:{
            //     text: "indexLabel at dataSeries",
            //     fontSize: 20
            // },
            toolTip: {
                cornerRadius: 15,
                borderThickness:3
            },

            data: [
            {
                type: "doughnut",// bar, bubble, column, pie, spline,doughnut
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });

                var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            // title:{
            //     text: "indexLabel at dataSeries",
            //     fontSize: 20
            // },
            toolTip: {
                cornerRadius: 15,
                borderThickness:3
            },

            data: [
            {
                type: "doughnut",// bar, bubble, column, pie, spline,doughnut
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });

        chart1.render();
        chart2.render();
    }
</script>



<?php $__env->stopPush(); ?>

<?php $__env->startPush('preloader'); ?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo e(asset ('dist/img/logo.png')); ?>" alt="AdminLTELogo" height="200" width="320">
</div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sourale-group\resources\views/dashboard.blade.php ENDPATH**/ ?>
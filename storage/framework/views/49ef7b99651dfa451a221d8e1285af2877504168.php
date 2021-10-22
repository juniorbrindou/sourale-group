<?php $__env->startSection('main'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">

            
            <div class="col-12 col-sm-6 col-md-3"data-delay='{"show": 1000}'
                title="Les evenements qui ne sont pas encore terminés" data-toggle="tooltip" data-placement="top">
                <a href="<?php echo e(route('locations.index')); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-2"><i
                                class="fas fa-2x fa-sync-alt <?php echo e(($nbrEventEnCours <1 )? "" : "fa-spin"); ?>"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Evenements En cours</span>
                            <span class="info-box-number">
                                <?php echo e($nbrEventEnCours); ?>

                            </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->

            
            <div class="col-12 col-sm-6 col-md-3" data-delay='{"show": 1000}'
                title="Article dont la quantité disponible est inférieur à 5" data-toggle="tooltip" data-placement="top">
                <a href="<?php echo e(url('stock')); ?>">
                    <div class="mb-3 info-box">
                        <span
                            class="info-box-icon <?php echo e(($nbrNiveauCritique >= 1 )? "bg-danger" : "bg-warning"); ?> elevation-1">
                            <i class="fas fa-bell <?php echo e(($nbrNiveauCritique >= 1 )? "blink" : ""); ?>"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Stock Critique</span>
                            <span class="info-box-number"><?php echo e($nbrNiveauCritique); ?> Articles</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            



            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Locations Clôturées</span>
                        <span class="info-box-number"><?php echo e($nbrEventCloturer); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top"
                data-delay='{"show": 3000,"hide":500}' title="Nombre total des clients enregistrés">
                <a href="<?php echo e(route('clients.index')); ?>">

                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total des Clients</span>
                            <span class="info-box-number"><?php echo e($nbrClients); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <div class="row">
            <div class="col-md-10">
                
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
                            <div class="col-md-5">
                                <p class="text-center">
                                    <strong>Etat des Locations</strong>
                                </p>

                                
                                <div class="chart row">
                                    <div class="col-md-6">
                                        <div id="chartContainer1" style="height: 180px;"></div>
                                    </div>
                                </div>

                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            
                            <div class="col-md-7">
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
                    </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->



            <div class="col-md-2">
                <!-- /.info-box -->
                <div class="mb-3 info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Gains</span>
                        <span class="info-box-number">52 </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="mb-1 info-box bg-primary">
                    <span class="info-box-icon"><i class="fa fa-glass-cheers"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Meilleure location</span>
                        <span class="info-box-number">
                            <?php echo e(isset($bestEvenement->montant_total) ? format_money($bestEvenement->montant_total) : '0'); ?> F
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <!-- /.info-box -->
                <div class="mb-3 info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-user-graduate"></i></span>

                    <div class="info-box-content ">
                        <span class="info-box-text">Meilleur Client</span>
                        <span class="info-box-number">
                            <?php echo e(isset($bestEvenement->client) ? $bestEvenement->client->nom : ''); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="mt-2 row">
            <div class="col-md-6">
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
                                        <th>Evenements</th>
                                        <th>Client</th>
                                        <th>Statut</th>
                                        <th>Montants</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    <?php $__empty_1 = true; $__currentLoopData = $latestFiveEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('evennements.show',$last->id)); ?>"><?php echo e($last->libelle); ?></a></td>
                                        <td><a href="<?php echo e(route('clients.show',$last->client->id)); ?>"><?php echo e($last->client->nom); ?></a></td>
                                        <td><span class="badge badge-info"><?php echo e($last->status); ?></span></td>
                                        <td>
                                            <div class="sparkbar" data-toggle="tooltip" data-placement="left"
                                            title="Caution : <?php echo e(format_money($last->caution)); ?> F CFA (<?php echo e($last->percentage_caution); ?>%)">
                                                <?php echo e($last->montant_total); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        <a href="<?php echo e(route('locations.create')); ?>" class="float-left btn btn-sm btn-info">Passer une nouvelle
                            commande</a>
                        <a href="<?php echo e(route('evennements.index')); ?>" class="float-right btn btn-sm btn-secondary">Voir toutes les
                            commandes</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">
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
                                        <th>Evenements</th>
                                        <th>Client</th>
                                        <th>Statut</th>
                                        <th>Montants</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                    <?php $__empty_1 = true; $__currentLoopData = $latestFiveEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('evennements.show',$last->id)); ?>"><?php echo e($last->libelle); ?></a></td>
                                        <td><a href="<?php echo e(route('clients.show',$last->client->id)); ?>"><?php echo e($last->client->nom); ?></a></td>
                                        <td><span class="badge badge-danger"><?php echo e($last->status); ?></span></td>
                                        <td>
                                            <div class="sparkbar" data-toggle="tooltip" data-placement="left"
                                            title="Caution : <?php echo e(format_money($last->caution)); ?> F CFA (<?php echo e($last->percentage_caution); ?>%)">
                                                <?php echo e($last->montant_total); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        <a href="<?php echo e(route('locations.create')); ?>" class="float-left btn btn-sm btn-info">Passer une nouvelle
                            commande</a>
                        <a href="<?php echo e(route('evennements.index')); ?>" class="float-right btn btn-sm btn-secondary">Voir toutes les
                            commandes</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
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


<style>
    @keyframes  blinking {
        0% {
            color: #302929;
        }

        100% {
            color: #fbff10;
        }
    }

    .blink {
        animation: blinking 1s infinite;
    }
</style>

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

        chart1.render();
    }
</script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



<?php $__env->stopPush(); ?>

<?php $__env->startPush('preloader'); ?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo e(asset ('dist/img/logo.png')); ?>" alt="AdminLTELogo" height="200" width="320">
</div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/dashboard.blade.php ENDPATH**/ ?>
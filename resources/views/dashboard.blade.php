@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">

            {{-- location en cours --}}
            <div class="col-12 col-sm-6 col-md-3"data-delay='{"show": 1000}'
                title="Les evenements qui ne sont pas encore terminés" data-toggle="tooltip" data-placement="top">
                <a href="{{route('locations.incourse')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-2"><i
                                class="fas fa-2x fa-sync-alt {{($nbrEventEnCours <1 )? "" : "fa-spin"}}"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Evenements En cours</span>
                            <span class="info-box-number">
                                {{$nbrEventEnCours}}
                            </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->

            {{-- stock critique --}}
            <div class="col-12 col-sm-6 col-md-3" data-delay='{"show": 1000}'
                title="Article dont la quantité disponible est inférieur à 5" data-toggle="tooltip" data-placement="top">
                <a href="{{url('stock')}}">
                    <div class="mb-3 info-box">
                        <span
                            class="info-box-icon {{($nbrNiveauCritique >= 1 )? "bg-danger" : "bg-warning"}} elevation-1">
                            <i class="fas fa-bell {{($nbrNiveauCritique >= 1 )? "blink" : ""}}"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Stock Critique</span>
                            <span class="info-box-number">{{$nbrNiveauCritique}} Articles</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            {{-- stock critique --}}



            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Locations Clôturées</span>
                        <span class="info-box-number">{{$nbrEventCloturer}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top"
                data-delay='{"show": 3000,"hide":500}' title="Nombre total des clients enregistrés">
                <a href="{{route('clients.index')}}">

                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total des Clients</span>
                            <span class="info-box-number">{{$nbrClients}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        {{-- rapport mensuel --}}
        <div class="row">
            <div class="col-md-6">
                {{-- debut du card pour les charts --}}
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-bold">Rapport récapitulatif</h5>

                        <div class="card-tools">
                            <button type="button" title="Réduire" class="btn btn-tool text-dark" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-5"> --}}
                                {{-- <p class="text-center">
                                    <strong>Etat des Locations</strong>
                                </p> --}}

                                {{-- debut de chart --}}
                                {{-- <div class="chart row">
                                    <div class="col-md-6">
                                        <div id="chartContainer1" style="height: 180px;"></div>
                                    </div>
                                </div> --}}

                                <!-- /.chart-responsive -->
                            {{-- </div> --}}
                            <!-- /.col -->

                            {{-- objectif et accomplissements --}}
                            <div class="col-md-12">
                                <div class="progress-group">
                                    Locations en Cours
                                    <span class="float-right"><b>{{($totalEvenementsEnCours->count())?? $totalEvenementsEnCours->count() }}</b>/ {{$allEvents->count()}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: {{($pcTotalEvenementsEnCours)?? $pcTotalEvenementsEnCours}}%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">
                                        Locations Terminées</span>
                                    <span class="float-right"><b>{{($totalEvenementsTerminer->count())?? $totalEvenementsTerminer->count() }}</b>/ {{$allEvents->count()}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: {{($pcTotalEvenementsTerminer)?? $pcTotalEvenementsTerminer}}%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    Location Cloturées
                                    <span class="float-right"><b>{{($totalEvenements->count())?? $totalEvenements->count() }}</b>/ {{$allEvents->count()}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: {{($pcTotalEvenements)?? $pcTotalEvenements }}%"></div>
                                    </div>
                                </div>

                                <div class="progress-group">
                                    Locations En Mode de Dévis
                                    <span class="float-right"><b>{{($totalEvenementsAnnuler->count())?? $totalEvenementsAnnuler->count()  }}</b>/ {{$allEvents->count()}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: {{($pcTotalEvenementsAnnuler)?? $pcTotalEvenementsAnnuler}}%"></div>
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



            <div class="col-md-6">
                <!-- /.info-box -->
                <div class="mb-3 info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des Gains</span>
                        <span class="info-box-number">{{format_money($sommeTotalEvenements)}} F CFA</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="mb-1 info-box bg-primary">
                    <span class="info-box-icon"><i class="fa fa-glass-cheers"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Meilleure location</span>
                        <span class="info-box-number">
                            {{ isset($bestEvenement->montant_total) ? format_money($bestEvenement->montant_total) : '0'}} F
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <!-- /.info-box -->
                <div class="mb-3 info-box bg-warning">
                    <span class="info-box-icon"><i class="fa fa-user-graduate"></i></span>

                    <div class="info-box-content ">
                        <span class="info-box-text">Meilleur Client</span>
                        <span class="info-box-number">
                            {{ isset($bestEvenement->client) ? $bestEvenement->client->nom : ''}}</span>
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
                    {{-- card header --}}
                    <div class="border-transparent card-header bg-warning">

                        <h3 class="card-title text-bold">5 Dernières Locations </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-dark" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- /.card-header  --}}

                    {{-- card body --}}
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table m-0 table-striped">
                                <thead>
                                    <tr>
                                        <th>Evenements</th>
                                        <th>Client</th>
                                        <th>Statut</th>
                                        <th>Montants</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- latestFiveEvents --}}
                                    @forelse ( $latestFiveEvents as $last )
                                    <tr>
                                        <td><a href="{{route('evennements.show',$last->id)}}">{{$last->libelle}}</a></td>
                                        <td><a href="{{route('clients.show',$last->client->id)}}">{{$last->client->nom}}</a></td>
                                        <td><span class="badge badge-info">{{$last->status}}</span></td>
                                        <td>
                                            <div class="sparkbar" data-toggle="tooltip" data-placement="left"
                                            title="Caution : {{ format_money($last->caution) }} F CFA ({{$last->percentage_caution}}%)">
                                                {{format_money($last->montant_total)}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        <a href="{{route('locations.create')}}" class="float-left btn btn-sm btn-info col-ms-12 col-md-4">Passer une nouvelle
                            commande</a>
                        <a href="{{route('evennements.index')}}" class="float-right mt-1 btn btn-sm btn-secondary col-ms-12 col-md-4">Voir toutes les
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
                    {{-- card header --}}
                    <div class="border-transparent card-header bg-success">

                        <h3 class="card-title text-bold">5 Dernières Locations Non Cloturées </h3>

                        <div class="card-tools">
                            <button type="button" class="btn text-dark btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- /.card-header  --}}

                    {{-- card body --}}
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

                                    {{-- latestFiveEvents --}}
                                    @forelse ( $derniersEvenentsNonCloturer as $last )
                                    <tr>
                                        <td><a href="{{route('evennements.show',$last->id)}}">{{$last->libelle}}</a></td>
                                        <td><a href="{{route('clients.show',$last->client->id)}}">{{$last->client->nom}}</a></td>
                                        <td><span class="badge badge-danger">{{$last->status}}</span></td>
                                        <td>
                                            <div class="sparkbar" data-toggle="tooltip" data-placement="left"
                                            title="Caution : {{ format_money($last->caution) }} F CFA ({{$last->percentage_caution}}%)">
                                                {{format_money($last->montant_total)}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
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

@endsection





{{-- les styles et les scripts spécifiques a cette page --}}

@push('styles')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">


<style>
    @keyframes blinking {
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

@endpush

@push('scripts')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- canva -->
<script src="{{asset('plugins/canvasjs-3.4.1/canvasjs.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>

{{-- <script type="text/javascript">
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

        // chart1.render();
    }
</script> --}}
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



@endpush

@push('preloader')
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset ('dist/img/logo.png')}}" alt="AdminLTELogo" height="200" width="320">
</div>
@endpush

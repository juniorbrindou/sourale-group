@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="text-center profile-username">{{$client->nom}}</h3>

                        <p class="text-center text-muted">{{$client->adresse}}</p>
                        <p class="text-center text-muted">{{$client->tel1}}</p>

                        <ul class="mb-3 list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nombre d'événments</b> <a class="float-right"> {{$evenements->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total de gain</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="p-2 card-header">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active">Liste des Evenements</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    @forelse ($evenements as $evenement)
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-warning">
                                            {{long_date($evenement->date_debut_evenement)}}
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-primary"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header">
                                                <a href="#">{{$evenement->libelle}}</a>
                                            </h3>

                                            <div class="timeline-body">
                                                <p>{{$evenement->libelle}} à {{$evenement->lieu}}</p>
                                                <p>
                                                    Caution : {{$evenement->caution}} <br>
                                                    Montant Total : {{$evenement->montant_total}}
                                                </p>
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="{{route('locations.show',$evenement->id)}}"
                                                    class="btn btn-primary btn-sm">Voir l'évènement</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    @empty

                                    @endforelse
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

@push('styles')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
@endpush


@push('scripts')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
@endpush

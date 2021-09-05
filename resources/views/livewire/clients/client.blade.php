<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste des clients</h3>

                        <a href="{{ route('clients.create')}}" class="float-right btn btn-md bg-dark">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Téléphne</th>
                                    <th>Adresse</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>
                                        <a href="{{route('clients.show',$client->id)}}">{{ $client->nom }}
                                            {{ isset($client->prenoms) ? $client->prenoms : '' }}</a>
                                    </td>
                                    <td>{{ isset($client->contact1) ? $client->contact1 : '' }} /
                                        {{ isset($client->contact2) ? $client->contact2 : ''}} </td>
                                    <td>{{ $client->adresse }}</td>
                                    <td>
                                        <a href="{{route('clients.show',$client->id)}}" class="btn btn-warning btn-md">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('clients.edit', $client->id) }}" title="Modiffier"
                                            class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
                                            data-target="#modal-danger-{{$client->id}}">
                                            <i class="fa fa-trash"></i>
                                            Suprimer
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-danger-{{$client->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-default">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Attention ! Action Irréversible !</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger">Voulez vous vraiment supprimer le client
                                                    <b>{{ $client->nom }} {{ $client->prenoms }}</b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Annuler</button>
                                                <form method="POST" style="display: inline"
                                                    action="{{ route('clients.destroy', $client->id ) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Je
                                                        Confirme</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

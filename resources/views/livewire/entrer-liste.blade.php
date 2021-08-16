<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrees as $entree)
            <tr>
                <td>{{$entree->code}}</td>
                <td>{{$entree->date_entre}}</td>
                <td>{{$entree->user->nom}} </td>
                <td>
                    {{-- <a href="{{ route('approvisionnement.show', $ligneEntrer->id) }}" class="btn btn-warning btn-md
                    mr-1">
                    <i class="fa fa-eye"></i>
                    </button>
                    </a>
                    <a href="{{ route('approvisionnement.edit', $ligneEntrer->id) }}" title="Modiffier"
                        class="btn btn-primary btn-md">
                        <i class="fa fa-pen"></i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
                        data-target="#modal-danger-{{$ligneEntrer->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button type="submit" class="btn btn-success btn-md" data-toggle="modal"
                        data-target="#modal-primary-{{$ligneEntrer->id}}">
                        <i class="fa fa-check"></i>
                    </button> --}}

                </td>
                {{-- <div class="modal fade" id="modal-danger-{{$ligneEntrer->id}}">
                <div class=" modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Attention ! Action Irréversible !</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Voulez vous vraiment supprimer Cette entrée de stock
                                <b>{{ ucwords($ligneEntrer->libelle) }}</b>
                            </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                            <form wire:submit.prevent="delete" hhy style="display: inline"
                                action="{{ route('approvisionnement.destroy', $ligneEntrer->id ) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" wire:click="delete" class="btn btn-outline-danger">Je
                                    Confirme</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
</div> --}}

{{-- <div class="modal fade" id="modal-primary-{{$ligneEntrer->id}}">
<div class="modal-dialog">
    <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Validation d'Approvisionnement </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-success">Vous Confirmez l'entrée de supprimer Cette
                stock
                <b>{{ ucwords($ligneEntrer->libelle) }}</b></p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
            <form method="POST" style="display: inline"
                action="{{ route('approvisionnement.destroy', $ligneEntrer->id ) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Je
                    Confirme</button>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
</div> --}}


</tr>

@endforeach

</tbody>
<tfoot>
    <tr>
        <th>Code</th>
        <th>Date d'ajout</th>
        <th>Auteur</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<!-- /.card-body -->
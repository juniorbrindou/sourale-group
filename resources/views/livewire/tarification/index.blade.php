@foreach ($tarifs as $tarif)
<tr>
    <td>{{ $tarif->id}}</td>
    <td>{{ format_money($tarif->prix)}}</td>
    <td>{{$tarif->type_article->libelle}}</td>
    <td>{{$tarif->categorie_article->libelle}}</td>
    <td>
        <button type="submit" class="btn btn-success btn-md" title="Modiffier" data-toggle="modal"
            data-target="#modal-update-{{$tarif->id}}">
            <i class="fa fa-pen"></i>
        </button>

    </td>
</tr>

<div class="modal fade" id="modal-update-{{$tarif->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                Modifer le prix
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('tarifications.update', $tarif->id)}}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    {{-- prix --}}
                    <div class="form-group">
                        <label for="prix">Prix *</label>
                        <input type="number" class="form-control @error('prix') is-invalid @enderror"
                            value="{{ $tarif->prix }}" required name="prix" id="prix" placeholder="Entrer le prix">
                    </div>
                    @error('prix')
                    <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>

                    <button type="submit" class="btn btn-success">Je Confirme</button>
                </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
</div>

@endforeach

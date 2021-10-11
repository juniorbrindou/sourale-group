<div class="card-body">
    <div wire:loading.delay wire:target="update_statut">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <table id="example1" class="table table-bordered">
        <colgroup>
            <col style="width: 1%" />
            <col style="width: auto" />
            <col style="width: auto" />
            <col style="width: 10%" />
            <col style="width: 5%" />
            <col style="width: 19%" />
            <col style="width: 5%" />
            <col style="width: 15%" />
        </colgroup>
        <thead>
            <tr>
                <th>#</th>
                <th>Evenement</th>
                <th>Client</th>
                <th>TTC</th>
                <th>caution</th>
                <th>date début</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <td>{{$evenement->id}}</td>

                <td class="text-uppercase">{{$evenement->libelle}}</td>

                <td>{{$evenement->client->nom}}</td>

                <td style="cursor:pointer" data-toggle="tooltip" data-placement="top"
                    title="Sans la caution: {{ format_money($evenement->montant_total - $evenement->caution) }} F CFA">
                    <b>{{ format_money($evenement->montant_total) }}</b>
                </td>

                <td><b>{{ format_money($evenement->caution) }}</b></td>

                <td style="cursor:pointer" data-toggle="tooltip" data-placement="top"
                    title="Date de Fin : {{ long_date($evenement->date_fin_evenement) }}">
                    {{ long_date($evenement->date_debut_evenement) }} </td>

                <td>
                    <span class="badge badge-{{couleur_status($evenement->status)}} text-lg">{{$evenement->status}}
                        @if ($evenement->status === "EN COURS")
                        <i class="fas fa-2x fa-sync-alt fa-spin" style="font-size: 25px;"></i>
                        @endif
                    </span>
                </td>
                <td>

                    @if ($evenement->status !== "CLOTURÉ" && $evenement->status !== "TERMINÉ" && $evenement->status !==
                    "ANNULÉ" && $evenement->status !== "EN COURS")
                    <a data-toggle="tooltip" data-placement="left" title="Modifier l'évènement"
                        href="{{ route('locations.show', $evenement->id) }}" class="btn btn-warning btn-md">
                        <i class="fa fa-pen"></i>
                    </a>
                    @endif

                    @if ($evenement->status !== "CLOTURÉ" && $evenement->status !== "TERMINÉ")
                    <button data-toggle="modal" data-target="#modal-statut-{{$evenement->id}}"
                        title="Modifier le status" class="btn btn-primary btn-md">
                        <i class="fa fa-cog"></i>
                    </button>
                    @endif

                    @if ($evenement->status == "CLOTURÉ" || $evenement->status == "EN COURS" || $evenement->status
                    =="TERMINÉ" )
                    <a data-toggle="tooltip" data-placement="left" data-delay='{"show": 100,"hide":100}' title="Voir"
                        href="{{ route('evennements.show', $evenement->id) }}" class="btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                    @endif

                    @if ($evenement->status =="TERMINÉ")
                    <a data-toggle="tooltip" data-placement="bottom" data-delay='{"show": 1000,"hide":100}'
                        title="Clôturer l'évenement : cette action permet de retourner les articles dans le stock une fois l'evenement terminé"
                        href="{{ route('locations.edit', $evenement->id) }}" class="btn btn-dark btn-md">
                        <i class="fa fa-undo"></i>
                    </a>
                    @endif



                    <a data-toggle="tooltip" data-placement="bottom" title="Visualiser la facture"
                        href="{{route('facture.show',$evenement->id)}}" target="_blank" style="color:yellow"
                        class="btn btn-dark btn-md">
                        <i class="fa fa-file-pdf"></i>
                    </a>
                </td>
            </tr>


            {{-- update type article --}}
            <div class="modal fade" id="modal-statut-{{$evenement->id}}">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4>Changer le statut de l'évenement</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" action="{{route('evennements.update',$evenement->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control @error('statut_evenement') is-invalid @enderror"
                                                wire:model.defer="statut_evenement" name="statut_evenement">
                                                <option value=""></option>
                                                <option value="EN COURS">EN COURS</option>
                                                <option value="TERMINÉ">TERMINER</option>
                                                <option value="ANNULÉ">ANNULER</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        @error('statut_evenement')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-outline-warning btn-block"
                                            data-dismiss="modal">Annuler
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-block">Enregistrer </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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

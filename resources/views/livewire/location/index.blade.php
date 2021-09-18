<div class="card-body">
    <div wire:loading.delay wire:target="update_statut">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="*%">Evenement</th>
                <th width="*%">Client</th>
                <th width="5%">TTC</th>
                <th width="5%">caution</th>
                <th width="19%">date début</th>
                <th width="5%">status</th>
                <th width="*%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <td>{{$evenement->id}}</td>
                <td class="text-uppercase">{{$evenement->libelle}}</td>
                <td>{{$evenement->client->nom}}</td>
                <td title="Sans la caution: {{ format_money($evenement->montant_total - $evenement->caution) }} F CFA">
                    <b>{{ format_money($evenement->montant_total) }}</b> </td>
                <td><b>{{ format_money($evenement->caution) }}</b> </td>
                <td>{{ long_date($evenement->date_debut_evenement) }} </td>

                <td>
                    <span class="badge badge-{{couleur_status($evenement->status)}} text-lg">{{$evenement->status}}
                        @if ($evenement->status === "EN COURS")
                        <i class="fas fa-2x fa-sync-alt fa-spin" style="font-size: 25px;"></i>
                        @endif
                    </span>
                </td>
                {{--  --}}
                <td>

                    @if ($evenement->status !== "CLOTURÉ" && $evenement->status !== "EN COURS")
                    <a title="Modiffier l'évènement" href="{{ route('locations.show', $evenement->id) }}"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-pen"></i>
                    </a>

                    <button data-toggle="modal" data-target="#modal-statut-{{$evenement->id}}"
                        title="Modiffier le status" class="btn btn-primary btn-md">
                        <i class="fa fa-cog"></i>
                    </button>

                    @endif

                    @if ($evenement->status == "CLOTURÉ" || $evenement->status == "EN COURS")
                    <a title="Voir" href="{{ route('locations.terminer', $evenement->id) }}"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>

                    @endif


                    <a title="Visualiser la facture" href="{{route('facture.show',$evenement->id)}}" target="_blank"
                        style="color:yellow" class="btn btn-dark btn-md">
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

                        <form>
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" wire:model.defer="statut_evenement"
                                                name="statut_evenement">
                                                <option value=""></option>
                                                <option value="A VENIR">A VENIR</option>
                                                <option value="EN COURS">EN COURS</option>
                                                <option value="TERMINÉ">TERMINÉ</option>
                                                <option value="CLOTURÉ">CLOTURÉ</option>
                                                <option value="ANNULÉ">ANNULÉ</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-outline-warning btn-block"
                                            data-dismiss="modal">Annuler</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" wire:click="update_statut({{$evenement->id}})"
                                            class="btn btn-primary btn-block">Enregistrer</button>
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

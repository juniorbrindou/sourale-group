<div class="card bg-light card-warning">
    <div class="card-header">


        <h3 class="card-title">Location du
            <b>{{long_date($evenement->date_debut_evenement)}}</b> par
            <b>{{ $user->nom}}</b>
        </h3>

    </div>
    <div class="card-body">
        <div wire:loading.delay wire:target="submit, addDeleteLigne, resetLigne, addInBD">
            <div class="custom-loading-spinner">
                Patientez...
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <b>{{$client->nom ?? 'Aucun Nom'}}</b> <br>
                                <b>{{$client->contact1?? ''}}</b><br>
                                <b>{{$client->adresse ?? ''}}</b>
                            </div>
                            <div class="text-center col-md-4">
                                Cérémonie :<b>
                                    {{$evenement->libelle ??'Aucun Nom d\'évenement'}}</b>
                                <br>
                                Nombre d'Invités : <b>{{ $evenement->nbr_personne ?? 'Inconnu'}}</b><br>
                                Lieu : <b>{{ $evenement->lieu ??'Inconnu' }} </b><br>
                                Du : <b>{{ long_date($evenement->date_debut_evenement) ??'' }} <br>
                                    au {{long_date($evenement->date_fin_evenement) ??'' }}
                                </b><br>
                                Durée : <b>{{ $duree_evenement ?? '' }}</b>
                            </div>
                            <div class="text-right col-md-4">
                                Caution(20%) : <b>{{ format_money($evenement->caution) }}F FCA</b><br>
                                TTC : <b>{{ format_money($evenement->montant_total) }}F FCA</b>
                            </div>
                        </div>




                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive" style="height:500px;">
                        <table class="table table-head-fixed ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Article</th>
                                    <th>Catégorie</th>
                                    <th>Quantité</th>
                                    <th>Jours</th>
                                    <th>Prix U</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($tab_locations as $item=>$tab_location)
                                <tr>
                                    <td>{{$item+1}}</td>
                                    <td>{{$tab_location->article->libelle}}</td>
                                    <td>{{$tab_location->article->categorie->libelle}}</td>
                                    <td>{{$tab_location->qte_loue}}</td>
                                    <td>{{$tab_location->nb_jour}}</td>
                                    <td>{{ format_money($tab_location->article->prix_tarification)}}</td>
                                    <td>{{total_ligne($tab_location->qte_loue,$tab_location->nb_jour,$tab_location->article->prix_tarification)}}
                                </tr>
                                @empty
                                Aucune information...
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-4 offset-4 col-sm-12">
                <a href="{{route('locations.index')}}" class="mb-2 btn btn-warning btn-block text-light">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>

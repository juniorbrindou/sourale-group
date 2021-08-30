<div class="card bg-light card-warnig">
    <div class="card-header">
        <h3 class="card-title">Location du
            <b>{{long_date($evenement->date_debut_evenement)}}</b> par
            <b>{{ $location->user->nom}}</b>
        </h3>

        <br>
        <div class="row">
            <div class="col-md-4">
                <b>{{$client->nom ?? 'Aucun Nom'}}</b> <br>
                <b>{{$client->contact1?? 'Aucun Numéro'}}</b><br>
                <b>{{$client->adresse ?? 'Aucune Adresse'}}</b>
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
                Net A Payer : <b>{{ format_money($evenement->montant_total) }}F FCA</b>
            </div>
        </div>




























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
                        <h3 class="card-title">Auteur : lorem
                            lorem</h3>

                        <div class="card-tools">
                            <div class="float-right input-group input-group-sm" style="width: 150px;">
                                <b>Code: lorem</b>
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
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @forelse ($lignes as $ligne) --}}
                                <tr>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                </tr>

                                {{--
                                <tr>
                                    <td>{{$entrer->code}}</td>
                                <td>

                                    @if($ligne->article->article_photo)
                                    <img alt="Avatar" class="img-perso"
                                        src="{{asset('storage/'.$ligne->article->article_photo)}}">
                                    @else
                                    <img alt="Avatar" class="img-perso" style="cursor:pointer"
                                        src="{{asset('img/default_article100x100.png')}}">
                                    @endif
                                </td>
                                <td>{{$ligne->article->libelle}}</td>
                                <td>{{$ligne->article->prix_tarification}}</td>
                                <td>{{$ligne->qte}}</td>
                                <td>{{$ligne->article->categorie->libelle}}</td>
                                </tr> --}}
                                {{-- @empty --}}
                                {{-- Aucune information... --}}
                                {{-- @endforelse --}}
                            </tbody>
                        </table>
                        @dump($evenement)

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
                <a href="{{route('locations.index')}}" class="mb-2 btn btn-warning btn-block text-light">Retour à la
                    liste</a>
            </div>
        </div>
    </div>
</div>

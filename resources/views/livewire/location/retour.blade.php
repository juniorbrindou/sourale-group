<div>
    <div wire:loading.delay
        wire:target="addInBD,updateLigne, addArticle, save, startEdit,updateLineCloturation, afterLineUpdate,cloturer ">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>



    {{-- ----------------Tableau des articles---------------- --}}

    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Rétour de Location du {{ long_date($ligne['date_debut_evenement']) }} par <b>
                    {{$tab_locations[0]->user->nom}} </b>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Client
                            </h3>


                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{$ligne['nom_client'] ?? 'Aucun Nom'}}</b> <br>
                                    <b>{{$ligne['contact1_client']?? ''}}</b><br>
                                    <b>{{$ligne['adresse_client'] ?? ''}}</b>
                                </div>
                                <div class="text-center col-md-4">
                                    Cérémonie :<b>
                                        {{($ligne['libelle_event'])??'Aucun Nom d\'évenement'}}</b>
                                    <br>
                                    Nombre d'Invités : <b>{{ ($ligne['nbr_personne']) ?? 'Inconnu'}}</b><br>
                                    Lieu : <b>{{($ligne['lieu_event']) ??'Inconnu' }} </b><br>
                                    Du : <b>{{ long_date($ligne['date_debut_evenement']) ??'' }} <br>
                                        au {{long_date($ligne['date_fin_evenement']) ??'' }}
                                    </b><br>
                                    Durée : <b>{{ $ligne['duree_evenement'] ?? '' }}</b>
                                </div>
                                <div class="text-right col-md-4">
                                    Caution({{$ligne['percentage_caution']}}%) : <b>{{ format_money($ligne['caution']) }}F FCA</b><br>
                                    TTC : <b>{{ format_money($ligne['montant_total']) }}F FCA</b>
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
                                        <th>Quantité Louée</th>
                                        <th>Quantité retournée</th>
                                        <th>Non rétournée</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tab_locations as $item=>$value)
                                    <tr>
                                        <td>{{$item+1}}</td>
                                        <td><b> {{$value['article']->libelle}} </b></td>
                                        <td>{{$value['article']->categorie->libelle}}</td>
                                        <td>{{$value['qte_loue']}}</td>
                                        <td>

                                            @if($edit_id === $item)

                                            <livewire:location.cloturation :value="$value" :key="$item" />

                                            @else
                                            {{$value['qte_retour']}}
                                            <button wire:click="startEdit({{$item}})" title="Modiffier"
                                                class="btn btn-dark ">
                                                <i class="fa fa-pen"></i>
                                            </button>

                                            @endif
                                        </td>
                                        <td class="text-danger text-bold">{{ $value['qte_loue'] - $value['qte_retour'] }}</td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center" style="background-color: darkgrey">Aucun
                                            enregistrement</td>
                                    </tr>
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
                <div class="col-md-6 col-sm-12">
                    <a href="{{url('locations')}}" class="mb-2 btn btn-warning btn-block text-light">Retour
                        à la liste et cloturer plus tard</a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <button type="submit" wire:click="cloturer()" class="btn btn-primary btn-block">cloturer
                        maintenant</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('livewire:load', function (event) {
    window.livewire.hook('afterDomUpdate', () => {
        $('.select2').select2();
      });
  });
</script>
</div>

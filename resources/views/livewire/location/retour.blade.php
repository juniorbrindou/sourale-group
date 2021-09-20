<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,addDeleteLigne,firstStepSubmit, secondStepSubmit, addArticle">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Retour de Location</h3>
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="bs-stepper linear">

                            <!-- Stepper header-->
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step active" data-target="#location-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="location-part"
                                        id="location-part-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Les articles de la location</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Stepper header-->



                            <!-- Evenement -->
                            <div id="information-part" class="content active dstepper-block" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="libelle_event">Nom de l'evenement *</label>
                                            <input type="text" wire:model.defer="libelle_event"
                                                class="form-control @error('libelle_event') is-invalid @enderror"
                                                name="libelle_event" id="libelle_event"
                                                placeholder="Entrez le nom de l'évenement">
                                        </div>
                                        @error('libelle_event')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="nbr_personne">Invités</label>
                                            <input type="number" min="0" wire:model.defer="nbr_personne"
                                                class="form-control @error('nbr_personne') is-invalid @enderror"
                                                name="nbr_personne" id="nbr_personne">
                                        </div>
                                        @error('nbr_personne')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lieuEvenement">Lieu</label>
                                            <input type="text" wire:model.defer="lieuEvenement"
                                                class="form-control @error('lieuEvenement') is-invalid @enderror"
                                                id="lieuEvenement">
                                        </div>
                                        @error('lieuEvenement')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Type d'evenement</label>
                                            <select class="float-right select2 form-control"
                                                wire:model.defer="type_evenement_id">
                                                @foreach ($type_evenements as $type_evenement)
                                                <option selected="selected">{{$type_evenement->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('type_evenement_id')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date début</label>
                                            <input type="datetime-local" required class="form-control"
                                                wire:model.defer="date_debut_evenement">
                                        </div>
                                        @error('date_debut_evenement')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input type="datetime-local" required class="form-control"
                                                wire:model.defer="date_fin_evenement">
                                        </div>
                                        @error('date_fin_evenement')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <a class="btn btn-primary" wire:click="gotToBeforeStepSubmit">Precedant</a>
                                <a class="btn btn-primary" wire:click="secondStepSubmit">Suivant</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- end card body--}}

    </div>












    {{-- ----------------Tableau des articles---------------- --}}

    <div class="card bg-light">
        <div class="card-header">
            <h3 class="card-title">Location du {{ long_date() }} par <b>
                    {{Auth::user()->nom}} </b>
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
                                    <b>{{$ligne['contact1_client']?? 'Aucun Numéro'}}</b><br>
                                    <b>{{$ligne['adresse_client'] ?? 'Aucune Adresse'}}</b>
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
                                    Caution(20%) : <b>{{ format_money($ligne['caution']) }}F FCA</b><br>
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
                                        <th>Quantité</th>
                                        <th>Ation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tabArticles as $item=>$value)
                                    <tr>
                                        <td>{{$item+1}}</td>
                                        <td><b> {{$value['article']}} </b></td>
                                        <td>{{$value['categorie']}}</td>
                                        <td>{{$value['qte_article']}}
                                        </td>
                                        <td>{{ format_money($value['prix']) }}</td>
                                        <td><b> {{ format_money($value['totalUneLigne']) }} </b></td>
                                        <td>
                                            <button wire:click="updateLigne({{$item}})" title="Modiffier"
                                                class="btn btn-primary btn-md">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn-md"
                                                wire:click="addDeleteLigne({{$item}})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
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
                        à la liste</a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" wire:click="addInBD()" class="btn btn-primary btn-block">Valider</button>
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

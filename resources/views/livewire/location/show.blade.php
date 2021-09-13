<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,deleteligne,firstStepSubmit, secondStepSubmit, addArticle">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Enregistrement de location</h3>
        </div>
        <form wire:submit.prevent="addArticle()">
            @csrf
            <div class="{{ $currentStep == 3 ? 'd-none' : '' }}">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="bs-stepper linear">

                                <!-- Stepper header-->
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- Step client-->

                                    <!-- Step evenement-->
                                    <div class="step {{ $currentStep == 2 ? 'active' : '' }}"
                                        data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Informations sur l'évènement</span>
                                        </button>
                                    </div>

                                    <div class="line"></div>
                                    <!-- Step evenement-->
                                    <div class="step {{ $currentStep == 3 ? 'active' : '' }}"
                                        data-target="#location-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="location-part" id="location-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Les articles de la location</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- Stepper header-->

                                <!-- Client -->
                                <!-- fin Client -->

                                <!-- Evenement -->
                                <div id="information-part"
                                    class="content {{ $currentStep == 2 ? 'active dstepper-block' : '' }}"
                                    role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="evenement_libelle">Nom de l'evenement *</label>
                                                <input type="text" wire:model.defer="evenement_libelle"
                                                    class="form-control @error('evenement_libelle') is-invalid @enderror"
                                                    name="evenement_libelle" id="evenement_libelle"
                                                    placeholder="Entrez le nom de l'évenement">
                                            </div>
                                            @error('evenement_libelle')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="evenement_nbr_personne">Invités</label>
                                                <input type="number" min="0" wire:model.defer="evenement_nbr_personne"
                                                    class="form-control @error('evenement_nbr_personne') is-invalid @enderror"
                                                    name="evenement_nbr_personne" id="evenement_nbr_personne">
                                            </div>
                                            @error('evenement_nbr_personne')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="evenement_lieu">Lieu</label>
                                                <input type="text" wire:model.defer="evenement_lieu"
                                                    class="form-control @error('evenement_lieu') is-invalid @enderror"
                                                    id="evenement_lieu">
                                            </div>
                                            @error('evenement_lieu')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="type_evenement_libelle">Type d'evenement</label>
                                                <select class="float-right form-control"
                                                    wire:model.defer="type_evenement_id">

                                                    <option selected="selected">{{$type_evenement_libelle}}</option>
                                                    @foreach ($type_evenements as $type_evenement)
                                                    <option>{{$type_evenement->libelle}}</option>
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
                                                <label for="evenement_date_debut_evenement">Date début</label>
                                                <input type="datetime-local" required class="form-control"
                                                    wire:model.defer="evenement_date_debut_evenement"
                                                    name="evenement_date_debut_evenement">
                                            </div>
                                            @error('evenement_date_debut_evenement')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="evenement_date_fin_evenement">Date fin</label>
                                                <input type="datetime-local" required class="form-control"
                                                    wire:model.defer="evenement_date_fin_evenement"
                                                    name="evenement_date_fin_evenement" value="">
                                            </div>
                                            @error('evenement_date_fin_evenement')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <a class="btn btn-primary" wire:click="secondStepSubmit">Suivant</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- end card body--}}

            </div>







            <div class="{{ $currentStep == 3 ? '' : 'd-none' }}">
                <div class="card-body">

                    <div class="row">
                        {{-- articles --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="article_libelle">Article Concerné *</label>
                                <select class="form-control  @error('article_libelle') is-invalid @enderror"
                                    wire:model.defer="article_libelle" style="width: 100%;" id="article_libelle">
                                    <option selected value="">Selectionner un article</option>

                                    @foreach ($articles as $article)
                                    <option value="{{$article->libelle}}"> {{$article->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('article_libelle')
                            <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- article_qte --}}
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="article_qte">Quantité *</label>
                                <input type="number" min="1" wire:model.defer="article_qte"
                                    class="form-control @error('article_qte') is-invalid @enderror" id="article_qte"
                                    placeholder="Entrez la quantité d'article">
                            </div>
                            @error('article_qte')
                            <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        {{-- nbr_jours --}}
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="nbr_jours">Jours</label>
                                <input type="number" min="1" wire:model.defer="nbr_jours"
                                    class="form-control @error('nbr_jours') is-invalid @enderror" id="nbr_jours"
                                    placeholder="Entrez le nombre de jours">
                            </div>
                            @error('nbr_jours')
                            <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-3 offset-md-3 col-sm-6">
                                <button type="reset" class="mb-2 btn btn-warning btn-block text-light">Effacer</button>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button type="submit" wire:click="addArticle()"
                                    class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>













                {{-- ----------------Tableau des articles---------------- --}}

                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Location du {{ long_date($evenement->created_at) }} par <b>
                                {{$user->nom}}
                                {{$user->prenoms}}</b>
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
                                                <b>{{$client->nom ?? 'Aucun Nom'}}</b> <br>
                                                <b>{{$client->contact1?? 'Aucun Numéro'}}</b><br>
                                                <b>{{$client->adresse ?? 'Aucune Adresse'}}</b>
                                            </div>
                                            <div class="text-center col-md-4">
                                                Cérémonie :<b>
                                                    {{$tab_evenement['libelle'] ??'Aucun Nom d\'évenement'}}</b>
                                                <br>
                                                Nombre d'Invités :
                                                <b>{{ $tab_evenement['nbr_personne'] ?? 'Inconnu'}}</b><br>
                                                Lieu : <b>{{$tab_evenement['lieu'] ??'Inconnu' }} </b><br>
                                                Du : <b>{{$tab_evenement['date_debut']??'' }} <br>
                                                    au {{$tab_evenement['date_fin'] ??'' }}
                                                </b><br>
                                                Durée : <b>{{ $tab_evenement['duree_evenement'] ?? '' }} jour(s)</b>
                                            </div>
                                            <div class="text-right col-md-4">
                                                Caution(20%) : <b> {{$tab_evenement['caution'] ?? ''}} F FCA</b><br>
                                                TTC : <b>{{$tab_evenement['montant_total'] ?? ''}} F FCA</b>
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
                                                    <th>jours</th>
                                                    <th>Prix U</th>
                                                    <th>Total</th>
                                                    <th>Ation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($ligne as $item=>$location)
                                                <tr>
                                                    <td>{{$item+1}}</td>
                                                    <td>{{$location['article']['libelle']}}</td>
                                                    <td>{{$location['article_categorie']['libelle']}}</td>
                                                    <td>{{$location['qte_loue']}}</td>
                                                    <td>{{$location['nbr_jour']}}</td>
                                                    <td>{{$location['article']['prix_tarification']}}
                                                    </td>
                                                    <td>{{$location['total_une_ligne']}}</td>
                                                    <td>
                                                        <button wire:click="updateLigne({{$item}})" title="Modiffier"
                                                            class="btn btn-primary btn-md">
                                                            <i class="fa fa-pen"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-md"
                                                            wire:click="deleteLigne({{$item}})" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="9" class="text-center"
                                                        style="background-color: darkgrey">Aucun
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

                            <div class="col-md-6 col-sm-12">
                                <button type="submit" wire:click="addInBD()"
                                    class="btn btn-primary btn-block">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- for display none on step 3 --}}
    </div>
</div>
</div>

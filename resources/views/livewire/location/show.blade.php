<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,deleteligne, secondStepSubmit, addArticle, activeReductionField">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Modiffication de location</h3>
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
                                                    wire:model.defer="type_evenement_libelle">
                                                    <option selected="selected">{{$type_evenement_libelle}}
                                                    </option>
                                                    @foreach ($type_evenements as $type_evenement)
                                                    <option>{{$type_evenement->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('type_evenement_libelle')
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

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="evenement_percentage_caution">Caution</label>
                                                <input type="number" min="0" max="100" wire:model.defer="evenement_percentage_caution"
                                                    class="form-control @error('evenement_percentage_caution') is-invalid @enderror"
                                                    name="evenement_percentage_caution" id="evenement_percentage_caution">
                                            </div>
                                            @error('evenement_percentage_caution')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mx-auto col-md-3">
                                        <a class="btn btn-block btn-primary"
                                            wire:click="secondStepSubmit">
                                            Suivant
                                            <i class="fa fa-arrow-alt-circle-right"></i>
                                        </a>
                                    </div>
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
                                    <option value="{{$article}}"> {{$article}}</option>
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

                        {{-- qte_article --}}
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="qte_article">Quantité *</label>
                                <input type="number" min="1" wire:model.defer="qte_article"
                                    class="form-control @error('qte_article') is-invalid @enderror" id="qte_article"
                                    placeholder="Entrez la quantité d'article">
                            </div>
                            @error('qte_article')
                            <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        {{-- nb_jour --}}
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="nb_jour">Jours</label>
                                <input type="number" min="1" wire:model.defer="nb_jour"
                                    class="form-control @error('nb_jour') is-invalid @enderror" id="nb_jour"
                                    placeholder="Entrez le nombre de jours">
                            </div>
                            @error('nb_jour')
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
                                <button type="submit" wire:click="addArticle"
                                    class="btn btn-primary btn-block">
                                    <i class="fa fa-plus-circle"></i>
                                    Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>













                {{-- ----------------Tableau des articles---------------- --}}

                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Location du {{ long_date($evenement->created_at) }} par <b>
                                {{$user->nom}}</b>
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
                                            {{-- informations du client --}}
                                            <div class="col-md-4">
                                                <b>{{$client->nom ?? 'Aucun Nom'}}</b> <br>
                                                <b>{{$client->contact1?? ''}}</b><br>
                                                <b>{{$client->adresse ?? ''}}</b>
                                            </div>
                                            {{-- fin --}}

                                            {{-- informations sur l'évenement --}}
                                            <div class="text-center col-md-4">
                                                Cérémonie :<b>
                                                    {{$tab_evenement['evenement_libelle'] ??'Aucun Nom d\'évenement'}}</b>
                                                <br>
                                                Nombre d'Invités :
                                                <b>{{ $tab_evenement['evenement_nbr_personne'] ?? 'Inconnu'}}</b><br>
                                                Lieu : <b>{{$tab_evenement['evenement_lieu'] ??'Inconnu' }} </b><br>
                                                Du : <b>{{isset($tab_evenement['evenement_date_debut_evenement']) ? long_date($tab_evenement['evenement_date_debut_evenement']) :'' }}
                                                    <br>
                                                    au {{ isset($tab_evenement['evenement_date_fin_evenement']) ? long_date($tab_evenement['evenement_date_fin_evenement']) : '' }}
                                                </b><br>
                                                Durée : <b>{{ $tab_evenement['duree_evenement'] ?? '' }}
                                                    jour(s)</b>
                                            </div>

                                            {{-- les prix --}}
                                            <div class="text-right col-md-4">
                                                Total HT <b>{{ isset($tab_evenement['evenement_montant_total']) ? format_money($tab_evenement['evenement_montant_total']) : '' }} F FCA</b>
                                                <br>
                                                @if ($reductible)
                                                    Remise <input type="number" min="0" wire:model.defer="remise" style="width: 25%"/>
                                                    <button title="Modiffier" wire:click="activeReductionField"
                                                        class="btn btn-success btn-xs">
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                @else
                                                    Remise <input type="number" disabled wire:model.defer="remise" style="width: 25%"/>
                                                    <button title="Enregistrer" wire:click="activeReductionField"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                @endif

                                                <br>
                                                Caution({{ $evenement_percentage_caution }}%) : <b> {{ isset($tab_evenement['evenement_caution']) ? format_money($tab_evenement['evenement_caution']) : ''}} F
                                                FCA</b>
                                                <br>
                                                TTC : <b>{{ isset($tab_evenement['ttc']) ? format_money($tab_evenement['ttc']) : '' }} F FCA</b>
                                            </div>
                                            {{-- fin prix --}}

                                        </div>
                                            {{-- fin evenement info --}}
                                    </div>
                                    <!-- /.card-header -->




                                    {{-- tableau des articles loués --}}
                                    <div class="p-0 card-body table-responsive" style="height:300px;">
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
                                                @forelse ($tab_locations as $item => $ligne )
                                                <tr>
                                                    <td>{{$item+1}}</td>
                                                    <td><b> {{$ligne['article_libelle']}}</b></td>
                                                    <td>{{$ligne['article_categorie']}}</td>
                                                    <td>{{$ligne['qte_loue']}}</td>
                                                    <td>{{$ligne['nb_jour']}}</td>
                                                    <td>{{$ligne['prix']}}
                                                    </td>
                                                    <td>{{$ligne['total_une_ligne']}}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-md" data-toggle="tooltip"
                                                            data-placement="bottom" title="Supprimer"
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
                                <a href="{{url('locations')}}" class="mb-2 btn btn-warning btn-block text-light"><i class="fa fa-arrow-circle-left"></i> Retour
                                    à la liste</a>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <button type="submit" wire:click="addInBD"
                                    class="btn btn-primary btn-block"><i class="fa fa-save"></i> Valider</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- for display none on step 3 --}}
    </div>
</div>
</div>

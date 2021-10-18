<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,addDeleteLigne,firstStepSubmit, secondStepSubmit, addArticle">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Enregistrement de location</h3>
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <div class="{{ $currentStep == 3 ? 'd-none' : '' }}">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="bs-stepper linear">

                                <!-- Stepper header-->
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- Step client-->
                                    <div class="step {{ $currentStep == 1 ? 'active' : '' }}"
                                        data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
                                            <span class="bs-stepper-circle"><i class="fa fa-user"></i></span>
                                            <span class="bs-stepper-label">Informations sur le client</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <!-- Step evenement-->
                                    <div class="step {{ $currentStep == 2 ? 'active' : '' }}"
                                        data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">2</span>
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
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Les articles de la location</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- Stepper header-->

                                <!-- Client -->
                                <div class="bs-stepper-content">
                                    <div id="logins-part"
                                        class="content {{ $currentStep == 1 ? 'active dstepper-block' : '' }}"
                                        role="tabpanel" aria-labelledby="logins-part-trigger">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Client Existant:</legend>
                                                    <div class="form-group">
                                                        <label>Selectionnez le client *</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-user" style="color: black"></i>
                                                                </span>
                                                            </div>
                                                            <select name="oldClient" required
                                                                class="float-right form-control"
                                                                wire:model.defer="oldClient">
                                                                <option value="">Coisissez un client existant</option>
                                                                @foreach ($clients as $client)
                                                                <option value="{{$client->id}}">
                                                                    {{$client->nom}}
                                                                </option> @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('oldClient')
                                                    <span class="text-danger"
                                                        style="margin-top: -1.25rem;display: block; font-size:80%"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </fieldset>
                                            </div>




                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Nouveau Client:</legend>

                                                    <div class="form-group">
                                                        <label for="newNom">Nom du nouveau client *</label>
                                                        <input type="text"
                                                            class="form-control @error('newNom') is-invalid @enderror"
                                                            wire:model.defer="newNom" id="newNom">
                                                    </div>
                                                    @error('newNom')
                                                    <span class="text-danger"
                                                        style="margin-top: -1.25rem;display: block; font-size:80%"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                    <div class="form-group">
                                                        <label for="contact1">Téléphone </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="number" min="1" required id="contact1"
                                                                class="form-control @error('contact') is-invalid @enderror"
                                                                wire:model.defer="newContact1">
                                                        </div>
                                                        @error('contact1')
                                                        <span class="text-danger"
                                                            style="margin-top: -1.25rem;display: block; font-size:80%"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="newAdresse">Adresse </label>
                                                        <input type="text" id="newAdresse"
                                                            class="form-control @error('newAdresse') is-invalid @enderror"
                                                            wire:model.defer="newAdresse">
                                                    </div>
                                                    @error('newAdresse')
                                                    <span class="text-danger"
                                                        style="margin-top: -1.25rem;display: block; font-size:80%"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </fieldset>
                                            </div>
                                        </div>


                                        <a class="btn btn-warning col-6" wire:click="firstStepSubmit">Suivant</a>
                                    </div>
                                </div>
                                <!-- fin Client -->



                                <!-- Evenement -->
                                <div id="information-part"
                                    class="content {{ $currentStep == 2 ? 'active dstepper-block' : '' }}"
                                    role="tabpanel" aria-labelledby="information-part-trigger">
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
                                                    <option selected="selected">Choisir un type</option>
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

                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="percentage_caution">Caution</label>
                                                <input type="number" min="0" max="100" wire:model.defer="percentage_caution"
                                                    class="form-control @error('percentage_caution') is-invalid @enderror"
                                                    name="percentage_caution" id="percentage_caution">
                                            </div>
                                            @error('percentage_caution')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <a class="btn btn-secondary col-4 offset-1" wire:click="gotToBeforeStepSubmit">Précedent</a>
                                    <a class="btn btn-warning col-4 offset-2" wire:click="secondStepSubmit">Suivant</a>
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
                                <label for="article">Article Concerné *</label>
                                <select class="form-control  @error('article') is-invalid @enderror"
                                    wire:model.defer="article" style="width: 100%;" id="article">
                                    <option selected value="">Selectionner un article</option>

                                    @foreach ($articles as $key => $article)
                                    <option value="{{$article}}"> {{$article}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('article')
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
                                    class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                        </div>
                    </div>
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
                                                <b>{{$ligne['nom'] ?? 'Aucun Nom'}}</b> <br>
                                                <b>{{$ligne['contact1']?? ''}}</b><br>
                                                <b>{{$ligne['adresse'] ?? ''}}</b>
                                            </div>
                                            <div class="text-center col-md-4">
                                                Cérémonie :<b>
                                                    {{($libelle_event)??'Aucun Nom d\'évenement'}}</b>
                                                <br>
                                                Nombre d'Invités : <b>{{ ($nbr_personne) ?? 'Inconnu'}}</b><br>
                                                Lieu : <b>{{($lieuEvenement) ??'Inconnu' }} </b><br>
                                                Du : <b>{{ long_date($date_debut_evenement) ??'' }} <br>
                                                    au {{long_date($date_fin_evenement) ??'' }}
                                                </b><br>
                                                Durée : <b>{{ $ligne['duree_evenement'] ?? '' }}</b>
                                            </div>
                                            <div class="text-right col-md-4">
                                                Caution({{$ligne['percentage_caution']?? ''}}%) : <b>{{ format_money($caution) }}F FCA</b><br>
                                                TTC : <b>{{ format_money($totalBrute) }}F FCA</b>
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
                                                @forelse ($tabArticles as $item=>$value)
                                                <tr>
                                                    <td>{{$item+1}}</td>
                                                    <td><b> {{$value['article']}} </b></td>
                                                    <td>{{$value['categorie']}}</td>
                                                    <td>{{$value['qte_article']}}
                                                    </td>
                                                    <td>{{$value['nb_jour']}}</td>
                                                    <td>{{ format_money($value['prix']) }}</td>
                                                    <td><b> {{ format_money($value['totalUneLigne']) }} </b></td>
                                                    <td>
                                                        {{-- <button wire:click="updateLigne({{$item}})" title="Modiffier"
                                                            class="btn btn-primary btn-md">
                                                            <i class="fa fa-pen"></i>
                                                        </button> --}}
                                                        <button class="btn btn-danger btn-md"
                                                            wire:click="addDeleteLigne({{$item}})">
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
                            <div class="col-md-4 col-sm-12">
                                <a href="{{url('locations')}}" class="mb-2 btn btn-warning btn-block text-light">Retour
                                    à la liste</a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <button wire:click="resetLigne" class="mb-2 btn btn-dark btn-block text-light">Tout
                                    Effacer</button>
                            </div>
                            <div class="col-md-4 col-sm-12">
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
<script>
    document.addEventListener('livewire:load', function (event) {
    window.livewire.hook('afterDomUpdate', () => {
        $('.select2').select2();
      });
  });
</script>
</div>

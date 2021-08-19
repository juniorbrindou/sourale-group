<div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Enregistrement de location</h3>
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-stepper linear">

                            <!-- Stepper header-->
                            <div class="bs-stepper-header" role="tablist">
                                <!-- Step client-->
                                <div class="step {{ $currentStep == 1 ? 'active' : '' }}" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                        id="logins-part-trigger" aria-selected="true">
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
                            </div>
                            <!-- Stepper header-->
                            {{$currentStep}}

                            <!-- Client -->
                            <div class="bs-stepper-content">
                                <div id="logins-part"
                                    class="content {{ $currentStep == 1 ? 'active dstepper-block' : '' }}"
                                    role="tabpanel" aria-labelledby="logins-part-trigger">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Selectionnez un client *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-user" style="color: black"></i>
                                                        </span>
                                                    </div>
                                                    <select required class="form-control float-right"
                                                        wire:model="client">
                                                        <option value=""></option>
                                                        @foreach ($clients as $client)
                                                        <option value="{{$client->id}}"> {{$client->nom}}
                                                            {{$client->prenoms}}
                                                        </option> @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('client')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <a class="btn btn-primary" wire:click="firstStepSubmit">Suivant</a>
                                    </div>
                                </div>
                            </div>
                            <!-- fin Client -->









                            <!-- fin Client -->
                            <div id="information-part"
                                class="content {{ $currentStep == 2 ? 'active dstepper-block' : '' }}" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="libelle_event">Nom de l'evenement *</label>
                                            <input type="text" wire:model="libelle_event"
                                                class="form-control @error('libelle_event') is-invalid @enderror"
                                                name="libelle_event" id="libelle_event"
                                                placeholder="Entrer la quantité d'article">
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
                                            <label for="nbr_personne">Participants</label>
                                            <input type="number" wire:model="nbr_personne"
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
                                            <label for="lieu">Lieu</label>
                                            <input type="text" wire:model="lieu"
                                                class="form-control @error('lieu') is-invalid @enderror" name="lieu"
                                                id="lieu" placeholder="Nombre de participants">
                                        </div>
                                        @error('lieu')
                                        <span class="text-danger"
                                            style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Type d'evenement</label>
                                            <select required class="form-control float-right select2"
                                                wire:model="type_event" name="client_id">
                                                @foreach ($type_evenements as $type_evenement)
                                                <option selected="selected"></option> @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>




                                <a class="btn btn-primary" onclick="stepper.previous()">Precedant</a>
                                <a type="submit" class="btn btn-primary">Submit</a>
                            </div>


                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>










            <!-- /.card-body -->
            <div class="card-footer {{ $currentStep == 3 ? '' : 'd-none' }}">
                <div class="row">
                    <div class="col-md-3 offset-md-3 col-sm-6">
                        <button type="reset" class="btn btn-warning btn-block text-light mb-2">Effacer</button>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <button type="submit" wire:click="addLigne" class="btn btn-primary btn-block">Ajouter</button>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>













<div class="card bg-light">
    <div class="card-header">
        <h3 class="card-title">Approvisionnement du {{date('Y-m-d H:i')}}</h3>
    </div>
    {{-- <div class="card-body">
        <div wire:loading.delay wire:target="submit, addDeleteLigne, resetLigne, addInBD">
            <div class="custom-loading-spinner">
                Patientez...
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Auteur : {{Auth::user()->nom}} {{Auth::user()->prenoms}}</h3>

    <div class="card-tools">
        <div class="input-group input-group-sm float-right" style="width: 150px;">
            <b>Code: {{$code}}</b>
        </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body table-responsive p-0" style="height:500px;">
    <table class="table table-head-fixed ">
        <thead>
            <tr>
                <th>Code</th>
                <th>Article</th>
                <th>Quantité</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Ation</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ligne as $item=>$value)
            <tr>
                <td>{{$value['code']}}</td>
                <td>{{$value['article']}}</td>
                <td>{{$value['qte']}}</td>
                <td>{{$value['categorie']}}</td>
                <td>{{$value['prix']}}</td>
                <td>
                    <button wire:click="updateLigne({{$item}})" title="Modiffier" class="btn btn-primary btn-md">
                        <i class="fa fa-pen"></i>
                    </button>
                    <button class="btn btn-danger btn-md" wire:click="addDeleteLigne({{$item}})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center" style="background-color: darkgrey">Aucun
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
            <a href="{{route('approvisionnement.index')}}" class="btn btn-warning btn-block text-light mb-2">Retour
                à la liste</a>
        </div>
        <div class="col-md-4 col-sm-12">
            <button wire:click="resetLigne" class="btn btn-dark btn-block text-light mb-2">Tout Effacer</button>
        </div>
        <div class="col-md-4 col-sm-12">
            <button type="submit" wire:click="addInBD()" class="btn btn-primary btn-block">Valider</button>
        </div>
    </div>
</div> --}}
</div>
</div>
<div>
    <div class="card card-success box-perso">
        <div class="card-header">
            <h3 class="card-title">Entrée de Stock</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->






        <form wire:submit.prevent="submit">
            @csrf
            <div class="card-body">

                <div class="row">
                    {{-- articles --}}
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Article Concerné *</label>
                            <select class="form-control @error('article') is-invalid @enderror" name="article_id"
                                wire:model="article" style="width: 100%;">
                                <option selected value="">Selectionner un article</option>

                                @foreach ($articles as $article)
                                <option value="{{$article->id}}"> {{$article->libelle}}</option>
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

                    {{-- qte --}}
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="qte">Quantité *</label>
                            <input type="number" wire:model="qte"
                                class="form-control @error('qte') is-invalid @enderror" name="qte" id="qte"
                                placeholder="Entrer la quantité d'article">
                        </div>
                        @error('qte')
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
                            <button type="reset" class="btn btn-warning btn-block text-light mb-2">Effacer</button>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <button type="submit" wire:click="addLigne"
                                class="btn btn-primary btn-block">Ajouter</button>
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
                    <a href="{{route('approvisionnement.index')}}"
                        class="btn btn-warning btn-block text-light mb-2">Retour à la liste</a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button wire:click="resetLigne" class="btn btn-dark btn-block text-light mb-2">Tout Effacer</button>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" wire:click="addInBD()" class="btn btn-primary btn-block">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
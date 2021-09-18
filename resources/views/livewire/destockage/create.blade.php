<div>
    <div class="card card-danger box-perso">
        <div class="card-header">
            <h3 class="card-title">Sortie de Stock</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->






        <form wire:submit.prevent="submit">
            @csrf
            <div class="card-body bg-light">

                <div class="row">
                    {{-- articles --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Article Concerné *</label>
                            <select class="form-control @error('article') is-invalid @enderror" name="article_id"
                                wire:model="article" style="width: 100%;">
                                <option selected value="">Selectionnez un article</option>

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




                    {{-- motif --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Motif de Sortie*</label>
                            <select class="form-control @error('motif') is-invalid @enderror" name="motif"
                                wire:model="motif" style="width: 100%;">
                                <option>Selectionnez un motif</option>
                                <option value="Mauvais Etat">Mauvais Etat</option>
                                <option value="Brisé">Brisé</option>
                                <option value="Autre">Autre</option>

                            </select>
                        </div>
                        @error('motif')
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
                                placeholder="Entrer la quantité d'article" min="1">
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
            <h3 class="card-title">Sortie de stock {{date('Y-m-d')}} </h3>
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
                            <h3 class="card-title">Auteur : {{Auth::user()->nom}}</h3>

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
                                        <th>Motif</th>
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
                                        <td>{{$value['motif']}}</td>
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
                                        <td colspan="7" class="text-center" style="background-color: darkgrey">Aucun
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

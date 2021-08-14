<div class="card card-primary box-perso">
    <div class="card-header">
        <h3 class="card-title">Entrée de Stock</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('approvisionnement.store')}}">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Article Concerné *</label>
                        <select class="form-control select2" style="width: 100%;" name="article_id">

                            @foreach ($articles as $article)
                            <option @if ($loop->first) selected="selected" @endif
                                value="{{$article->id}}"> {{$article->libelle}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- qte_recu --}}
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="qte_recu">Quantité *</label>
                        <input type="number" class="form-control @error('qte_recu') is-invalid @enderror"
                            name="qte_recu" id="qte_recu" placeholder="Entrer la quantité d'article"
                            value="{{ old('qte_recu')}}">
                    </div>
                    @error('qte_recu')
                    <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- prix_achat_unitaire --}}
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="prix_achat_unitaire">Prix Unitaire</label>
                        <input type="number" class="form-control @error('prix_achat_unitaire') is-invalid @enderror"
                            name="prix_achat_unitaire" id="prix_achat_unitaire"
                            placeholder="Entrer le prix unitaire de l'article" value="{{ old('prix_achat_unitaire')}}">
                    </div>
                    @error('prix_achat_unitaire')
                    <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fournisseur</label>
                        <select class="form-control select2" style="width: 100%;" name="fournisseur_id">

                            <option selected="selected" value=""> Aucun Fournisseur</option>

                            @foreach ($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">
                                {{$fournisseur->nom}}
                            </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                {{-- date_reception --}}
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">

                        <!-- Date and time -->
                        <div class="form-group">
                            <label>Date :</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="datetime-local" name="date_reception" class="form-control" />
                            </div>
                        </div>


                    </div>
                    @error('date_reception')
                    <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    {{-- libelle --}}
                    <div class="form-group">
                        <label for="switch">Enregistrer Encore</label>
                        <input type="checkbox" name="encore" checked data-bootstrap-switch data-off-color="danger"
                            data-on-color="success">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <a href="{{ route('approvisionnement.index') }}"
                            class="btn btn-warning btn-block text-light mb-2">Retour</a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h3 class="card-title">Approvisionnement Approvisionnement du 12/06/2021</h3>

    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Auteur : {{Auth::user()->nom}} {{Auth::user()->prenoms}}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm float-right" style="width: 150px;">
                                <b>Code: 0010</b>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 700px;">
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
                                @for ($i = 10; $i < 15; $i++) <tr>
                                    <td>00{{$i}}0</td>
                                    <td>{{rand($i,20*$i)}}</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-md mr-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button data-toggle="modal" data-target="#modal-update-" title="Modiffier"
                                            class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
                                            data-target="#modal-danger-">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    </tr>
                                    @endfor

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

        </div>
    </div>
</div>
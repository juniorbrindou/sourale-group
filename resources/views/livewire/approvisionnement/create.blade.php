<div>
    <div class="card card-primary box-perso">
        <div class="card-header">
            <h3 class="card-title">Entrée de Stock</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->






        <form wire:submit.prevent="submit">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Article Concerné *</label>
                            <select class="form-control select2" wire:model="article" style="width: 100%;"
                                name="article_id">

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
                            <input type="number" wire:model="qte_recu"
                                class="form-control @error('qte_recu') is-invalid @enderror" name="qte_recu"
                                id="qte_recu" placeholder="Entrer la quantité d'article" value="{{ old('qte_recu')}}">
                        </div>
                        @error('qte_recu')
                        <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                            role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- date_reception --}}
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">

                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Date :</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="datetime-local" wire:model="date_reception" value="2020-12-31"
                                        name="date_reception" class="form-control" />
                                </div>
                            </div>
                        </div>
                        @error('date_reception')
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
            <h3 class="card-title">Approvisionnement du 12/06/2021</h3>
        </div>
        <div class="card-body">
            <div wire:loading.delay wire:target="submit, addDeleteLigne">
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
                                    <b>Code: 0010</b>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height:600px;">
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
                                    @for ($i = 10; $i < 11; $i++) <tr>
                                        <td>00{{$i}}0</td>
                                        <td>{{rand($i,20*$i)}}</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td></td>
                                        <td>
                                            <button title="Modiffier" class="btn btn-primary btn-md">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn-md">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        </tr>
                                        @endfor

                                        @foreach ($ligne as $item=>$value)
                                        <tr>
                                            <td>{{$value['code']}}</td>
                                            <td>{{$value['article']}}</td>
                                            <td>{{$value['qte_recu']}}</td>
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
                                        @endforeach

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
                    <button type="reset" class="btn btn-warning btn-block text-light mb-2">Retour à la liste</button>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="reset" class="btn btn-dark btn-block text-light mb-2">Tout Effacer</button>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" wire:click="addApprovisionnement"
                        class="btn btn-primary btn-block">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
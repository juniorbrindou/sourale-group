<div class="card card-info">
    <div wire:loading.delay wire:target="previsionStock,formPrevisionStock">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card-header">
        <div class="row">
            <h3 class="card-title col-sm-12 col-md-2">Etat du stock</h3>

            <a href="{{ route('approvisionnement.create') }}" class="mt-1 btn btn-md bg-success col-sm-12 col-md-2">
                <i class="fa fa-plus-circle"></i>
                Approvisionnement
            </a>

            <form wire:submit.prevent="formPrevisionStock" class="mt-1 col-sm-12 col-md-3">
                @csrf
                <div class="input-group">
                    <input type="datetime-local" wire:model.defer="datePrevisionStock" title="Selectionnez une date" class="form-control" #openDate name="" id="">
                    <span class="input-group-append"><button class="btn btn-md bg-dark btn-flat" wire:click="previsionStock">Ok</button></span>
                </div>
            </form>

            <a href="{{ route('destockages.create') }}" class="mt-1 btn btn-md bg-danger col-sm-12 col-md-2">
                <i class="fa fa-minus-circle"></i>
                Destockage
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Article</th>
                    <th title="Le nombre d'aticle disponible actuellement">
                        Stock Disponible
                    </th>

                    <th title="Nombre d'article Enregistré">
                        Stock Global Enregistré
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->code }}</td>
                        <td>
                            @if ($article->article_photo)
                                <img alt="Avatar" class="img-perso"
                                    src="{{ asset('storage/' . $article->article_photo) }}">
                            @else
                                <img alt="Avatar" class="img-perso"
                                    src="{{ asset('img/default_article100x100.png') }}">
                            @endif
                        </td>
                        <td><span class="text-bold">{{ $article->libelle }} </span></td>
                        <td>{{ $article->qte_en_stock }}</td>
                        <td>{{ $article->qte_stocker }} </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

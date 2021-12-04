<div class="card card-info">

    <div class="card-header">
        <h3 class="card-title">Etat du stock</h3>

        <form action="">
            <input type="datetime-local" class="input" #openDate name="" id="">
        </form>

        <a href="{{ route('approvisionnement.create') }}" class="float-right ml-4 btn btn-md bg-success">
            <i class="fa fa-plus-circle"></i>
            Approvisionnement
        </a>

        <a href="{{ route('destockages.create') }}" class="float-right btn btn-md bg-danger">
            <i class="fa fa-minus-circle"></i>
            Destockage
        </a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered">
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
                        <td>{{ $article->libelle }} </td>
                        <td>{{ $article->qte_en_stock }}</td>
                        <td>{{ $article->qte_stocker }} </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

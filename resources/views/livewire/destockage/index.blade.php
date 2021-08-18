<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Quantité</th>
                <th>Article</th>
                <th>Date de sortie</th>
                <th>Motif</th>
                <th>Auteur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sorties as $sortie)
            <tr>
                <td>{{$sortie->id}}</td>
                <td>{{$sortie->qte}}</td>
                <td>{{$sortie->article->libelle}}</td>
                <td>{{$sortie->created_at}} </td>
                <td>{{$sortie->motif}} </td>
                <td>{{$sortie->motif}} </td>
            </tr>

            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <th>#</th>
                <th>Quantité</th>
                <th>Article</th>
                <th>Date de sortie</th>
                <th>Motif</th>
                <th>Auteur</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
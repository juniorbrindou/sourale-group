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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sorties as $sortie)
            <tr>
                <td>{{$sortie->qte}}</td>
                <td>{{$sortie->article_id}}</td>
                <td>{{$sortie->motif}} </td>
                <td>{{$sortie->motif}} </td>
                <td>{{$sortie->motif}} </td>
                <td>
                    <a href="{{ route('destockages.show', $sortie->id) }}" class="btn btn-warning btn-md mr-1">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

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
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
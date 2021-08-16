<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrees as $entree)
            <tr>
                <td>{{$entree->code}}</td>
                <td>{{$entree->date_entre}}</td>
                <td>{{$entree->user->nom}} </td>
                <td>
                    <a href="{{ route('approvisionnement.show', $entree->id) }}" class="btn btn-warning btn-md mr-1">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
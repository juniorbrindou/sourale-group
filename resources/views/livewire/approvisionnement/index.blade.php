<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrees as $entree)
            <tr>
                <td>{{$entree->id}}</td>
                <td>{{$entree->code}}</td>
                <td>{{$entree->created_at}}</td>
                <td>{{$entree->user->nom}} </td>
                <td>
                    <a href="{{ route('approvisionnement.show', $entree->id) }}" class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>
    </table>
</div>
<!-- /.card-body -->

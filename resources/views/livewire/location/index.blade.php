<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>libelle</th>
                <th>Evenement</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>{{$location->code}}</td>
                <td>{{$location->libelle}}</td>
                <td>{{$location->libelle}}</td>
                <td>{{$location->evenement->libelle}} </td>
                <td>
                    <a href="{{ route('locations.show', $location->id) }}" class="btn btn-warning btn-md mr-1">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Date d'ajout</th>
                <th>Auteur</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
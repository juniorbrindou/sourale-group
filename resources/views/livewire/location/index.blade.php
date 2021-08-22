<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Evenement</th>
                <th>Client</th>
                <th>Lieu</th>
                <th>invités</th>
                <th>status</th>
                <th>Net a payer</th>
                <th>caution</th>
                <th>Type</th>
                <th>date début</th>
                <th>date fin</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <td>{{$evenement->id}}</td>
                <td class="text-uppercase">{{$evenement->libelle}}</td>
                <td>{{$evenement->client->nom}} </td>
                <td>{{$evenement->lieu}} </td>
                <td>{{$evenement->nbr_personne}}</td>
                <td><span class="badge badge-primary">{{$evenement->status}}</span> </td>
                <td><b>{{$evenement->montant_total}}</b> </td>
                <td><b>{{$evenement->caution}}</b> </td>
                <td>{{$evenement->type_evenement->libelle}} </td>
                <td>{{$evenement->date_debut_evenement}} </td>
                <td>{{$evenement->date_fin_evenement}} </td>
                <td>
                    <a href="{{ route('locations.show', $evenement->id) }}" class="btn btn-warning btn-md mr-1">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Evenement</th>
                <th>Client</th>
                <th>Lieu</th>
                <th>invités</th>
                <th>status</th>
                <th>Net a payer</th>
                <th>caution</th>
                <th>Type</th>
                <th>date début</th>
                <th>date fin</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
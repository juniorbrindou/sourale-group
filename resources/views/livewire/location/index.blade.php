<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Evenement</th>
                <th>Client</th>
                <th>Net a payer</th>
                <th>caution</th>
                <th>date début</th>
                <th>date fin</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <td>{{$evenement->id}}</td>
                <td class="text-uppercase">{{$evenement->libelle}}</td>
                <td>{{$evenement->client->nom}} </td>
                <td><b>{{ format_money($evenement->montant_total) }}</b> </td>
                <td><b>{{ format_money($evenement->caution) }}</b> </td>
                <td>{{$evenement->date_debut_evenement}} </td>
                <td>{{$evenement->date_fin_evenement}} </td>
                <td><span class="badge badge-primary">{{$evenement->status}}</span> </td>
                <td>
                    <a href="{{ route('locations.show', $evenement->id) }}" class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>
    </table>
</div>
<!-- /.card-body -->

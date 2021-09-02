<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="*%">Evenement</th>
                <th width="*%">Client</th>
                <th width="5%">Net a payer</th>
                <th width="5%">caution</th>
                <th width="10%">date début</th>
                <th width="5%">status</th>
                <th width="*%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <td>{{$evenement->id}}</td>
                <td class="text-uppercase">{{$evenement->libelle}}</td>
                <td>{{$evenement->client->nom}} </td>
                <td title="Sans la caution: {{ format_money($evenement->montant_total - $evenement->caution) }} F CFA">
                    <b>{{ format_money($evenement->montant_total) }}</b> </td>
                <td><b>{{ format_money($evenement->caution) }}</b> </td>
                <td>{{ $evenement->date_debut_evenement }} </td>
                <td><span class="badge badge-primary">{{$evenement->status}}</span> </td>
                <td>
                    <a title="Voir l'évènement" href="{{ route('locations.show', $evenement->id) }}"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a title="Visualiser la facture" href="#" style="color:yellow" class="btn btn-dark btn-md">
                        <i class="fa fa-file-pdf"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.card-body -->

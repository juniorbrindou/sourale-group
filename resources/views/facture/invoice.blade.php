<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Simple invoice html template</title>
</head>

<style>
    /* long */
    @import "https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700";

    html,
    body,
    div,
    span,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    em,
    img,
    s,
    small,
    strike,
    strong,
    sub,
    sup,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    ul,
    li,
    th,
    td,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    total,
    time,
    mark {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline
    }

    /* end first long  */
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block
    }

    body {
        line-height: 1
    }

    ol,
    ul {
        list-style: none
    }

    blockquote,
    q {
        quotes: none
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none
    }

    table {
        border-collapse: collapse;
        border-spacing: 0
    }

    body {
        height: 840px;
        width: 592px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 14px
    }

    strong {
        font-weight: 780
    }

    #container {
        position: relative;
        padding: 4%
    }

    #header {
        height: 55px
    }

    #header>#reference {
        text-align: center
    }

    #header>#reference h3 {
        margin-top: 5px;
        font-size: initial;
        text-decoration: underline;
    }

    #header>#reference h4 {
        margin-top: 1%;
        font-size: 85%;
        font-weight: 600
    }

    #header>#reference p {
        margin: 0;
        margin-top: 1%;
        font-size: 85%
    }

    #fromto {
        height: 140px
    }

    #fromto>#from,
    #fromto>#to {
        width: 45%;
        min-height: 90px;
        font-size: 85%;
        padding: 1.5%;
        line-height: 120%
    }

    #fromto>#from {
        float: left;
        width: 45%;
        background: #efefef;
        font-size: 85%;
        padding: 1.5%
    }

    #fromto>#to {
        float: right;
        border: solid grey 1px
    }

    #items>p {
        font-weight: 700;
        text-align: right;
        margin-bottom: 1%;
        font-size: 65%
    }

    #items>table {
        width: 100%;
        font-size: 85%;
        border: solid goldenrod 1px
    }

    #items>table th:first-child {
        text-align: left
    }

    #items>table th {
        font-weight: 400;
        padding: 1px 4px;
        background-color: goldenrod;
    }

    #items>table td {
        padding: 1px 4px
    }

    #items>table th:nth-child(2),
    #items>table th:nth-child(4) {
        width: 45px
    }

    #items>table th:nth-child(3) {
        width: 60px
    }

    #items>table th:nth-child(5) {
        width: 80px
    }

    #items>table tr td:not(:first-child) {
        text-align: right;
        padding-right: 1%
    }

    #items table td {
        border-right: solid goldenrod 1px
    }

    #items table tr td {
        padding-top: 3px;
        padding-bottom: 3px;
        height: 10px
    }

    #items table tr:nth-child(1) {
        border: solid goldenrod 1px
    }

    #items table tr th {
        border-right: solid grey 1px;
        padding: 3px
    }

    #items table tr:nth-child(2)>td {
        padding-top: 8px
    }

    #summary {
        margin-top: -1px
    }

    #summary #note {
        display: block;
    }

    #summary #note h4 {
        font-size: 15px;
        font-weight: 900;
        font-style: italic;
        margin-bottom: 4px
    }

    #summary #total {
        float: right;
    }

    #summary #total table {
        font-size: 85%;
        width: 260px;
        /* float: right; */
    }

    #summary #total table td {
        padding: 3px 4px
    }

    #summary #total table tr td:last-child {
        text-align: right
    }

    #summary #total table tr:nth-child(3) {
        background: #efefef;
        font-weight: 600
    }

    #footer {
        margin: auto;
        position: fixed;
        left: 4%;
        bottom: 0%;
        right: 4%;
        /* border-top: solid grey 1px; */
    }

    #footer p {
        margin-top: 1%;
        font-size: 65%;
        line-height: 140%;
        text-align: center
    }

    @page {
        margin: 0;
    }

    .right {
        float: right;
    }

    .t-left {
        text-align: left;
    }

    .ml-3 {
        margin-left: 10px;
    }

    .ml-4 {
        margin-left: 15px;
    }

    .ml-5 {
        margin-left: 20px;
    }

    .d-inline-block {
        display: inline-block;
    }

    .border-1 {
        border: 1px solid goldenrod;
    }

    ol {
        margin-top: 20px;
    }

    ol li {
        list-style-type: decimal;
        font-size: 14px;
        margin: 1px;
    }
</style>

<body>
    <div id="container">
        <div class="banner">
            <img src="{{ asset('img/545x150&text=SOURALE-GROUP.png')}}" alt="banniere" class="img-banner">
        </div>
        <div id="header">
            <div id="reference">
                <h3><strong>Facture</strong></h3>
                <h4>Réf. : {{$facture->code}}</h4>
                <p>Date facturation : {{$facture->date_creation}}</p>
            </div>
        </div>

        <div id="fromto">
            <div id="from">
                <p>
                    <strong>SOURALE-GROUP</strong><br>
                    Cocody Angré 8eme tranche <br>
                    programme 6<br><br>
                    Tél.: 07 08 08 49 48 <br>
                    Email: contact@souralegroup.ci <br>

                </p>
            </div>
            <div id="to">
                <p>
                    <span class="ml-2 right">{{$client->nom ?? ''}} <strong>Client</strong></span><br>
                    <span class="ml-2 right">{{$client->contact1 ?? ''}} <strong>Contact</strong></span><br>
                    <hr>
                    <span class="ml-2 right">{{$evenement->libelle ?? ''}} <strong
                            class="ml-3">Evenement</strong></span><br>
                    <span class="ml-2 right">{{$evenement->date_debut_evenement ?? ''}}
                        <strong class="ml-3">Date
                            début</strong></span><br>
                    <span class="ml-2 right">{{$evenement->date_fin_evenement ?? ''}}<strong class="ml-4">Date
                            fin</strong></span><br>
                    <span class="ml-2 right">{{$evenement->nbr_personne ?? '0'}} personne(s) <strong
                            class="ml-5">Invités</strong></span><br>
                    <span class="ml-2 right">{{$evenement->lieu ?? ''}} <strong class="ml-5">Lieu</strong></span><br>
                </p>
            </div>
        </div>

        <div id="items">
            <p>Montants exprimés en Franc CFA</p>
            <table>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 48%">Désignation</th>
                    <th style="width: 13%;">P.U. HT</th>
                    <th style="width: 13%;">Qté</th>
                    <th style="width: 8%;">jours</th>
                    <th style="width: 13%;">Sous Total</th>
                </tr>
                @forelse ($tab_locations as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->article->libelle}}</td>
                    <td>{{ $item->article->prix_tarification}}</td>
                    <td>{{ $item->qte_loue }}</td>
                    <td>{{ $item->nb_jour }}</td>
                    <td>{{ format_money($item->total_une_ligne) ?? format_money(total_ligne($item->article->prix_tarification, $item->qte_loue, $item->nb_jour)) }}
                    </td>
                </tr>
                @empty

                @endforelse

            </table>
        </div>

        <div id="summary">

            <div id="total">
                <table class="border-1">
                    <tr>
                        <td>Total HT</td>
                        <td>{{$totalBrute}}</td>
                    </tr>
                    <tr>
                        <td>Caution (20%)</td>
                        <td>{{ format_money($evenement->caution) ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>Total TTC</td>
                        <td>{{ format_money($evenement->montant_total)}}</td>
                    </tr>
                </table>
            </div>

            <br>
            <br>
            <br>
            <br>
            <div id="note">
                <h4>NOTE : CONDITIONS DE LOCATION</h4>
                <ol>
                    <li>La location est faite pour 24h. Le jour supplémentaire est facturé</li>
                    <li>Le matériel loué est sous l'entière responsabilité du client</li>
                    <li>Une reservation n'est prise en compte qu'après versement d'un acompte</li>
                    <li>Une réservation annulée entraine une retenue de 75% sur la valeur versée</li>
                    <li>Toute réservation doit être confirmée 48h avant le jour de la livraison en versant la valeur
                        totale de la commande plus une caution</li>
                    <li>La caution remboursable de 20% de la valeur soit <span
                            style="color: red;"><b>{{ format_money($evenement->caution) ?? ''}} F CFA est
                                obligatoire</b></span></li>
                    <li>La caution est rembousable en 24h après le retour du matériel</li>
                    <li><span style="color: red;"><b>Le transport est à la charge du client</b></span> </li>
                </ol>
                </p>
            </div>
        </div>

        <div id="footer">
            <hr width="545">
            <p>SOURALÈ-GROUP - Sise à Cocody - Angré - Société à responsabilité limité (SARL) <br>
                07 08 08 49 48 - contact@souralegroup.c</p>
        </div>
    </div>

    {{-- <script>
        window.addEventListener("load",window.print())
    </script> --}}

</body>

</html>

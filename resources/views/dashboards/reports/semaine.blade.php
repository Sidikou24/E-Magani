<div id="invoice-POS">

            <!-- Section d'Affichage -->
            <div id="print_content">

                <center id="top">
                    <div class="logo">{{$pharmacie->name}}</div>
                    <div class="info"></div>
                    <h2> E-Magani</h2>
                </center>
            </div>

            <div class="mid">
                <div class="info">
                    <h2>Contacter</h2>
                    <p>
                        Address: Laboratoire R-Lantis
                        Email: pfe@gmail.com
                        Phone: 12345678
                    </p>
                </div>

            </div>
            <!-- Fin Du recu -->
            <div class="bot">
                <div class="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h2>Nom du Vendeur</h2>
                            </td>
                            <td class="item">
                                <h2>Article</h2>
                            </td>
                            <td class="Hours">
                                <h2>Prix</h2>
                            </td>
                            <td class="Rate">
                                <h2> Qty</h2>
                            </td>
                            <td class="Rate">
                                <h2>Unité</h2>
                            </td>
                            <td class="Rate">
                                <h2>Total</h2>
                            </td>
                        </tr>
                    @foreach($order_Semaine as $receipt)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{$receipt->user_name}}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{$receipt->produit_name}}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{number_format($receipt->unitprice,2)}}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{$receipt->quantity}}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{$receipt->discount ? ' ' : '0'}}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{number_format($receipt->amount,2)}}</p>
                            </td>
                        </tr>
                    @endforeach
                        <tr class="tabletitle">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="Rate">
                                <p class="itemtext">Tax</p>
                            </td>
                            <td class="Payment">
                                <p class="itemtext">$ </p>
                            </td>
                        </tr>
                        <tr class="tabletitle">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="Rate">Total</td>
                            <td class="Payment">
                                <h2>$  {{number_format($order_Semaine->sum('amount'),2)}}</h2>
                            </td>
                        </tr>
                    </table>
                    <div class="legalcopy">
                        <p class="legal"><strong>** Merci pour la visite</strong><br>
                            Les Biens qui sont soumis aux prix de tax
                        </p>
                    </div>
                    <div class="serial-number">Série
                        <span class="serial">
                            12345UYTRE1234
                        </span>
                        <span>24/12/1099 &nbsp; &nbsp; 00: 45</span>
                    </div>
                </div>
            </div>

</div>

<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 58mm;
        background: #fff;
    }

    #invoice-POS::selection {
        background: #2ecc71;
        color: #fff;
    }

    #invoice-POS ::-moz-selection {
        background: #2ecc71;
        color: #fff;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: 0.9em;

    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: 0.7em;
        line-height: 1.2em;
        color: #666;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
        text-align: center;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: 0.4em;
        background: #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 0.5em;
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
        text-align: center;
    }

    .serial-number {
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }

    .serial {
        font-size: 10px !important;
    }
</style>
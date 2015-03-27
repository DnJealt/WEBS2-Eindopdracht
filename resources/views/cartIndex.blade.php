@include('head')
<body>
@include('header')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-danger">
                <div class="panel-heading panelCustom">
                    <h2>Winkelwagentje</h2>
                </div>

                <div class="panel-body">
                    {{--Table voor de producten--}}
                    <table class="shopping_cart_content">
                        <caption>
                            Winkelwagentje
                        </caption>
                        <colgroup>
                            <col class="item_row">
                            <col class="deliver_row">
                            <col class="price_row">
                            <col class="amount_row">
                            <col class="total_row">
                            <col class="save_row">
                        </colgroup>
                        <thead class="h4">
                            <tr>
                                <th>Artikel</th>
                                <th>Levering</th>
                                <th>Prijs</th>
                                <th>Aantal</th>
                                <th class="aright">Totaal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="item_row">
                                <div>
                                    <a class="" title="#producttitle" href="#productUrl"> {{--needs to be adapted--}}
                                        {{--product image--}}
                                    </a>
                                </div>
                                <div class="product_details">
                                    <div>
                                        <a class="product_name" href="#productUrl" title="#productTitle"> #productTitle</a>
                                    </div>
                                    <div>{{--Product gegeven zoals title--}}</div>
                                    <div>{{--categorie--}}</div>
                                </div>
                            </td>
                            <td>
                                <p>{{--..Werkdagen--}}</p>
                            </td>
                            <td>
                                <span class="pricewrap">
                                    {{--#productPrice--}}
                                    <br>
                                </span>
                            </td>
                            <td>

                            </td>
                            <td class="total_row">
                                <span class="pricewrap">
                                    {{--calculated total price--}}
                                </span>
                            </td>
                            <td>
                                {{--remove item--}}
                                <form method="post" action="">

                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-3 text-center">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Winkel
                </div>

                <div class="panel-body">
                    <div class="row">
                        {{--Hier komen kort de namen en prijzen te staan--}}
                        <img src="/WEBS2-Eindopdracht/public/img/productimg/pindakaasBig.png" width="20%" height="20%" alt="Shop product">
                    </div>

                    <div class="row">
                        {{--Hier komt het eindbedrag te staan--}}
                        <p>Eindbedrag</p>
                    </div>

                    <div class="row">
                        <p><a class="btn btn-danger" href="{{URL::to('#checkOut')}}" role="button">nu Afrekenen &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('footer')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/WEBS2-Eindopdracht/public/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="/WEBS2-Eindopdracht/public/js/vendor/bootstrap.min.js"></script>
<script src="/WEBS2-Eindopdracht/public/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#divAuction2').hide();
        setInterval(function() {
            if($('#divAuction1').is(':visible')) {
                $('#divAuction1').fadeOut('slow');
                $('#divAuction2').delay(600).fadeIn('slow');
            } else {
                $('#divAuction2').fadeOut('slow');
                $('#divAuction1').delay(600).fadeIn('slow');
            }
        }, 5000);
    })
</script>
</body>
</html>
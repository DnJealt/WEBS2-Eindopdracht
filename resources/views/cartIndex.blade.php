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
                        {{--<colgroup>--}}
                        {{--<col class="item_row">--}}
                        {{--<col class="deliver_row">--}}
                        {{--<col class="price_row">--}}
                        {{--<col class="amount_row">--}}
                        {{--<col class="total_row">--}}
                        {{--<col class="save_row">--}}
                        {{--</colgroup>--}}
                        <thead class="h4">
                        <div class="row">
                            <tr>
                                <th>Artikel</th>
                                <th>Levering</th>
                                <th>Prijs</th>
                                <th>Aantal</th>
                                <th class="aright">Totaal</th>
                                <th></th>
                            </tr>
                        </div>
                        </thead>
                        <tbody>
                        @foreach($products as $items)
                            <tr>
                                <td class="item_row">
                                    <div>
                                        {{--<a class="" title="#{{$items->prdName}}"--}}
                                           {{--href="productDetail/{{$items->prdId}}"> --}}{{--needs to be adapted--}}
                                            {{--<img src="WEBS2-Eindopdracht/public/img/productimg/{{$items->prdPicSmall}}"--}}
                                                 {{--width="" height="">--}}
                                        {{--</a>--}}
                                    </div>
                                    <div class="product_details">
                                        <div>
                                            {{--<a class="product_name" href="productDetail/{{$items->prdId}}"--}}
                                               {{--title="{{$items->prdName}}">--}}
                                                {{--{{$items->prdName}}</a>--}}
                                        </div>
                                        <div>{{--Product gegeven zoals title--}}</div>
                                                {{--evt. verdere gegevens--}}
                                        <div>{{--categorie--}}
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
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
                        {{--@foreach($prices as $price)--}}
                        {{--<td>--}}
                        {{--{{$price}}--}}
                        {{--</td>--}}
                        {{--@endforeach--}}

                        <img src="/WEBS2-Eindopdracht/public/img/productimg/pindakaasBig.png" width="20%" height="20%"
                             alt="Shop product">
                    </div>

                    <div class="row">
                        {{--Hier komt het eindbedrag te staan--}}
                        <p>Eindbedrag</p>
                        {{--<td>--}}
                        {{--@foreach($prices as $price)--}}
                        {{--total prijs: {{$totalPrice = $totalPrice + $price}}--}}
                        {{--@endforeach--}}
                        {{--</td></div>--}}

                        <div class="row">
                            <p><a class="btn btn-danger" href="{{URL::to('#checkOut')}}" role="button">nu
                                    Afrekenen &raquo;</a>
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
        $(document).ready(function () {
            $('#divAuction2').hide();
            setInterval(function () {
                if ($('#divAuction1').is(':visible')) {
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
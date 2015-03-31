@include('head')
<body>
@include('header')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-danger">
                <div class="panel-heading panelCustom">
                    <h2>Check Out</h2>
                </div>

                <div class="panel-body">
                    {{--Table voor de producten--}}
                    <table class="shopping_cart_content" cellspacing="10" cellpadding="10" border="0">

                        <colgroup>
                            <col class="item_row">
                            <col class="price_row">
                            <col class="amount_row">
                            <col class="total_row">
                            <col class="save_row">
                        </colgroup>
                        <thead class="h4">
                        <div class="row">
                            <tr>
                                <th>Artikel</th>
                                <th>Prijs</th>
                                <th>Aantal</th>
                                <th class="aright">Totaal</th>
                            </tr>
                        </div>
                        </thead>
                        <tbody>
                        <?php $count = 0 ?>
                        @foreach($products as $items)
                            <tr>
                                <td class="item_row">
                                    <div>
                                        <a class="" title="{{$items->prdName}}"
                                           href="productDetail/{{$items->prdId}}">
                                            <img src="{{ URL::to("/img/productimg/$items->prdPicSmall") }}"
                                                 width="75"
                                                 height="100">
                                        </a>
                                    </div>
                                    <div class="product_details">
                                        <div>
                                            <a class="product_name" href="productDetail/{{$items->prdId}}"
                                               title="{{$items->prdName}}">
                                                {{$items->prdName}}</a>
                                        </div>
                                        <div>{{--Product gegeven zoals title--}}</div>

                                        <div>{{--categorie--}}
                                            {{--{{$categories->ctgName}}--}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <span class="pricewrap">
                                    {{--#productPrice--}}
                                    {{$items->prdPrice}}
                                    <br>
                                </span>
                                </td>
                                <td>
                                    {{--product amount--}}
                                    {{$amounts[$count]}}x
                                </td>
                                <td class="total_row">
                                <span class="pricewrap">
                                    {{--calculated total price--}}
                                    €{{$items->prdPrice * $amounts[$count]}}
                                </span>
                                </td>
                            <?php $count++ ?>
                        @endforeach
                        </tbody>
                    </table>
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
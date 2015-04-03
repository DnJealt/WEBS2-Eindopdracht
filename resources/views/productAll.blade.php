@include('head')
<body>
@include('header')

<div class="container">

    <div class="row">

        <div class="col-md-offset-1">
            <?php $count = 1; ?>
            @foreach($products as $items)
                <div class="row">
                    @if($count % 2 == 0)

                        <a href="{{Url::to("productDetail/$items->prdId")}}">
                            <div class="evending">
                                <div class="col-md-2">
                                    <img src="{{ URL::to("/img/productimg/$items->prdPicSmall") }}" width="75" height="100">
                                </div>
                                <div class="col-md-offset-5">
                                    <p> {{$items->prdName}}    </p>
                                    <p> Prijs: €{{$items->prdPrice}}    </p>
                                    <p> {{$items->prdSummary}}    </p>
                                    <p></p>
                                    @if(Auth::user())
                                        <form method="post" action="{{Url::to("addToCart/$items->prdId")}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input class="" type="submit" value="add to cart" name="{{$items->prdId}}">
                                        </form>
                                    @endif<br>
                                </div>

                            </div>
                        </a>
                    @else
                        <a href="{{Url::to("productDetail/$items->prdId")}}">
                            <div class="onevending">
                                <div class="col-md-2">
                                    <img src="{{ URL::to("/img/productimg/$items->prdPicSmall") }}" width="75" height="100">
                                </div>
                                <div class="col-md-offset-5">
                                    <p> {{$items->prdName}}    </p>
                                    <p> Prijs: €{{$items->prdPrice}}    </p>
                                    <p> {{$items->prdSummary}}    </p>
                                    <p></p>
                                    @if(Auth::user())
                                        <form method="post" action="{{Url::to("addToCart/$items->prdId")}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input class="" type="submit" value="add to cart" name="{{$items->prdId}}">
                                        </form>
                                    @endif<br>
                                </div>

                            </div>
                        </a>
                    @endif
                </div>
                <p></p>
                    <?php $count++; ?>
            @endforeach

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
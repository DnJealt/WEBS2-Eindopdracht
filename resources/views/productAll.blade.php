@include('head')
<body>
@include('header')

<div class="container">

    <div class="row">

        <div class="col-md-offset-1">

            @foreach($products as $items)
                <div class="row">
                    @if($items->prdId % 2 == 0)

                        <a href="productDetail/{{$items->prdId}}">
                            <div class="evending">
                                <div class="col-md-2">
                                    <img src="{{ URL::to("/img/productimg/$items->prdPicSmall") }}" width="100" height="150">
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

                        <a href="productDetail/{{$items->prdId}}">
                            <div class="onevending">
                                <div class="col-md-2">
                                    <img src="{{ URL::to("/img/productimg/$items->prdPicSmall") }}" width="100" height="150">
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

            @endforeach

        </div>
    </div>

    </div>











@include('footer')



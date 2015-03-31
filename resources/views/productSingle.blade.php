@include('head')
<body>
@include('header')

<div class="container">

    <div class="row">

        <div class="col-md-1">
            <img src="{{ URL::to("/img/productimg/$products->prdPicBig") }}"  height="480px" width="320px">
        </div>
        <div class="col-md-offset-8">
            <h2>{{$products->prdName}}</h2>
            <p> Prijs: €{{$products->prdPrice}} </p>
            <p> <b>Korte omschrijving:</b> <br>{{$products->prdSummary}} </p>
            <p> <b>Uitgebreide omschrijving:</b> <br>{{$products->prdDescription}} </p>
            <p></p>
                @if(Auth::user())
                <form method="post" action="{{Url::to("c")}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="" type="submit" value="add to cart" name="{{$products->prdId}}">
                </form>
                @endif
        </div>
    </div>
</div>
@include('footer')


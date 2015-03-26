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
        </div>


    </div>



</div>
@include('footer')


@include('head')
<body>
@include('header')

<div class="container">

    <img src="/public/img/productimg/{{$products->prdPicBig}}">
    <p> {{$products->prdName}} </p>
    <p> {{$products->prdPrice}} </p>
    <p> {{$products->prdSummary}} </p>
    <p> {{$products->prdDescription}} </p>

</div>
@include('footer')


@include('head')
<body>
@include('header')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-offset-1">

            @foreach($products as $items)

                <a href="productDetail/{{$items->prdId}}">
                    @if($items->prdId % 2 == 0)
                    <div class="evending">
                        <p> {{$items->prdName}}    </p>
                        <p> {{$items->prdPrice}}    </p>
                        <p> {{$items->prdSummary}}    </p>
                        <p> {{$items->prdDescription}}    </p>
                    </div>
                    @else
                        <div class="onevending">
                            <p> {{$items->prdName}}    </p>
                            <p> {{$items->prdPrice}}    </p>
                            <p> {{$items->prdSummary}}    </p>
                            <p> {{$items->prdDescription}}    </p>
                        </div>
                    @endif

                </a>

                <p></p>

            @endforeach

        </div>

    </div>





</div>
@include('footer')



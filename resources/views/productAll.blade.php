pindakaas test


@foreach($products as $items)
   <p> {{$items->prdName}}    </p>
   <p> {{$items->prdPrice}}    </p>
   <p> {{$items->prdSummary}}    </p>
   <p> {{$items->prdDescription}}    </p>
   <p></p>
@endforeach
@include('head')
<body>
@include('header')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div>
                <h1>Product bewerken</h1>
                <form method="post" id="updateProduct" action="{{URL::to("CMS/updateProduct/$product->prdId")}}" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>
                                <p><input type="text" name="prdName" placeholder="Productnaam" value="{{$product->prdName}}" required></p>
                            </th>
                        </tr>
                        <tr>
                            <th>

                                <p><input type="number" step="0.01" name="prdPrice" placeholder="Prijs" value="{{$product->prdPrice}}" required></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><textarea form="updateProduct" name="prdSummary" maxlength="200" rows="2" cols="50" placeholder="Samenvatting" required>{{$product->prdSummary}}</textarea></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><textarea form="updateProduct" name="prdDescription" maxlength="500" rows="5" cols="50" placeholder="Beschrijving" required>{{$product->prdDescription}}</textarea></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>
                                    Categorie:
                                    <select name="categorie" form="updateProduct" required>
                                        @foreach($categories as $items)

                                            @if($product->categorie_ctgId == $items->ctgId)
                                            <option selected value="{{$items->ctgId}}">
                                                {{$items->ctgName}}
                                            </option>
                                            @else
                                                <option value="{{$items->ctgId}}">
                                                    {{$items->ctgName}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </p>

                            </th>
                        </tr>
                        <br>
                        <tr>
                            <th>
                                <p>Klein productplaatje<input type="file" name="smallFileToUpload"></p>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <p>Groot productplaatje<input type="file" name="bigFileToUpload"></p>
                            </th>
                        </tr>
                        <tr>
                            <th>

                            </th>
                            <th>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <p class="submit"><input type="submit" name="submit" value="Maak aan"></p>
                            </th>
                        </tr>
                    </table>
                </form>
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
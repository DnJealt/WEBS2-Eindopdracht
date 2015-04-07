@include('head')
<body>
@include('header')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
                <h1>Categorie aanmaken</h1>
                <form method="post" id="updateCategory" action="{{URL::to("CMS/updateCategory/$category->ctgId")}}">
                    <table>
                        <tr>
                            <th>
                                <p><input type="text" maxlength="45" value="{{$category->ctgName}}" placeholder="Categorienaam" name="ctgName" autofocus required></p>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <p>
                                    Subcategorie van:
                                    @if($category->ctgSubOf == 0 && $hasSubCats)
                                        <select name="subCatOf" form="updateCategory">
                                            <option selected value="0">Geen</option>
                                        </select>
                                    @else
                                    <select name="subCatOf" form="updateCategory" required>
                                        <option value="0">Geen</option>
                                        @foreach($baseCats as $items)
                                            @if($items->ctgId == $category->ctgSubOf)
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
                                    @endif
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p class="submit"><input type="submit" name="submit" value="Wijzig"></p>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        <div class="col-md-offset-10 col-md-2">
            @if(!($category->ctgSubOf == 0 && $hasSubCats))
                <form method="post" onsubmit="return confirm('Weet je zeker dat je deze categorie wil verwijderen?');" action="{{URL::to("CMS/deleteCategory/$category->ctgId")}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p><input type="submit" name="submit" value="Verwijder"></p>
                </form>
            @endif

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

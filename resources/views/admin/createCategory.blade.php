@include('head')
<body>
@include('header')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div>
                <h1>Categorie aanmaken</h1>
                <form method="post" id="createCategory" action="{{URL::to('CMS/storeCategory')}}">
                    <table>
                        <tr>
                            <th>
                                <p><input type="text" maxlength="45" placeholder="Categorienaam" name="ctgName" autofocus required></p>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <p>
                                    Subcategorie van:
                                    <select name="subCatOf" form="createCategory" required>
                                        <option value="0" selected>Geen</option>
                                        @foreach($baseCats as $items)
                                            <option value="{{$items->ctgId}}">
                                                {{$items->ctgName}}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </th>
                        </tr>
                        <tr>
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
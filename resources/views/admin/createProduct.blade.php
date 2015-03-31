@include('head')
<body>
@include('header')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="createProduct">
                <h1>Product aanmaken</h1>
                <form method="post" id="createProduct" action="{{URL::to('CMS/storeProduct')}}" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>
                                <p><input type="text" name="prdName" value="" placeholder="Productnaam" required></p>
                            </th>
                        </tr>
                        <tr>
                            <th>

                                <p><input type="number" step="0.01" name="prdPrice" value="" placeholder="Prijs" required></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><textarea form="createProduct" name="prdSummary" maxlength="200" rows="2" cols="50" placeholder="Samenvatting" required></textarea></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><textarea form="createProduct" name="prdDescription" maxlength="500" rows="5" cols="50" placeholder="Beschrijving" required></textarea></p>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <p>Klein productplaatje<input type="file" name="smallFileToUpload" required></p>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <p>Groot productplaatje<input type="file" name="bigFileToUpload" required></p>
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
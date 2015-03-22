@include('head')
<body>
@include('header')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-8">
            <h2>CalveTella</h2>

            <p>CalveTella is een site waar wij al uw broodsmeersel aanbieden.</p>

            <p class="text-right">
                <a class="btn btn-danger" href="about" role="button">
                    Naar Wat wij doen &raquo;
                </a>
            </p>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Shop
                </div>
                <div class="panel-body">
                    <div class="row">
                        <img src="#" width="150px" height="200px" alt="Veiling product">
                    </div>
                    <div class="row">
                        <p>Product van de maand!</p>
                    </div>
                    <div class="row">
                        <p><a class="btn btn-danger" href="#" role="button">Naar shop &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <section id="carousel">
                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="8000">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <img src="img/slider/sliderbg1.jpg">
                            <div class="carousel-caption">
                                <p><b>Duurzaam door hergebruik</b></p>
                                <p>Alles wat verkoopbaar is krijgt bij klanten een nieuw leven. Het restafval wordt
                                    gescheiden aangeleverd bij verwerkingsbedrijven.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/slider/sliderbg2.jpg">
                            <div class="carousel-caption">
                                <p><b>Oneliner 2</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum
                                    laudantium totam tempore optio doloremque laboriosam quas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/slider/sliderbg3.jpg">
                            <div class="carousel-caption">
                                <p><b>Oneliner 3</b></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum
                                    laudantium totam tempore optio doloremque laboriosam quas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    #
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <hr>
            <h3>Laatste nieuws</h3>

            <div class="row">
                <div class="col-md-12">
                    <p><strong>SOS Rommelmarkt nu actief op boekwinkeltjes.nl!</strong></p>

                    <p>SOS Rommelmarkt heeft een webshop geopend op boekwinkeltjes.nl.<br/>
                        Onze online boekwinkel is te zien door de onderstaande link te volgen.<br><a target="_blank"
                                                                                                     href="http://boekwinkeltjes.nl/bwzoeken.php?bwID=22317">Boekwinkeltjes.nl</a><br><br><a
                                href="#">Lees meer</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Geslaagde opening</strong></p>

                    <p>
                        Gisteren is ons nieuwe pand feestelijk in gebruik genomen. Wethouder Geert Snijders, onze
                        voorzitter Jetty Eugster en Bart Eigeman, voorzitter van het PUB kregen van medewerkers delen
                        van een sleutel. Samen konden ze de sleutel compleet maken, en na de woorden van wethouder Geert
                        Snijders werd het pand dan ook officieel geopend.<br><br>
                        <a href="#">Lees meer</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <p class="text-right"><a class="btn btn-danger" href="pages/news.php" role="button">Naar
                        Nieuws &raquo;</a></p>
            </div>
        </div>

    </div>
</div>

@include('footer')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
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

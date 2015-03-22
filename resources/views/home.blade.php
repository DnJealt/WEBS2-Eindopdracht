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
                        <img src="/WEBS2-Eindopdracht/public/img/productimg/pindakaasSmall.png" width="100%" height="100%" alt="Shop product">
                    </div>
                    <div class="row">
                        <p>Product van de maand!</p>
                    </div>

                    <div class="row">
                        <p><a class="btn btn-danger" href="{{URL::to('product')}}" role="button">Naar shop &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row">
        <div class="col-md-8">

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
    </div>--}}

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

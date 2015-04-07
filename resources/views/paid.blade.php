@include('head')
<body>
@include('header')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-danger">
                <div class="panel-heading panelCustom">
                    <h2>U heeft betaald!!</h2>
                </div>
            </div>
        </div>
    </div>


</div>

@include('footer')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/WEBS2-Eindopdracht/public/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="/WEBS2-Eindopdracht/public/js/vendor/bootstrap.min.js"></script>
<script src="/WEBS2-Eindopdracht/public/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#divAuction2').hide();
        setInterval(function () {
            if ($('#divAuction1').is(':visible')) {
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

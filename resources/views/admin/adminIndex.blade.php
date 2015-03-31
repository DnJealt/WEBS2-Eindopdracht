@include('head')
<body>
@include('header')



<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h1>Het geweldige admin CMS!</h1>
            <p>
            <h3>Producten</h3>
            <ul>
                <li>
                    <a href="{{URL::to('CMS/createProduct')}}">Maak product aan</a>
                </li>
                <li>
                    <a href="{{URL::to('CMS/updateProduct')}}">Beheer producten</a>
                </li>
            </ul>
            </p>
            <p>
            <h3>Categorieën</h3>
            <ul>
                <li>
                    <a href="{{URL::to('CMS/createCategorie')}}">Maak nieuwe categorie</a>
                </li>
                <li>
                    <a href="{{URL::to('CMS/updateCategorie')}}">Beheer categorieën</a>
                </li>
            </ul>
            </p>

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
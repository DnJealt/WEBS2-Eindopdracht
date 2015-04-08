@include('head')
<body>
@include('header')

<div class="block">
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <h1>Over ons</h1>

                <p>In de afgelopen weken hebben we gewerkt aan een webshop, hiervoor hebben we de kennis gebruikt van
                    wat
                    we geleerd hebben in de lessen van WEBS2.
                </p>
                <p><strong>All hail Lord Paul Wagener</strong></p>

                <h2>Wat wij hebben gedaan</h2>

                <div class="col-md-6">
                    <h2>Michael Schouten</h2>
                    <ul>
                        <li>includes:</li>
                        <ul>
                            <li>head</li>
                            <li>header</li>
                            <li>footer</li>
                        </ul>
                        <li>pagina's:</li>
                        <ul>
                            <li>home, about</li>
                            <li>login</li>
                            <li>registreer (alleen view)</li>
                            <li>cart, checkout, betaald</li>
                        </ul>
                        <li>functionaliteit:</li>
                        <ul>
                            <li>categorieen uit database in header laden</li>
                            <li>Sessions</li>
                        </ul>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h2>Jelte van Tartwijk</h2>
                    <ul>
                        <li>Paginas</li>
                        <ul>
                            <li>Productlijst</li>
                            <li>Product detailpagina</li>
                            <li>Admin index</li>
                            <li>Create product, update product</li>
                            <li>Create Category, update category</li>
                        </ul>
                        <li>Functionaliteit</li>
                        <ul>
                            <li>CMS, creëren en bewerken van categorieën, producten en het uploaden van plaatjes</li>
                            <li>Registreren van een user</li>
                            <li>Detailpagina's, het ophalen uit de database en de juiste informatie tonen.</li>
                        </ul>
                    </ul>
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
</body>
</html>
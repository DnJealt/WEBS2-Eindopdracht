
<!--[if lt IE 8]>
<p class="browserupgrade">U gebruikt een <strong>verouderde</strong> browser. Update <a href="http://browsehappy.com/">uw browser</a>, zodat wij een betere ervaring kunnen leveren.</p>
<![endif]-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="img/logo/CalveTella.png" height="100px" width="175px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}">Home</a></li>

                <li><a href="product">Shop</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">TBD <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="321">123#</a></li>
                        <li><a href="321">231</a></li>
                    </ul>
                </li>

                <li><a href="about">About</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a class="login" href="#login" role="button">Login</a> </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
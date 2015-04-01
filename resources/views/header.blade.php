<!--[if lt IE 8]>
<p class="browserupgrade">U gebruikt een <strong>verouderde</strong> browser. Update <a href="http://browsehappy.com/">uw
    browser</a>, zodat wij een betere ervaring kunnen leveren.</p>
<![endif]-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><img
                        src="/WEBS2-Eindopdracht/public/img/logo/CalveTella.png" height="100px" width="175px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}">Home</a></li>

                <li><a href="{{URL::to('product')}}">Shop</a></li>

                <li class="dropdown">
                    <?php use App\Http\Controllers\CategorieController;  $menu = CategorieController::index(); ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">TBD
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php $count = 1 ?>
                        <?php $subcount = 1 ?>
                            <?php count($menu) ?>
                            <?php  $head = 0 ?>
                        @foreach($menu as $m)
                            @if(($m->ctgSubOf == 0))
                                <li><a href="{{URL::to("categorie/$m->ctgId")}}">{{$m->ctgName}}</a></li>
                                <?php $count++; $head = $m->ctgId ?>
                            @elseif($m->ctgSubOf == $head)
                                <ul>
                                    <li><a href="{{URL::to("categorie/$m->ctgId")}}">{{$m->ctgName}}</a></li>
                                    @if($m->ctgSubOf == $menu[$m+1]->ctgSubOf)
                                    </ul>
                                    @endif
                            @endif

                            {{--@if($m->childof == $m->parentId)--}}
                                {{--<ul>--}}

                                {{--</ul>--}}
                            {{--@endif--}}

                        @endforeach
                    </ul>
                </li>

                <li><a href="{{URL::to('about')}}">About</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::user()) {{--working--}}
                <li><a class="login" href="{{URL::to('login')}}" role="button">Login</a></li>
                @else
                    <li class="logged_in_Name">Logged in as: <b>{{Auth::User()->username}}</b></li>

                    @if(Auth::User()->role_roleId == 1)
                        <li class="gotocms"><a href="{{URL::to('CMS')}}">CMS</a></li>
                    @endif
                    <li><a class="logout" href="{{URL::to('logout')}}" role="button">Log out</a></li>

                    <li><a class="cart" href="{{URL::to('cart')}}" role="button"><img
                                    src="/WEBS2-Eindopdracht/public/img/logo/cartIcon.png" height="20px" weight="20px"></a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav  id="menudiv" class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel"> 
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                        <a class="brand" href="#">
                            <img id="fixlogo" class="brand-logo-light" src="{{ asset('/dash/images/cios/logo_footer.png') }}" alt="" width="150" height="38"/>
                        </a>
                    </div>
                </div>
                <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">
                        <ul class="rd-navbar-nav">
                            @if(Auth::user()->rol == "partner")
                            <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/actualizar-resumen') }}">Resumen de Partners</a>
                            </li>
                            <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/post-news') }}">Publicar Noticias</a>
                            </li>
                            @elseif( Auth::user()->rol == "admin")
                            <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/post-news') }}">Administrar Usuarios</a>
                            </li>
                            @endif
                            <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                 Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(Auth::user()->rol == "partner")
                    <a class="button button-secondary button-sm" href="#"><img src="{{ Auth::user()->partner }}" alt="" width="250" /></a>
                @elseif( Auth::user()->rol == "admin")
                    <a class="button button-secondary button-sm" href="#">{{ Auth::user()->partner }}</a>
                @endif
                

                
            </div>
        </div>
        </nav>
    </div>
</header>


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
                    <a class="brand" href="/">
                        <img id="fixlogo" class="brand-logo-light" src="{{ asset('/dash/images/cios/logo_footer.png') }}" alt="" width="150" height="38"/>
                    </a>
                </div>
            </div>
            <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">
        
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="#">Partners</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/partners-resumen') }}">Resumen de Partners</a>
                        </li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/partners-registro') }}">Registro de Partners</a>
                        </li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/login') }}" target="_blank">Login</a>
                        </li>                        
                    </ul>

                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="#">Miembros</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/miembros-registro') }}">Registro de Miembros</a>
                        </li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/login') }}" target="_blank">Login</a>
                        </li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('/la-voz-de-nuestros-miembros') }}">La voz de nuestros Miembros</a>
                        </li>                        
                    </ul>
   
                    </li>
                    </li>
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="#">Eventos</a>
                    <ul class="rd-menu rd-navbar-megamenu">
                        <li class="rd-megamenu-item">
                        <h6 class="rd-megamenu-title"></h6>
                        <ul class="rd-megamenu-list">
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-vlog') }}">CIO’s Vlog</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-entre-amigos') }}">Programa “Entre Amigos”</a></li>
                        </ul>
                        </li>
                        <li class="rd-megamenu-item">
                        <h6 class="rd-megamenu-title"></h6>
                        <ul class="rd-megamenu-list">
                        <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-connect') }}">CIO’s Connect</a></li>
                        <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-mesa-de-debate') }}">Mesa de Debate</a></li>                        
                        </ul>
                        </li>
                        <li class="rd-megamenu-item">
                        <h6 class="rd-megamenu-title"></h6>
                        <ul class="rd-megamenu-list">
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-life') }}">CIO’s Life</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="{{ url('/cios-master-class') }}">CIO's Master Class</a></li>
                        </ul>
                        </li>
                    </ul>
                    </li>
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/noticias') }}">Noticias</a>
                    </li>
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/conocenos') }}">Conocenos</a>
                    </li>
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/comite-ejecutivo') }}">Comite ejecutivo</a>
                    </li>
                    <li class="rd-nav-item text-menu"><a class="rd-nav-link" href="{{ url('/contacto') }}">Contacto</a>
                    </li>
                </ul>

                </div>
            </div><span></span>
            </div>
        </div>
        </nav>
    </div>
</header>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5YSQ82VP1J"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5YSQ82VP1J');
</script>


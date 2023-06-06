<!-- Partner -->
@include('layouts.partner_slider')
<!-- End of Partner -->
<footer class="section footer-minimal context-dark">
<div class="container wow-outer">
    <div class="wow fadeIn">
    <div class="row row-50">
        <div class="col-12">
            <a class="brand" href="/"><img class="brand-logo-dark" src="{{ asset('/dash/images/cios/logo_footer.png') }}" alt="" width="150" height="38"/><img class="brand-logo-light" src="{{ asset('/dash/images/cios/logo_footer.png') }}" alt="" width="150" height="38"/></a>
        </div>
        <div class="col-12">
        <ul class="footer-minimal-nav">
            <li><a href="{{ url('/noticias') }}">Noticias</a></li>
            <li><a href="{{ url('/conocenos') }}">Conocenos</a></li>
            <li><a href="{{ url('/comite-ejecutivo') }}">Comite ejecutivo</a></li>
            <li><a href="{{ url('/contacto') }}">Contacto </a></li>
        </ul>
        </div>
        <div class="col-12">
        <ul class="social-list">            
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="https://www.facebook.com/CIOs-Mexicanos-and-Latam-103293739083234" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-linkedin" href="https://www.linkedin.com/company/cio-s-mexicanos/" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play" href="https://www.youtube.com/c/CIOsMexicanosLATAMTV" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="https://twitter.com/ciosmexoficial?lang=es" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-spotify" href="https://open.spotify.com/show/4lPhX5V3hBfH0sdOJjTkQS?si=e77f179810b444e0&nd=1" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-apple" href="https://podcasts.apple.com/mx/podcast/tecnologiando-con-cios-latam/id1646163844" target="_blank"></a></li>
            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-amazon" href="https://music.amazon.com.mx/podcasts/90dfc1f5-9351-47b8-a6db-8055ada4de5a/tecnologiando-con-CIO's-latam" target="_blank"></a></li>
        </ul>
        </div>
    </div>
    <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>CIO’s LATAM.</span><span>  Todos los derechos reservados.</span><span>&nbsp;</span><a href="{{ url('/aviso-de-privacidad') }}" target="_blank">&nbsp;AVISO DE PRIVACIDAD</a></p>
    </div>
</div>
</footer>
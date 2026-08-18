<style>
    .icon-sm {
        font-size: 22px !important;
    }
</style>

<section class="section-lg bg-gray-200 text-center partner-slider-section">
    <div class="container">
        <div class="wow-outer">
            <div class="wow slideInDown">
                <h3>Algunos de Nuestros Partners</h3>
            </div>
        </div>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-dots-secondary dots-offset-lg" data-items="1" data-sm-items="2" data-md-items="4" data-lg-items="6" data-autoplay="true" data-dots="true" data-dots-each="4" data-nav="false" data-stage-padding="10" data-loop="true" data-margin="15">

            @foreach($partner_slider as $partners)
            <a class="box-sponsor box-sponsor-modern wow-outer" href="{{ $partners['link'] }}" target="_blank">
                <div class="wow fadeInUp"> 
                    <img src="{{ $partners['imagen'] }}" alt="Partner Logo" class="partner-logo" /> 
                </div>
            </a>
            @endforeach

        </div>
    </div>
</section>

<style>
/* Corrección de alineación y altura unificada para Owl Carousel */
.partner-slider-section .owl-item {
    display: flex;
    justify-content: center;
    align-items: center;
}

.partner-slider-section .box-sponsor {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100px; /* Altura fija para que todos guarden la misma línea base */
    padding: 10px;
    box-sizing: border-box;
}

.partner-slider-section .box-sponsor .wow {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.partner-slider-section .partner-logo {
    max-width: 100%;
    max-height: 80px; /* Limita la altura máxima para que no rompan filas */
    width: auto;
    height: auto;
    object-fit: contain; /* Evita que la imagen se deforme */
}

/* Estilos de los puntos de navegación */
.partner-slider-section .owl-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 18px;
}

.partner-slider-section .owl-dot { 
    width: 10px; 
    height: 10px; 
    border-radius: 50%; 
    background: #e6e6e6; 
    opacity: 1;
    border: none;
    outline: none;
    cursor: pointer;
}

.partner-slider-section .owl-dot.active { 
    background: #6e9380; 
}

@media (max-width: 420px) {
    .partner-slider-section .owl-dots {
        display: none;
    }
}
</style>
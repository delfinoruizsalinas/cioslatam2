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
        <div class="owl-carousel owl-dots-secondary dots-offset-lg" data-items="1" data-sm-items="2" data-md-items="4" data-lg-items="6" data-autoplay="true" data-dots="true" data-nav="false" data-stage-padding="10" data-loop="true" data-margin="10">

            @foreach($partner_slider as $partners)
            
            <a class="box-sponsor box-sponsor-modern wow-outer" href="{{ $partners['link'] }}" target="_blank">
                <div class="wow fadeInUp"> <img src="{{ $partners['imagen'] }}" alt="" class="partner-logo" /> </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<style>
.partner-slider-section .owl-item {
    display: flex;
    justify-content: center;
}
.partner-slider-section .box-sponsor {
    width: 100%;
    max-width: 220px;
}
.partner-slider-section .box-sponsor .wow {
    display: flex;
    justify-content: center;
    align-items: center;
}
.partner-slider-section .partner-logo {
    max-width: 100%;
    max-height: 120px;
    height: auto;
    width: auto;
}
</style>
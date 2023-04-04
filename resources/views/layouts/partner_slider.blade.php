<style>
    .icon-sm {
        font-size: 22px !important;
    }
</style>
<section class="section-lg bg-gray-200 text-center">
    <div class="container">
        <div class="wow-outer">
        <div class="wow slideInDown">
            <h3>Algunos de Nuestros Partners</h3>
        </div>
        </div>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-dots-secondary dots-offset-lg" data-items="3" data-autoplay="true" data-dots="true" data-nav="false" data-stage-padding="10" data-loop="true" data-margin="10">

            @foreach($partner_slider as $partners)
            <a class="box-sponsor box-sponsor-modern wow-outer" href="{{ $partners['link'] }}" target="_blank">
                <div class="wow fadeInUp" data-interval="2000"> <img src="{{ $partners['imagen'] }}" alt="" style="height: 121px;" /> </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
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
        <div id="owl-partners" class="owl-carousel owl-dots-secondary dots-offset-lg" data-items="3" data-autoplay="true" data-dots="false" data-nav="false" data-stage-padding="10" data-loop="true" data-margin="10" >

            @foreach($partner_slider as $partners)
            <a class="box-sponsor box-sponsor-modern wow-outer" href="{{ $partners['link'] }}" target="_blank">
                <div class="wow fadeInUp"> <img src="{{ $partners['imagen'] }}" alt="" style="height: 121px;" /> </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        let owl = $(".owl-carousel").owlCarousel({
            autoplay: false,
            autoplayTimeout: 2000,
            dots: true,
            dotsData:true,
            loop: true,
            margin: 30,
            nav: false,
            center: false,
            items: 1
        });

        $('.owl-dot').click(function() {
            $('.owl-dot').trigger('to.owl.carousel', [$(this).index(), 1000]);
        });
    });        
</script>
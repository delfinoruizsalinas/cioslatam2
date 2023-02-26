<?php 
$url_site = 'http://188.166.16.108:1337';
?>

<!-- NOTICIAS-->
<section class="section-lg bg-default">
  <div class="container wow-outer">
    <h3 class="text-center wow slideInDown">Noticias</h3>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-dots-dark wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
    <?php 
        //url api eventos-virtuales                                                                           
        $json = file_get_contents($url_site.'/api/events?populate=imagen');
        //echo $url_site.'/api/events?populate=imagen';
        // Decode the JSON string into an object
        $obj = json_decode($json);
        // In the case of this input, do key and array lookups to get the values
        foreach ($obj->data as $key => $value) {
          
            foreach($value->attributes->imagen as $item){
              $url = $item[0]->attributes->formats->small->url;
              //print_r($url_site.$item[0]->attributes->formats->small->url);
            }
            //comite-ejecutivo-biografia.php?id='.$value->id.'
            echo '
              <div class="post-corporate post-corporate-img-bg" style="height: 360.76px;">
                <div class="post-corporate-bg" style="background-image: url('.$url.'); background-size: cover;"></div><a class="badge post-corporate-badge" href="#"></a>
                <h4 class="post-corporate-title"><a href="noticias-detalle.php?id='.$value->id.'&evento=noticia">'.$value->attributes->titulo.'</a></h4>
                <div class="post-corporate-text">
                </div><a class="post-corporate-link" href="noticias-detalle.php?id='.$value->id.'&evento=noticia">Leer mas<span class="icon linearicons-arrow-right"></span></a>
              </div>
            ';
          
        }        
    ?>
    </div>
  </div>
</section>
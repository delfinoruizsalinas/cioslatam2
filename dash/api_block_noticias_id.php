<?php 
    $idbiog = $_GET["id"];
    $evento = $_GET["evento"];
    $url = 'http://188.166.16.108:1337';

    if($evento == "noticia"){  //url api eventos-presenciales
      //url api eventos-virtuales                                                                           
      $json = file_get_contents($url.'/api/events/'.$idbiog.'?populate=imagen');
      // Decode the JSON string into an object
      $obj = json_decode($json);
      //foreach($value->attributes->imagen as $item){
       $url = $obj->data->attributes->imagen->data[0]->attributes->formats->small->url;
      //  echo $url;
      //}

      echo '<section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50 justify-content-lg-between">
            <div class="col-lg-6">
              <ul class="blog-post-meta">
              </ul>
              <h3 class="blog-post-title">'.$obj->data->attributes->titulo.'</h3>
              <div class="blog-post-content">'.$obj->data->attributes->descripcion.'</div>
            </div>
            <div class="col-lg-6 col-xl-5"><img src="'.$url.'" alt="" width="518" height="569"/>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="blog-post-share text-lg-right">
                <ul class="list-inline">
                  <li class="thin-title">COMPARTIR</li>          
                  <div class="fb-share-button" data-href="http://188.166.16.108/noticias-detalle.php?id='.$idbiog.'&evento=noticia" data-layout="button_count">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>';
    }
?>
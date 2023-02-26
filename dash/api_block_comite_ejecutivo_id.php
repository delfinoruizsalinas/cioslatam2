<?php 
    $idbiog = $_GET["id"];
      //url api eventos-virtuales                                                                           
      $json = file_get_contents('http://188.166.16.108:1337/api/biografias/'.$idbiog.'?populate=imagen');
      // Decode the JSON string into an object
      $obj = json_decode($json);
      // In the case of this input, do key and array lookups to get the values
          $url = 'http://188.166.16.108:1337';
          //echo $obj->data->attributes->imagen->data->attributes->formats->thumbnail->url;

          echo '<section class="section section-lg bg-default">
          <div class="container">
              <div class="row row-50">
              <div class="col-lg-6">
                  <div class="team-item-info">
                  <div class="team-item-info-name">
                      <h3>'.$obj->data->attributes->titulo.'</h3>
                      <p class="team-item-info-name-text">'.$obj->data->attributes->cargo.'</p>
                  </div>
                  <ul class="team-info-list">
                      <li class="d-sm-block">
                      <ul class="social-list">
                          <li><a class="icon icon-sm fa-linkedin" href="'.$obj->data->attributes->linkdn.'" target="_blank"></a></li>
                          <li><a class="icon icon-sm fa-twitter" href="'.$obj->data->attributes->twt.'" target="_blank"></a></li>
                      </ul>
                      </li>
                  </ul>
                  
                  <article class="quote-primary">
                      <div class="quote-primary-body">
                      <div class="quote-primary-text">
                          <p class="q">'.$obj->data->attributes->resumen.'</p>
                      </div>
                      </div>
                      <div class="quote-primary-footer">
                      <div class="bg-dot"></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="block-decorate-img">
                  <div class="block-decorate-inner"><img src="'.$obj->data->attributes->imagen->data->attributes->url.'" alt="" width="440" height="462"/>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          </section>';
     // }           



?>
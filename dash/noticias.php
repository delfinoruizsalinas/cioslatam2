<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5YSQ82VP1J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-5YSQ82VP1J');
    </script>
    <title>CIO's Latam - Noticias</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/cios/logo_icono.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CRoboto:400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(images/cios/pexels-helena-lopes-705792-mobile.jpg) !important;
            background-attachment: unset;
        }
        .event-item-classic{
          flex-direction: row-reverse !important;
        }
    }
    .icono_evento{
          bottom: 20px;
          width: 60px;
          left: 20px;
          position: absolute;
          transition: .5s ease;
        }

        .post-modern-caption {
    padding: 25px;
    background: #ffffff;
    height: 650px;
        }
        a[href*='tel'], a[href*='mailto'] {
    white-space: normal;
}
    </style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <?php include 'header.php' ?>
      <!-- Swiper-->
      <section class="parallax-container" id="portada" data-parallax-img="images/cios/pexels-helena-lopes-705792.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Noticias</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.php">Inicio</a></li>
                  <li class="active">Noticias</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- api eventos master class -->   




<!-- EVENTOS ENTRE AMIGOS-->


      <section class="section section-lg bg-gray-600">
        <div class="container">
          <div  id="feed" class="row row-50">
          
          </div>
        </div>
      </section>

      <!-- api partners -->   

      <?php
        include('api_block_partners.php');
      ?>


      <!-- Page Footer-->
      <?php include 'footer.php' ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

    <script>
      (function(){
      //var url = "https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/section/tecnologia/portada";
      var url = "https://expansion.mx/rss/tecnologia";
      
      var xhr = createCORSRequest("GET","https://api.rss2json.com/v1/api.json?rss_url="+url);
      if (!xhr) {
        throw new Error('CORS not supported');
      } else {
        xhr.send();
      }
      xhr.onreadystatechange = function() {
        if (xhr.readyState==4 && xhr.status==200) {
        var responseText = xhr.responseText; 
        var result = JSON.parse(responseText);
        var container = document.getElementById("feed"), entry = result.items, date;
        for(var i = 0; i < entry.length; i++){
          dv = document.createElement("div");
          dv.className = "col-md-6 col-lg-4 wow-outer";
          date = new Date(entry[i].pubDate);
          // entry[i].enclosure.link
          //console.log(entry[i]);
          var url_image ="";
          if(entry[i].thumbnail ==""){
            url_image = entry[i].enclosure.link;
          }else{
            url_image = entry[i].thumbnail;
          }
          
          console.log(url_image);
          
          dv.innerHTML = '<div class="wow fadeInUp"><div class="post-modern"><div class="post-modern-caption"><p class="post-modern-date">' + date.toDateString().substr(4) + '</p><h4 class="post-modern-title" style="color:rgb(8, 71, 90);"><a href="' + entry[i].link + '" target="_blank">' + entry[i].title  + '...</h4><img src="'+url_image+'" alt="" width="370" height="255" /></a><div class="post-modern-text"><p>' + entry[i].content.substring(0,294) + '...</p></div></div></div></div>';
          
          //dv.innerHTML = '<a href="' + entry[i].link + '" target="_blank">' + entry[i].title + '</a><br/>' + date.toDateString().substr(4) + '<br/><div class="article">' + entry[i].content.substring(0,600) + '...</div>';
          //dv.innerHTML += '<hr/>';
          container.appendChild(dv);
        }
        }
      }
      })();
      function createCORSRequest(method, url) {
          var xhr = new XMLHttpRequest();
          if ("withCredentials" in xhr) {
              xhr.open(method, url, true);
          } else if (typeof XDomainRequest != "undefined") {
              xhr = new XDomainRequest();
              xhr.open(method, url);
          } else {
              xhr = null;
          }
          return xhr;
      }
    </script>

</body>
</html>
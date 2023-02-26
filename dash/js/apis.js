
ip_api ='http://188.166.16.108:1337';
link = "";
url = "";
fecha = "";
hora = "";
titulo = "";
youtube = "";

//api para partners
function getPartners(){

    $.getJSON(ip_api+'/api/partners?populate=imagen', function(data) {

        Object.entries(data.data).forEach(([key, value]) => {
            
            if(value.attributes.link_pange == null){
                link = '#';
            }else{
                link = value.attributes.link_pange;                        
            }
            
            if(value.attributes.imagen.data.attributes.formats === null){
                url = value.attributes.imagen.data.attributes.url;
            }else{
                url = value.attributes.imagen.data.attributes.formats.thumbnail.url;
            }
    
            var text = `<div class="col-sm-6 col-lg-3"><a class="box-sponsor wow fadeInUp" target="_blank" href="${link}" data-wow-delay="1.${key}s"><img src="${ip_api+url}" alt="" width="120" height="119"/></a></div>`;
            $("#partners").append(text);
        });
    });
}

//api para front
function getVlog(){
    $.getJSON(ip_api+'/api/evento-virtuals?populate=imagen_front', function(data) {

        Object.entries(data.data).forEach(([key, value]) => {
            if(key<=2){
                fecha = value.attributes.fecha;
                titulo = value.attributes.titulo;
                youtube = value.attributes.youtube;
                hora = value.attributes.hora.substring(5,-1);
                
                if(value.attributes.link_pange == null){
                    link = '#';
                }else{
                    link = value.attributes.link_pange;                        
                }
                
                if(value.attributes.imagen_front.data.attributes.formats === null){
                    url = value.attributes.imagen_front.data.attributes.url;
                }else{
                    url = value.attributes.imagen_front.data.attributes.formats.thumbnail.url;
                }                
                //console.log(key);
                var text = `<div class="col-md-6 col-lg-4"><div class="post-modern"><div class="post-modern-figure"><a href="${youtube}" target="_blank"><img src="${ip_api+url}" alt="" width="370" height="255"></a><a class="badge-primary badge" href="#">CIOsVlog</a></div><div class="post-modern-caption"><p class="post-modern-date">${fecha + ' ' + hora}</p><h4 class="post-modern-title"><a href="${youtube}" target="_blank">${titulo}.</a></h4></div></div></div>`;
            }
            $("#ciosvlog").append(text);
        });
    });

    $.getJSON(ip_api+'/api/events?populate=imagen', function(data) {

        Object.entries(data.data).forEach(([key, value]) => {
            if(key<=2){

                titulo = value.attributes.titulo;
                link = value.attributes.link;
                                
                if(value.attributes.imagen.data[0].attributes.formats === null){
                    url = value.attributes.imagen.data.attributes.url;
                }else{
                    url = value.attributes.imagen.data[0].attributes.formats.thumbnail.url;
                }               
                var text = `<div class="col-md-6 col-lg-4"><div class="post-modern post-modern-reverse"><div class="post-modern-figure"><a href="${link}" target="_blank"><img src="${ip_api+url}" alt="" width="370" height="255"></a><a class="badge-secondary badge" href="#">Noticias</a></div><div class="post-modern-caption"><h4 class="post-modern-title"><a href="${link}" target="_blank">${titulo}.</a></h4></div></div></div>`;
            }
            $("#ciosvlog").append(text);
        });

    });

   
    
}
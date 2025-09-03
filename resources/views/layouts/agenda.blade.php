<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
  <title>{{  $title }}</title>

  <!-- facebook-->
  <meta property="og:title" content="{{  $title }}"/>
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta name="keywords" content="{{  $title }}"/>
  <meta property="og:image" content="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta property="og:image:url" content="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />

  <link rel="apple-touch-icon" href="https://cioslatam.com/dash/images/cios/trd1h_.jpeg">
  <meta name="apple-mobile-web-app-title" content="{{ $title }}">


    @include('layouts.css')
    <style>
      @media (max-width: 400px) {
        #portada {
            background-image: url(/dash/images/cios/trd1h_.jpeg) !important;
            background-size: cover;
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
    .fs-2{
      font-size: 2rem !important;
    }
    .bi-green{
      width: 3em;
      height: 3em;
      color: #007bff!important;
    }
    .bi-red{
      width: 3em;
      height: 3em;
      color: #dc3545!important;
    }
    

    /* layout */
.mesa-wrapper { max-width: 560px; margin: 0 auto; }
.mesa-title { font-size: 1.25rem; letter-spacing: .2px; }

/* formulario */
.mesa-form { max-width: 560px; margin: 0 auto; }
.mesa-input {
  height: 48px;
  border-radius: 12px;
  border: 1px solid #e5e7eb; /* gris claro */
  box-shadow: none !important;
}
.mesa-input:focus {
  border-color: #80bdff; outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0,123,255,.1);
}
.mesa-btn {
  min-width: 120px;
  border-radius: 999px;
  padding: .5rem 1.25rem;
}

/* mensajes */
#mesa-msg .alert {
  border-radius: 10px;
  border: 1px solid #e5e7eb;
  padding: .6rem .9rem;
  display: inline-block;
  margin: .75rem auto 0;
}

/* tarjeta resultado (minimal) */
.card-mesa {
  border: 1px solid #e5e7eb;
  border-radius: 14px;
  box-shadow: none;
  margin-top: 1rem;
}
.card-mesa .card-body { padding: 1rem 1rem; }
.card-mesa .mesa-id {
  font-size: .85rem; color: #6b7280; /* gris medio */
  margin-bottom: .25rem;
}
.card-mesa .mesa-id strong { color: #111827; }

.mesa-list {
  list-style: none;
  padding-left: 0;
  margin: 0;
  text-align: center; /* centra el contenido */
}
.mesa-list li {
  padding: .5rem 0;
  font-weight: 600;   /* negrita */
  font-size: 1rem;
}

/* responsive tweaks */
@media (max-width: 480px) {
  .mesa-input { height: 44px; }
  .mesa-btn { width: 100%; }
}

/* Ajusta el ancho del recuadro blanco */
#tabs-1-5 .event-item-classic {
  max-width: 700px;   /* más ancho que los demás */
  margin: 0 auto;     /* centra horizontalmente */
  padding: 2rem 1.5rem;
}

/* Centrar internamente el caption */
#tabs-1-5 .event-item-classic-caption {
  text-align: center;
  width: 100%;
}

/* Opcional: darle un fondo más blanco al recuadro (si se ve gris) */
#tabs-1-5 .event-item-classic {
  background: #fff;
  border-radius: 12px;
}


.mesa-list {
  list-style: none;
  padding-left: 0;
  margin: 0;
  text-align: center; /* centra el contenido */
}
.mesa-list li {
  padding: .5rem 0;
  font-weight: normal;  /* texto normal, no bold */
  font-size: 1rem;
}


    </style>
  </head>
  <body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="dash/images/cios/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      @include('layouts.header')
      <section id="portada">
        <div class="parallax-content context-dark"> 
          
            <img src="/dash/images/cios/trd1h_.jpeg" alt="CIO's LATAM Technology Retreat 2024 Hotel Las Brisas" class="img-fluid w-100">

        </div>
      </section>
      <section class="section-lg section bg-gray-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center wow-outer">
              <div class="wow slideInLeft">
                <h3 class="title-decorate title-decorate-center">Agenda <br>CIO’s LATAM Technology Retreat 2025 <br></h3>
                <p>Huatulco</p>
              </div>
            </div>
          </div>
          <div class="tabs-custom tabs-horizontal tabs-modern" id="tabs-1">
            <div class="row no-gutters">
              <div class="col-lg-4 col-xl-3 order-lg-2 wow-outer">
                <div class="wow slideInRight">
                  <ul class="nav nav-tabs nav-tabs-modern">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">4 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">5 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">6 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">7 Septiembre</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-toggle="tab">Ubica tu mesa</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-6" data-toggle="tab">Reserva tu Canción</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-7" data-toggle="tab">Encuestas Partners</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-8" data-toggle="tab">Encuesta Final</a></li>                    
                  </ul>
                </div>
              </div>
              <div class="col-lg-8 col-xl-9 order-lg-1 wow-outer">
                <div class="wow slideInLeft">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-1-1">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep7) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-2">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep8) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-3">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep9) !!}  

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-1-4">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          
                          {!! html_entity_decode($sep10) !!}  

                        </div>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="tabs-1-5">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">

                          <div class="mesa-wrapper d-flex flex-column align-items-center justify-content-start py-3">

                            <h4 class="mb-3 text-center font-weight-semibold mesa-title">Ubica tu mesa</h4>

                            <form id="form-ubica-mesa"
                          class="w-100 mesa-form"
                          method="post"
                          action="{{ route('mesa.buscar') }}"
                          data-action="{{ route('mesa.buscar') }}">
                      @csrf
                      <div class="form-group mb-2">
                        <label for="folio" class="sr-only">Ingresa tu ID</label>
                        <input
                          type="text"
                          id="folio"
                          name="folio"
                          class="form-control text-center mesa-input"
                          placeholder="Ej. ID-CTR00"
                          required
                        >
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary mesa-btn" id="btn-buscar-mesa">
                          Buscar
                        </button>
                      </div>
                    </form>


                            {{-- Mensajes / Resultado (centrados y dentro del área blanca) --}}
                            <div id="mesa-msg" class="w-100 text-center" style="max-width:560px;"></div>
                            <div id="mesa-result" class="w-100" style="max-width:560px;"></div>

                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="tab-pane fade" id="tabs-1-6">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title">
                            <a href="{{ $booking_url ? url($booking_url) : '#' }}" target="_blank">
                              {{ $booking_title }}
                            </a>
                          </h4>
                        </div>
                      </div>
                    </div>


                   <div class="tab-pane fade" id="tabs-1-7">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          @if(!empty($partners))
                            @foreach($partners as $p)
                              @php
                                $t = $p['Titulo'] ?? 'ENCUESTA';
                                $u = $p['Url']    ?? '#';
                              @endphp
                              <h4 class="event-item-classic-title">
                                <a href="{{ $u ? url($u) : '#' }}" target="_blank">{{ $t }}</a>
                              </h4>
                            @endforeach
                          @else
                            <p class="text-muted mb-0">No hay encuestas disponibles por el momento.</p>
                          @endif
                        </div>
                      </div>
                    </div>


                    <div class="tab-pane fade" id="tabs-1-8">
                      <div class="event-item-classic">
                        <div class="event-item-classic-caption">
                          <h4 class="event-item-classic-title">
                            <a href="{{ $encuesta_url ? url($encuesta_url) : '#' }}" target="_blank">
                              {{ $encuesta_title }}
                            </a>
                          </h4>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Sidebar -->
      @include('layouts.footer')
      <!-- End of Sidebar -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    @extends('layouts.js')
    {{-- Script AJAX (usa Fetch nativo) --}}
<script>
(function () {
  function setMsg(html, cls = 'alert-info') {
    const msgBox = document.getElementById('mesa-msg');
    msgBox.classList.add('text-center');
    msgBox.innerHTML = html ? `<div class="alert ${cls}" role="alert">${html}</div>` : '';
  }

  function setResultHTML(result) {
    const resBox = document.getElementById('mesa-result');
    if (!result) { resBox.innerHTML = ''; return; }

    const idInv  = result.idInvitado || '';
    const nombre = result.nombreInvitado || null;

    // agendaInvitado: [{ id, mesa: "Cena - ... Mesa X" }, ...]
    const agenda = Array.isArray(result.agendaInvitado) ? result.agendaInvitado : [];

const items = agenda.length > 0
  ? `<ul class="mesa-list text-center">
      ${agenda.map(it => {
        const textoMesa = (it && typeof it.mesa === 'string' && it.mesa.trim())
          ? it.mesa.trim()
          : null;
        return textoMesa
          ? `<li>${textoMesa}</li>`
          : '';
      }).join('')}
    </ul>`
  : `<p class="mb-0 text-muted">Sin agenda registrada.</p>`;


    resBox.innerHTML = `
      <div class="card card-mesa mx-auto">
        <div class="card-body">
          ${ idInv ? `<div class="mesa-id">ID: <strong>${idInv}</strong></div>` : '' }
          ${ nombre ? `<div class="mb-3">Nombre: <strong>${nombre}</strong></div>` : '' }
          ${items}
        </div>
      </div>
    `;
  }

  const form = document.getElementById('form-ubica-mesa');
  if (!form) return;

  const btn    = document.getElementById('btn-buscar-mesa');
  const resBox = document.getElementById('mesa-result');
  const msgBox = document.getElementById('mesa-msg');

  form.addEventListener('submit', async function (e) {
    e.preventDefault(); // sin recarga
    msgBox.innerHTML = '';
    resBox.innerHTML = '';

    const folio = (document.getElementById('folio').value || '').trim();
    if (!folio) { setMsg('Por favor ingresa tu ID.', 'alert-danger'); return; }

    // Toma URL de data-action o, de respaldo, de action
    const url = form.dataset.action || form.action;
    if (!url) { setMsg('No se configuró la URL de búsqueda.', 'alert-danger'); return; }

    btn.disabled = true;
    btn.textContent = 'Buscando...';

    try {
      const resp = await fetch(url, {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ folio })
      });

      const data = await resp.json().catch(() => ({}));

      if (!resp.ok || data.ok === false) {
        setMsg(data?.message || 'Error al consultar.', 'alert-danger');
        return;
      }
      if (data.found === false) {
        setMsg('No encontramos información para ese ID.', 'alert-warning');
        return;
      }

      setMsg('Resultado encontrado ✅', 'alert-success');
      setResultHTML(data.result);
    } catch (err) {
      setMsg('Error de red o servidor. Intenta de nuevo.', 'alert-danger');
    } finally {
      btn.disabled = false;
      btn.textContent = 'Buscar';
    }
  });
})();
</script>

  </body>
</html>
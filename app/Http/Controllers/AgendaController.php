<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgendaController extends Controller
{
    public function index(){
        $title = "Agenda Technology Retreat 2025 huatulco";

        // Traemos también ELIGETUCANCION, ENCUESTASPARTNERS y ENCUESTATECHNOLOGYRETREAT
        $json = file_get_contents('http://188.166.16.108:1337/api/technology-retreat-2023s?populate=MESA_DIA_7&populate=MESA_DIA_8&populate=MESA_DIA_9&populate=MESA_DIA_10&populate=ELIGETUCANCION&populate=ENCUESTASPARTNERS&populate=ENCUESTATECHNOLOGYRETREAT');
        $obj  = json_decode($json);

        if (!isset($obj->data) || !is_array($obj->data) || count($obj->data) === 0) {
            return view('layouts.agenda_offline', compact('title'));
        }

        // Tomamos el primer registro (según tu ejemplo solo viene 1)
        $value = $obj->data[0];

        // ====== Días (HTML ya listo para render) ======
        $sep7  = $value->attributes->SEP7  ?? '';
        $sep8  = $value->attributes->SEP8  ?? '';
        $sep9  = $value->attributes->SEP9  ?? '';
        $sep10 = $value->attributes->SEP10 ?? '';

        // ====== MESA_DIA_7 (NO mover) ======
        if (empty($value->attributes->MESA_DIA_7->data->attributes->url ?? '')) {
            $dia7_name  = 'DÍA 4';
            $dia7_file  = '#';
            $dia7_clase = 'bi-red';
        } else {
            $dia7_name  = $value->attributes->MESA_DIA_7->data->attributes->name ?? 'MESA DÍA 4';
            $dia7_file  = $value->attributes->MESA_DIA_7->data->attributes->url  ?? '#';
            $dia7_clase = 'bi-green';
        }

        // ====== MESA_DIA_8 ======
        if (empty($value->attributes->MESA_DIA_8->data->attributes->url ?? '')) {
            $dia8_name  = 'DÍA 5';
            $dia8_file  = '#';
            $dia8_clase = 'bi-red';
        } else {
            $dia8_name  = $value->attributes->MESA_DIA_8->data->attributes->name ?? 'MESA DÍA 5';
            $dia8_file  = $value->attributes->MESA_DIA_8->data->attributes->url  ?? '#';
            $dia8_clase = 'bi-green';
        }

        // ====== MESA_DIA_9 ======
        if (empty($value->attributes->MESA_DIA_9->data->attributes->url ?? '')) {
            $dia9_name  = 'DÍA 6';
            $dia9_file  = '#';
            $dia9_clase = 'bi-red';
        } else {
            $dia9_name  = $value->attributes->MESA_DIA_9->data->attributes->name ?? 'MESA DÍA 6';
            $dia9_file  = $value->attributes->MESA_DIA_9->data->attributes->url  ?? '#';
            $dia9_clase = 'bi-green';
        }

        // ====== MESA_DIA_10 (corrección: antes leías MESA_DIA_9 por error) ======
        if (empty($value->attributes->MESA_DIA_10->data->attributes->url ?? '')) {
            $dia10_name  = 'DÍA 7';
            $dia10_file  = '#';
            $dia10_clase = 'bi-red';
        } else {
            $dia10_name  = $value->attributes->MESA_DIA_10->data->attributes->name ?? 'MESA DÍA 7';
            $dia10_file  = $value->attributes->MESA_DIA_10->data->attributes->url  ?? '#';
            $dia10_clase = 'bi-green';
        }

        // ====== ELIGETUCANCION -> booking ======
        $booking_title = $value->attributes->ELIGETUCANCION->Titulo ?? 'ELIGE TU CANCIÓN';
        $booking_url   = $value->attributes->ELIGETUCANCION->Url    ?? '#';

        // ====== ENCUESTATECHNOLOGYRETREAT -> encuesta final ======
        $encuesta_title = $value->attributes->ENCUESTATECHNOLOGYRETREAT->Titulo ?? 'ENCUESTA TECHNOLOGY RETREAT 2025';
        $encuesta_url   = $value->attributes->ENCUESTATECHNOLOGYRETREAT->Url    ?? '#';

        // ====== ENCUESTASPARTNERS dinámico (Título/Url) ======
        $partners_raw = $value->attributes->ENCUESTASPARTNERS ?? [];
        $partners = [];
        if (is_array($partners_raw)) {
            foreach ($partners_raw as $p) {
                $partners[] = [
                    'Titulo' => $p->Titulo ?? 'ENCUESTA',
                    'Url'    => $p->Url    ?? '#',
                ];
            }
        }

        // Render
        return view('layouts.agenda', compact(
            'title',
            'sep7','sep8','sep9','sep10',
            'dia7_file','dia7_name','dia7_clase',
            'dia8_file','dia8_name','dia8_clase',
            'dia9_file','dia9_name','dia9_clase',
            'dia10_file','dia10_name','dia10_clase',
            'booking_title','booking_url',
            'encuesta_title','encuesta_url',
            'partners'
        ));
    }

    /* POST /mesa/buscar (AJAX) — SIN CAMBIOS */
    public function buscar(Request $request)
    {
        $folio = trim((string) $request->input('folio', ''));

        if ($folio === '') {
            return response()->json([
                'ok'      => false,
                'message' => 'Por favor ingresa tu ID.',
            ], 422);
        }

        $api = 'http://188.166.16.108:1337/api/technology-retreat-cenas';

        try {
            $response = Http::timeout(10)
                ->acceptJson()
                ->get($api, [
                    'filters[idInvitado][$eq]' => $folio,
                    'populate[agendaInvitado]' => '*',
                ]);

            if (!$response->ok()) {
                return response()->json([
                    'ok'      => false,
                    'message' => 'Servicio no disponible (Strapi).',
                    'status'  => $response->status(),
                ], 502);
            }

            $payload = $response->json();
            $data    = $payload['data'] ?? [];

            if (empty($data)) {
                return response()->json([
                    'ok'     => true,
                    'found'  => false,
                    'result' => null,
                ]);
            }

            $item = $data[0] ?? null;
            if (!$item || empty($item['attributes'])) {
                return response()->json([
                    'ok'     => true,
                    'found'  => false,
                    'result' => null,
                ]);
            }

            $attr   = $item['attributes'] ?? [];
            $agenda = $attr['agendaInvitado'] ?? [];
            if (!is_array($agenda)) $agenda = [];

            $result = [
                'idInvitado'     => $attr['idInvitado']     ?? $folio,
                'nombreInvitado' => $attr['nombreInvitado'] ?? null,
                'agendaInvitado' => $agenda,
            ];

            return response()->json([
                'ok'     => true,
                'found'  => true,
                'result' => $result,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'ok'      => false,
                'message' => 'Error al consultar.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}

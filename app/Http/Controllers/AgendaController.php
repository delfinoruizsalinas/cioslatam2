<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgendaController extends Controller
{
    public function index(){
        // ... TU CÓDIGO ORIGINAL SIN CAMBIOS ...
        $title = "Agenda Technology Retreat 2025 huatulco";

        $json = file_get_contents('http://188.166.16.108:1337/api/technology-retreat-2023s?populate=MESA_DIA_7&populate=MESA_DIA_8&populate=MESA_DIA_9');
        $obj = json_decode($json);

        if(count($obj->data) > 0){
            foreach ($obj->data as $key => $value) {
                $sep7 = $value->attributes->SEP7 ?? '';
                $sep8 = $value->attributes->SEP8 ?? '';
                $sep9 = $value->attributes->SEP9 ?? '';
                $sep10 = $value->attributes->SEP10 ?? '';

                if(empty($value->attributes->MESA_DIA_7->data->attributes->url)){
                    $dia7_name = 'DÍA 5';
                    $dia7_file = '#';
                    $dia7_clase = 'bi-red';
                }else{
                    $dia7_name = $value->attributes->MESA_DIA_7->data->attributes->name;
                    $dia7_file = $value->attributes->MESA_DIA_7->data->attributes->url;
                    $dia7_clase = 'bi-green';
                }

                if(empty($value->attributes->MESA_DIA_8->data->attributes->url)){
                    $dia8_name = 'DÍA 6';
                    $dia8_file = '#';
                    $dia8_clase = 'bi-red';
                }else{
                    $dia8_name = $value->attributes->MESA_DIA_8->data->attributes->name;
                    $dia8_file = $value->attributes->MESA_DIA_8->data->attributes->url;
                    $dia8_clase = 'bi-green';
                }

                if(empty($value->attributes->MESA_DIA_9->data->attributes->url)){
                    $dia9_name = 'DÍA 7';
                    $dia9_file = '#';
                    $dia9_clase = 'bi-red';
                }else{
                    $dia9_name = $value->attributes->MESA_DIA_9->data->attributes->name;
                    $dia9_file = $value->attributes->MESA_DIA_9->data->attributes->url;
                    $dia9_clase = 'bi-green';
                }

                $encuesta       = $value->attributes->ENCUESTA ?? '';
                $booking        = $value->attributes->BOOKING ?? '';
                $BePrime        = $value->attributes->BePrime ?? '';
                $Syniti         = $value->attributes->Syniti ?? '';
                $RakenDataGroup = $value->attributes->RakenDataGroup ?? '';
                $Nutanix        = $value->attributes->Nutanix ?? '';
                $Appsell        = $value->attributes->Appsell ?? '';
                $C3ntroTelecom  = $value->attributes->C3ntroTelecom ?? '';
                $Equinix        = $value->attributes->Equinix ?? '';
                $Linko          = $value->attributes->Linko ?? '';
                $NETjer         = $value->attributes->NETjer ?? '';
                $Digital        = $value->attributes->Digital ?? '';
            }

            return view('layouts.agenda', compact(
                'title','sep7','sep8','sep9','sep10',
                'dia7_file','dia7_name','dia8_file','dia8_name','dia9_file','dia9_name',
                'dia7_clase','dia8_clase','dia9_clase',
                'encuesta','booking','BePrime','Syniti','RakenDataGroup','Nutanix',
                'Appsell','C3ntroTelecom','Equinix','Linko','NETjer','Digital'
            ));
        } else {
            return view('layouts.agenda_offline', compact('title'));
        }
    }


     /* POST /mesa/buscar (AJAX)
     */
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

            $attr = $item['attributes'] ?? [];

            // agendaInvitado ya llega como arreglo de objetos con { id, mesa }
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

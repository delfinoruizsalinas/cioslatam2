<?php
// Configuración
$rss_url = "https://expansion.mx/rss/tecnologia";
$output_file = "/var/www/html/cioslatam2/public/apiNoticias.json";

try {
    // Usamos cURL para simular un navegador y evitar bloqueos
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $rss_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    $xml_raw = curl_exec($ch);
    curl_close($ch);

    if (!$xml_raw) throw new Exception("No se pudo obtener el RSS");

    $xml = simplexml_load_string($xml_raw, 'SimpleXMLElement', LIBXML_NOCDATA);
    $noticias = [];

    foreach ($xml->channel->item as $item) {
        if (count($noticias) >= 9) break;

        // Extraer imagen de media:content o enclosure
        $ns = $item->getNameSpaces(true);
        $media = $item->children($ns['media'] ?? null);
        $img = "";
        
        if (isset($media->content)) {
            $img = (string)$media->content->attributes()->url;
        } elseif (isset($item->enclosure)) {
            $img = (string)$item->enclosure->attributes()->url;
        }

        $noticias[] = [
            'titulo' => (string)$item->title,
            'link' => (string)$item->link,
            'description' => strip_tags((string)$item->description),
            'img' => $img,
            'fecha' => date('d-m-Y H:i', strtotime((string)$item->pubDate)),
            'content' => (string)$item->description
        ];
    }

// ESTA ES LA PARTE QUE DEBES CAMBIAR:
$finalStructure = [
    "status" => "ok",
    "feed" => [
        "url" => $rss_url,
        "title" => (string)$xml->channel->title,
        "link" => (string)$xml->channel->link,
        "description" => (string)$xml->channel->description,
    ],
    "items" => $noticias // Aquí metemos el array que generamos
];

// Guardamos con la estructura de objeto que Laravel espera
file_put_contents($output_file, json_encode($finalStructure, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "JSON actualizado con estructura compatible.\n";

} catch (Exception $e) {
    error_log("Error en cron de noticias: " . $e->getMessage());
    exit(1);
}
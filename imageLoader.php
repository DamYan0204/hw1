<?php

if(isset($_GET['page']))
{
    header('Content-Type: application/json');

    $page = $_GET['page'];

    $imageUrls = 
    [
        'latitude5540' => 
        [
            'Immagini/Latitude/latitude5540_intro.png',
            'Immagini/Latitude/latitude5540_1.png',
            'Immagini/Latitude/latitude5540_2.png'
        ],

        'inspiron16' => 
        [
            'Immagini/Inspiron/inspiron16_intro.png',
            'Immagini/Inspiron/inspiron16_1.png',
            'Immagini/Inspiron/inspiron16_2.png'
        ],

        'inspiron27' => 
        [
            'Immagini/Inspiron/inspiron27_intro.png',
            'Immagini/Inspiron/inspiron27_1.png',
            'Immagini/Inspiron/inspiron27_2.png'
        ],

        'precision3660' => 
        [
            'Immagini/Precision/precision3660_intro.png',
            'Immagini/Precision/precision3660_1.png',
            'Immagini/Precision/precision3660_2.png'
        ],

        'poweredgeT150' => 
        [
            'Immagini/PowerEdge/poweredgeT150_intro.png',
            'Immagini/PowerEdge/poweredgeT150_1.png',
            'Immagini/PowerEdge/poweredgeT150_2.png'
        ],

        'dell24' => 
        [
            'Immagini/Monitor/dell24_intro.png',
            'Immagini/Monitor/dell24_1.png',
            'Immagini/Monitor/dell24_2.png'
        ],
        
    ];

    // Controlla se la pagina richiesta esiste
    if(isset($imageUrls[$page])) 
    {
        // Se esiste, usa gli URL delle immagini per quella pagina
        $response = 
        [
            'imageUrls' => $imageUrls[$page]
        ];
    }
    else
        $response = [];

        
    // Codifica l'array di percorsi delle immagini in JSON
    $json = json_encode($response);

    // Rimuovi i backslash creato da json_encode prima di ogni barra nei percorsi delle immagini
    $json = str_replace('\\/', '/', $json);

    // Restituisci la risposta JSON
    echo $json;

}

?>
<?php
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
?>
[{
        "name" : "Biedronka",
        "lat": "50.06248",
        "lng" : "19.936336",
        "logoUrl" : "img/biedronka.png",
        "shopSize" : "45",
        "amountOfPeople" :"<?php echo file_get_contents('0')  ?>"

    },
    {
        "name" : "Lidl",
        "lat": "50.0628876",
        "lng" : "19.9434594",
        "logoUrl" : "img/lidl.png",
        "shopSize" : "30",
        "amountOfPeople" :"<?php echo file_get_contents('1')  ?>"

    }
]
<?php

require('vendor/autoload.php');

use App\tool\Router;
use App\tool\HttpRequest;

try {
    $httprequest = new HttpRequest();
    $router = new Router();
    $httprequest->setRoad($router->findRoad($httprequest));
    $httprequest->run();
}
catch(Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

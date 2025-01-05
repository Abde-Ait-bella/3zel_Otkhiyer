<?php

use Src\Routes\Routes;

require_once "vendor/autoload.php";
require_once __DIR__ . '/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// echo strtok($uri, '/shop_product');



// $delimiters = "/shop_product";

// Premier appel : fournir la chaîne
// $token = strtok($uri, $delimiters);

$cleanUri = str_replace('/shop_product', '', $uri);


// echo $uri  ; 

// while ($token !== false) {
//     echo $token . "\n"; // Affiche chaque mot sur une nouvelle ligne
//     $token = strtok(''); // Appels suivants : continuer avec strtok('')
// }

$routes = new Routes();
$routes->Despatch($method, $cleanUri);
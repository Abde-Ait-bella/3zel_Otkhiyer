<?php

include __DIR__."/src/routes/routes.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$cleanUri = str_replace('/shop_product', '', strtok($uri, '?'));
// echo $cleanUri;
$routes = new Routes();
$routes->Despatch($method, $cleanUri);
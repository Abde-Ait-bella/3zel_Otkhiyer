<?php

require_once "../controllers/ProductController.php";
require_once "../controllers/UserController.php";

class Routes
{
    public array $routes = [
        "POST" => [
            "/signup" => [UserController::class, "login"],
        ],
        "GET" => [
            "/" => [ProductController::class, "index"],
            "/signin" => [UserController::class, "signin"],
            "/signup" => [UserController::class, "signup"],
        ]
    ];
    
    public function Despatch($methode, $uri){
        // echo $uri;
        try {
            if (isset($this->routes[$methode][$uri])) {
                [$class, $method] = $this->routes[$methode][$uri];
                $handleClass = new $class();
                $handleClass->$method();
            }
        } catch (\Throwable $th) {
            echo "cette path ni pas exists";
        }
    } 
}
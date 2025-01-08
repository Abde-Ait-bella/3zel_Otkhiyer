<?php

require_once __DIR__."/../controllers/ProductController.php";
require_once __DIR__."/../controllers/UserController.php";

class Routes
{
    public array $routes = [
        "POST" => [
            "/signup" => [UserController::class, "register"],
            "/signin" => [UserController::class, "login"],
            "/addProduct" => [ProductController::class, "Create"],
            "/updateProduct" => [ProductController::class, "Update"],
        ],
        "GET" => [
            "/" => [ProductController::class, "index"],
            "/signin" => [UserController::class, "signin"],
            "/signup" => [UserController::class, "signup"],
            "/logout" => [UserController::class, "logout"],
            "/admin" => [UserController::class, "index"],
            "/active" => [UserController::class, "customer_active"],
            "/disabled" => [UserController::class, "customer_disabled"],
            "/delete" => [ProductController::class, "Destroy"],
            "/products" => [ProductController::class, "productAdmin"],
            "/addToCart" => [ProductController::class, "Add_to_cart"],
        ]
    ];
    
    public function Despatch($methode, $uri){
        // echo $uri;
        // try {
            if (isset($this->routes[$methode][$uri])) {
                [$class, $method] = $this->routes[$methode][$uri];
                $handleClass = new $class();
                $handleClass->$method();
            }
        // } catch (\Throwable $th) {
        //     echo "cette path ni pas exists";
        // }
    } 
}
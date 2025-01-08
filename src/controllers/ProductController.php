<?php

require_once __DIR__."/../models/Product.php";

class ProductController
{
    private $productModel;
    public function __construct(){
        $this->productModel = new Product();
    }
    public function index(): void{
        $products = $this->productModel->getAll();
        require __DIR__."/../../public/index.php";
    }

    public function productAdmin(){
        $products = $this->productModel->getAll();
        require __DIR__."/../view/admin/Products.php";
    }

    public function Create(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['nom'];
            $quantite = $_POST['quantite'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $photo = $_POST['photo'];
        }
    }
}
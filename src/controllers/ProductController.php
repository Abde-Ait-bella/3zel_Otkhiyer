<?php

require_once "../models/Product.php";

class ProductController
{
    private $productModel;
    public function __construct(){
        $this->productModel = new Product;
    }
    public function index(): void{
        $products = $this->productModel->getAll();
        require __DIR__."/../../public/index.php";
    }
}
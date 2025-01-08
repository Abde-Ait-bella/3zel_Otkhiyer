<?php

namespace Src\Controllers;

use Src\Models\Product;

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
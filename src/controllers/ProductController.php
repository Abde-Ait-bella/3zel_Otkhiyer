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
            // $photo = $_POST['photo'];

            $created_at = date("Y-m-d H:i:s");

            $uploadDir = __DIR__.'/../../assets/images/';            
            $stockDir =  "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/assets/images/";



            print_r($_FILES);

            if (isset($_FILES['product_image'])) {
                $file = $_FILES['product_image'];
                $fileName = basename($file['name']);
                $targetPath = $uploadDir . $fileName;
                $stockPath = $stockDir . $fileName;
      
                // Verifier les erreurs
                if ($file['error'] === UPLOAD_ERR_OK) {
      
                    $fileType = mime_content_type($file['tmp_name']);
                    if (in_array($fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif'])) {
                        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                            $product_image = $stockPath;
                        } else {
                            echo "Erreur lors du deplacement du fichier.";
                        }
                    } else {
                        echo "Seules les photos (JPEG, PNG, GIF) sont autorisées.";
                    }
                } else {
                    echo "Erreur lors de l'upload : " . $file['error'];
                }
            } else {
                echo "Aucun fichier envoyé.";
            }

            try {
                $product = new Product();
                $success = $product->insertProduct($name, $quantite, $description, $prix , $product_image, $created_at);
                if (!$success) {
                    throw new Exception("Une erreur est survenue dans l'insertion des donner.");
                }
                header("Location: /shop_product/products");
                exit();
                } catch (Exception $exception) {    
                    echo "erreur" . $exception->getMessage() ;
            }

        }
    }

    public function Update(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $name = $_POST['nom'];
            $quantite = $_POST['quantite'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $id = $_GET['id'];

            $created_at = date("Y-m-d H:i:s");

            $uploadDir = __DIR__.'/../../assets/images/';            
            $stockDir =  "http://" . $_SERVER['HTTP_HOST'] . "/shop_product/assets/images/";


            if (isset($_FILES['product_image'])) {
                $file = $_FILES['product_image'];
                $fileName = basename($file['name']);
                $targetPath = $uploadDir . $fileName;
                $stockPath = $stockDir . $fileName;
      
                if ($file['error'] === UPLOAD_ERR_OK) {
      
                    $fileType = mime_content_type($file['tmp_name']);
                    if (in_array( $fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif', 'image/avif', 'image/webp'])) {
                        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                            $product_image = $stockPath;
                        } else {
                            echo "Erreur lors du deplacement du fichier.";
                        }
                    } else {
                        echo "Seules les photos (JPEG, PNG, GIF) sont autorisées.";
                    }
                } else {
                    echo "Erreur lors de l'upload : " . $file['error'];
                }
            } else {
                echo "Aucun fichier envoyé.";
            }

            $product = new Product();
            try {
                $success = $product->Update($id, $name, $quantite, $description, $prix , $product_image, $created_at);
                if (!$success) {
                    throw new Exception("Une erreur est survenue dans modifier les donner.");
                }
                header("Location: /shop_product/products");
                exit();
                } catch (Exception $exception) {    
                    echo "erreur" . $exception->getMessage() ;
            }

        }
    }

    public function Add_to_cart(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            session_start();
            $_SESSION['all_id'][] = $id;
            header("Location: /shop_product/");
            exit();
        }
    }

    public function Destroy(){
        if ($_GET['id']) {
            $id = $_GET['id'];
            $product = new Product();
            $product->Destroy($id);
        }
    }

    
}
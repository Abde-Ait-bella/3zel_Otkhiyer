<?php

require_once __DIR__."/../config/Database.php";


class Product
{
    private $dbconn;

    public function __construct (){
        $this->dbconn = Database::getConnection();
    }

    public function getAll(){
        $sql = "SELECT * FROM product WHERE is_deleted = :id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([
            ":id" => 0
        ]);
        return $stmt->fetchAll();
    }



    public function insertProduct($product_name, $product_quantity, $product_description, $product_prix, $product_photo, $created_at)
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO product (product_name, product_quantity, product_description, product_price, product_image, created_at) VALUES (:product_name, :product_quantity, :product_description, :product_price, :product_photo, :created_at)";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            ":product_name" => $product_name,
            ":product_quantity" => $product_quantity,
            ":product_description" => $product_description,
            ":product_price" => $product_prix,
            ":product_photo" => $product_photo,
            ":created_at" => $created_at
        ]);
        return $success;
    }

    public function Update($product_id, $product_name, $product_quantity, $product_description, $product_prix, $product_photo, $created_at)
    {
        echo $product_name;
        $pdo = Database::getConnection();
        $sql = "UPDATE product SET 
        product_name = :product_name,
        product_quantity = :product_quantity, 
        product_description = :product_description, 
        product_price = :product_price, 
        product_image = :product_image, 
        created_at = :created_at
        WHERE product_id = :id
        ";

        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            ":product_name" => $product_name,
            ":product_quantity" => $product_quantity,
            ":product_description" => $product_description,
            ":product_price" => $product_prix,
            ":product_image" => $product_photo,
            ":created_at" => $created_at,
            ":id" => $product_id
        ]);
        return $success;
    }
    public function Destroy($id){
        $conn = Database::getConnection();
        $sql = "UPDATE product SET is_deleted = 1  WHERE product_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        header("Location: /shop_product/products");
    }
}

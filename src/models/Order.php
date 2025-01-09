<?php

include_once __DIR__ . "/../config/Database.php";

class Order
{
    public function Create($dataOrder, $dataOrderProduct)
    {
        try {

            $conn = Database::getConnection();
            $conn->beginTransaction();

            $sql = "INSERT INTO orders (cusomers_id, order_quantity, created_at) VALUES (:cusomers_id , :order_quantity , :created_at)";
            $created_at = date("Y-m-d H:i:s");
            $stmt = $conn->prepare($sql);
    
            $stmt->execute([
                ":cusomers_id" => $dataOrder['customers_id'],
                ":order_quantity" => $dataOrder['order_quantity'],
                ":created_at" => $created_at,
            ]);
    
            $lastID = $conn->lastInsertId();
    
            $sql_1 = "INSERT INTO product_order (order_id, product_id, product_quantity) VALUES (:order_id , :product_id , :product_quantity)";
            $stmt_1 = $conn->prepare($sql_1);
    
            foreach ($dataOrderProduct as $key => $value) {
                $stmt_1->execute([
                    ":order_id" => $lastID,
                    ":product_id" => $value['product_id'],
                    ":product_quantity" => $value['product_quantity'],
                ]);
            }

            $conn->commit();
            return ['status' => 'success', 'message' => "Product added successfully!"];

        } catch (\Throwable $th) {

            $conn->rollBack();
            return ['status' => 'error','message' => 'Product added failed!'];
        }
    }
}
<?php

include_once __DIR__."/../models/Order.php";

class OrderContreller
{

    public function index(){
        $order = new Order();
        $order->getAll();
        
        require __DIR__."/../view/admin/Orders.php";
    }

    public function Create()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $rawData = file_get_contents("php://input", true);
            $data = json_decode($rawData, true);

            // print_r($data);
            $dataOrder = $data['orders'];
            $dataOrderProduct = $data['order_product'];

                $order = new Order();
                $result = $order->Create($dataOrder, $dataOrderProduct);

            header('Content-Type: application/json');
            echo json_encode([
                'success' =>  $result['status'],
                'message' => $result['message'],
            ]);

            exit;
        }
    }
}
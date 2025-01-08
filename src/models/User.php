<?php

require_once __DIR__."/../config/Database.php";

class User
{

    
    public function insertUser($user_name, $user_email, $user_password, $user_role, $created_at)
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO users (user_name, user_email, user_password, user_role, created_at) VALUES (:user_name, :user_email, :user_password, :user_role, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":user_name" => $user_name,
            ":user_email" => $user_email,
            ":user_password" => $user_password,
            ":user_role" => $user_role,
            ":created_at" => $created_at
        ]);
    }

   
    public function getAll(){
        $conn = Database::getConnection();
        $sql = "SELECT * FROM users WHERE is_deteted = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function disabledUser($id){
        $conn = Database::getConnection();
        $sql = "UPDATE users SET status = 0  WHERE user_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        header("Location: /shop_product/admin");
    }

    public function activeUser($id){
        $conn = Database::getConnection();
        $sql = "UPDATE users SET status = 1  WHERE user_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        header("Location: /shop_product/admin");
    }

    public function deleteUser($id){
        $conn = Database::getConnection();
        $sql = "UPDATE users SET is_deteted = 1  WHERE user_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        header("Location: /shop_product/admin");
    }

}
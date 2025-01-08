<?php

require_once __DIR__."/../config/Database.php";


class Product
{
    private $dbconn;

    public function __construct (){
        $this->dbconn = Database::getConnection();
    }

    public function getAll(){
        $sql = "SELECT * FROM product";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

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
}

<?php

class Database
{
    private static $servername = "localhost";

    private static $dbname = "shop_product";

    private static $password = "";

    private static $username = "root";

    public static function getConnection()
    {
        try {
            $pdo = new PDO("mysql:host=" . self::$servername . ";dbname=" . self::$dbname, self::$username, self::$password);
            return $pdo;
        } catch (ErrorException $ex) {
            die("erreur de connextion" . $ex->getMessage());
        }
    }
}

$conn = Database::getConnection();
if ($conn) {

    echo "la connextion est succés";
    print_r($conn);
    
}  
<?php

require_once __DIR__."/../config/Database.php";


class Ckeck_In
{
    public function check_in($table, $key, $value){
        $sql = "SELECT * FROM $table WHERE $key = :value";
        $conn = Database::getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":value" => $value
        ]);

        $result = $stmt->fetchAll();

        if (empty($result)) {
            return false;
        }else{
            return $result;
        }
    }


}
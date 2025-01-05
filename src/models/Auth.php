<?php



class Auth
{

    public function test(){
        echo "test";
    }

    public function insertUser($user_name, $user_email, $user_password, $user_role, $created_at)
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO users (user_name, user_email, user_password, user_role, created_at) VALUES (:user_name, :user_email, :user_password, :user_role, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":user_name" => $user_name;
            ":user_email" => $user_email;
            ":user_password" => $user_password;
            ":user_role" => $user_role;
            ":created_at" => $created_at;
        ]);
    }

}
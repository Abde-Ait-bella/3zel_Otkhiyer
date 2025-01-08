<?php

namespace Src\Controllers;

use Src\Models\Auth;

class UserController
{

    public function signin()
    {
        require __DIR__ . "/../view/Sign_in.php";
    }

    public function signup()
    {
        require __DIR__ . "/../view/Sign_Up.php";
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usename = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $passwordHach = password_hash($password, PASSWORD_BCRYPT);


            $user = new Product();
            $user->
        }
    }
}
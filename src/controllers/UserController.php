<?php

require_once __DIR__ . "/../models/Product.php";
include __DIR__ . "/../models/User.php";
include __DIR__ . "/../models/Ckeck_In.php";

// require 'vendor/lcobucci/jwt/src/Configuration.php';
// require 'vendor/lcobucci/jwt/src/Signer/Hmac/Sha256.php';
// require 'vendor/lcobucci/jwt/src/Signer/Key.php';

require 'vendor/autoload.php';

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Key\InMemory;


class UserController
{

    public function index()
    {
        $user = new User();
        $usersData = $user->getAll();
        require __DIR__ . "/../view/admin/dashboard.php";
    }
    public function signin()
    {
        require __DIR__ . "/../view/Sign_in.php";
    }

    public function signup()
    {
        require __DIR__ . "/../view/Sign_Up.php";
    }

    public function register()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_name = htmlspecialchars($_POST["username"]);
            $user_email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $created_at = date('Y-m-d H:i:s');
            $user_role = 0;
            $passwordHach = password_hash($_POST["password"], PASSWORD_BCRYPT);

          

            $checkin = new Ckeck_In();
            $resutl_existing_email = $checkin->check_in("users", "user_email", $user_email);

            if (!$resutl_existing_email) {
                $user = new User();
                $user->insertUser($user_name, $user_email, $passwordHach, $user_role, $created_at);
                session_start();
                $_SESSION['success']['rejester'] = "Vous vous êtes inscrit avec succès.";
                header("Location: signin");
            } else {
                session_start();
                $_SESSION['errors']['email'] = "L'adresse email existe déjà.";
                header("Location: signup");
                exit;
            }
        }
    }

    public function login()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $password = $_POST["password"];

    

            $checkin = new Ckeck_In();
            $resutl_existing_email = $checkin->check_in("users", "user_email", $user_email);
            echo "test";

            if ($resutl_existing_email) {

                if (password_verify($password, $resutl_existing_email[0]['user_password'])) {

                    session_start();
                    $_SESSION['user_id'] = $resutl_existing_email[0]['user_id'];
                    $_SESSION['user_role'] = $resutl_existing_email[0]['user_role'] == 0 ? "client" : "admin";
                    $_SESSION['user_name'] = $resutl_existing_email[0]['user_name'];
                    header("Location: /shop_product/");
                } else {
                    session_start();
                    $_SESSION['errors']['login'] = "Password no accept.";
                    header("Location: /shop_product/signin");
                }
            } else {
                // echo "makainch email";
                session_start();
                $_SESSION['errors']['email'] = "Email no accept.";
                header("Location: signin");
                exit;
            }
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['user_role']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        header("Location: /shop_product/signin");
    }

    public function customer_disabled(){
        if ($_GET['id']) {
            $id = $_GET['id'];
            $user = new User();
            $user->disabledUser($id);
        }
    }

    public function customer_active(){
        if ($_GET['id']) {
            $id = $_GET['id'];
            $user = new User();
            $user->activeUser($id);
        }
    }

}
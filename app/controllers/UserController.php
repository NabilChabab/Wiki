<?php

namespace App\controllers;

require_once '../../vendor/autoload.php';

use App\models\UserModel;
use App\models\CategoryModel;
use App\models\WikiModel;
use App\DAO\UserDAO;

session_start();

class UserController
{
    public function signup()
    {
        include '../../views/auth/register.php';
        exit();
    }

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $roleId = 2;
            $file_name = $_FILES['profil']['name'];
            $file_temp = $_FILES['profil']['tmp_name'];
            $upload_image = "" . $file_name;
            if (move_uploaded_file($file_temp, $upload_image)) {
                UserModel::registerUser($fullname, $address, $upload_image, $email, $password, $roleId);
                
                            header("Location: signin");
                            exit();
            } else {
                return $_SESSION['error_message'] ='Error uploading file.';
            }
          

        }
    }

    public function login()
    {
        include '../../views/auth/login.php';
        exit();
    }
    public function logout()
    {
        session_destroy();
        header('location:signin');
        exit();
    }
    

    public function authenticateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = UserModel::authenticateUser($email, $password);

            if ($userModel) {
                $user = UserDAO::getUserByEmail($email);

                if ($user['role_id'] == 1) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['admin_image'] = $user['profil'];
                    $_SESSION['role'] = $user['role_id'];
                    header("Location: admin");
                    exit();
                } elseif ($user['role_id'] == 2) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_image'] = $user['profil'];
                    $_SESSION['role'] = $user['role_id'];
                    header("Location: home");
                    exit();
                }
            }
        }
    }

    public function home($category , $wikis , $allwikis)
    {
        include '../../views/user/index.php';
        exit();
    }

    public function allCategories(){
        $user_id = isset( $_SESSION['user_id'])?  $_SESSION['user_id'] : '';
        $category = CategoryModel::getAllCategories();
        $wikis = WikiModel::getWikisByuserId($user_id);
        $allwikis = WikiModel::getAllWikis();
        $this->home($category , $wikis , $allwikis);
    }

    
}

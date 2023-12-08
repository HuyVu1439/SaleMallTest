<?php 

class AuthController{
    //Chuyển hướng đến trang đăng ký
    public function register(){
        require 'Views/Auth/register.php';
    }
    //Thêm tài khoản
    public function AddAccount(){
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        require 'Models/User.php';
        (new User())->create($userName, $password);
        header("Location: index.php?action=login");
    }
    //Chuyển hướng đến trang đăng nhập
    public function Login(){
        require 'Views/Auth/Login.php';
    }
    //Đăng nhập
    public function Logged(){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        require 'Models/User.php';
        $auth = (new User())->login($userName, $password);
        if ($auth==true) {
            header("Location: index.php");
        }else{
            header("Location: index.php?action=login");
        }
    }
    public function Logout(){
        unset($_SESSION['user']);
        header("Location: index.php");
    }
}

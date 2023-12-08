<?php 

require_once 'Models/Connect.php';
require 'Models/User_Object.php';

class User{

    //Thêm mới 1 Category
    public function create($userName,$password): void{
        $object = new User_Object( 0,$userName,$password);

        $sql = "insert into users (userName,password) values('{$object->get_UserName()}','{$object->get_Password()}')";
        //die($sql);
        (new Connect())->execute($sql);
        
    }

    //Đăng nhập
    public function login($userName,$password){
        $auth = false;
        $sql = "SELECT * FROM users WHERE userName = '$userName'";
        // die($sql);
        $result = (new Connect())->select($sql);
        // var_dump($result);
        // die();
        $row = mysqli_fetch_array($result);
        $check = mysqli_num_rows($result);
        if ($check==1){
            if($row['password']==$password){
                
                $_SESSION['user'] = $row;
                $auth = true;
            }
            
        }else{
            $auth = false;
        }

       return $auth;
    }
}
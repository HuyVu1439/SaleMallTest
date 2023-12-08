<?php

require_once 'Models/Connect.php';

class User_Object
{
    private int $id;
    private string $userName;
    private string $password;

    public function __construct($ID, $userName, $password)
    {
        $this->id = $ID;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function get_ID(){
        return $this->id;
    }
    public function set_ID($var){
        return $this->id = $var;
    }

    public function get_UserName(){
        return $this->userName;
    }

    public function set_UserName($var){
        return $this->userName = $var;
    }

    public function get_Password(){
        return $this->password;
    }
    public function set_Password($var){
        return $this->password = $var;
    }
}
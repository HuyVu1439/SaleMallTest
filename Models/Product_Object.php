<?php

require_once 'Models/Connect.php';
class Product_Object
{
    private int $id;
    private string $productName;
    private int $idCategory;
    private string $image;
    private int $price;
    private string $description;
    private string $created_at;
    private string $updated_at;

    //Hàm khởi tạo
    public function __construct($id, $productName, $idCategory, $image, $price, $description, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->idCategory = $idCategory;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    //Tạo getter và setter
    public function get_ID(){
        return $this->id;
    }

    public function set_ID($var){
        return $this->id = $var;
    }

    public function get_ProductName(){
        return $this->productName;
    }

    public function set_ProductName($var){
        return $this->productName = $var;
    }

    public function get_IDCategoty(){
        return $this->idCategory;
    }

    public function set_IDCategoty($var){
        return $this->idCategory = $var;
    }

    public function get_Image(){
        return $this->image;
    }

    public function set_Image($var){
        return $this->image = $var;
    }
    public function get_Price(){
        return $this->price;
    }

    public function set_Price($var){
        return $this->price = $var;
    }
    public function get_Description(){
        return $this->description;
    }

    public function set_Description($var){
        return $this->description = $var;
    }
    public function get_Created_At(){
        return $this->created_at;
    }

    public function set_Created_At($var){
        return $this->created_at = $var;
    }
    public function get_Updated_At(){
        return $this->updated_at;
    }

    public function set_Updated_At($var){
        return $this->updated_at = $var;
    }
}
<?php

require_once 'Models/Connect.php';
require 'Models/Product_Object.php';

class Product
{

    //Lấy tất cả Product
    public function all()
    {
        
        $sql = "SELECT products.* FROM products 
        JOIN categories ON products.IDCategory = categories.ID";
        $result = (new Connect())->select($sql);

        $arr = [];
        foreach($result as $row){
            $object = new Product_Object($row['ID'], $row['ProductName'], $row['IDCategory'], $row['Image'], $row['price'], $row['description'], $row['created_at'], $row['updated_at']);

            $arr[] = $object;
        }


        return $arr;
    }
    //Thêm mới 1 Product
    public function create($productName,$categoryID,$productImage,$price,$description): void{
        $now = new DateTime(null, new DateTimeZone('Asia/Ho_Chi_Minh'));
        $created_at = $now->format('Y-m-d H:i:s');
        $updated_at = $now->format('Y-m-d H:i:s');
        $prodImg = $productImage;
        

        //đổi tên file trước khi upload
        $filename = $prodImg['name'];
        $filename = explode('.',$filename);

        $ext = end($filename);

        $new_file = md5(uniqid()).'.'.$ext;

        move_uploaded_file($prodImg['tmp_name'],'Images/'.$new_file);

        $object = new Product_Object(0,$productName,$categoryID,$new_file, $price, $description, $created_at, $updated_at);

        $sql = "insert into products (ProductName,IDCategory,Image,price,description,created_at,Updated_at) values('{$object->get_ProductName()}','{$object->get_IDCategoty()}','{$object->get_Image()}','{$object->get_Price()}','{$object->get_Description()}','{$object->get_Created_At()}','{$object->get_Updated_At()}')";
        (new Connect())->execute($sql);

    }
    //Tìm ID Product muốn sửa
    public function find($editId)
    {
      

        $sql = "SELECT * FROM products WHERE ID = '$editId'";
        $result = (new Connect())->select($sql);

        $row = mysqli_fetch_array($result);

        
            $object = new Product_Object($editId, $row['ProductName'],$row['IDCategory'],$row['Image'],$row['price'],$row['description'],$row['created_at'],$row['updated_at']);

        return $object;
    }
    //Sửa 1 Product
    public function update($productID,$productName,$categoryID,$productImage,$price, $description): void{

        $now = new DateTime(null, new DateTimeZone('Asia/Ho_Chi_Minh'));
        $created_at = '';
        $updated_at = $now->format('Y-m-d H:i:s');

        $prodImg = $productImage;
        
        //đổi tên file trước khi upload
        $filename = $prodImg['name'];
        $filename = explode('.',$filename);

        $ext = end($filename);

        $new_file = md5(uniqid()).'.'.$ext;

        move_uploaded_file($prodImg['tmp_name'],'Images/'.$new_file);

        $object = new Product_Object($productID,$productName,$categoryID,$new_file,$price, $description, $created_at, $updated_at);

        $sql = "update products set ProductName = '{$object->get_ProductName()}', IDCategory = '{$object->get_IDCategoty()}', Image = '{$object->get_Image()}',price ='{$object->get_Price()}', description= '{$object->get_Description()}', updated_at='{$object->get_Updated_At()}' where ID = '$productID'";
        (new Connect())->execute($sql);
 
    }
    //Xoá 1 Product
    public function destroy($delID): void
    {

        $sql = "delete from products where ID = '$delID'";

        (new Connect())->execute($sql);

    }
}
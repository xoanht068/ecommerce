<?php
class ProductModel extends DB{
    public function showProduct(){
        $qlr = "select * from product";
        $result = mysqli_query($this->con, $qlr);
        return mysqli_fetch_all($result);
    }
    public function detailProduct($id){
        $qlr = "select product_name, detail, image, price from product where id =".$id;
        $result = mysqli_query($this->con, $qlr);
        return mysqli_fetch_array($result);
    }
}
?>
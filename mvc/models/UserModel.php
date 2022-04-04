<?php
class UserModel extends DB{
    public function checkUser($data){
        $qlr = "select id from user where username ='" . $data['username'] . "' and pass = '".$data['password']."'";
        $result = mysqli_query($this->con,$qlr);
        if ($result->num_rows == 0){
            return false;
        } else{
            return true;
        }

    }
    public function listUser(){
        $qlr = "select * from user";
        $result = mysqli_query($this->con,$qlr);
        return mysqli_fetch_all($result);
    }
    public function delUser($id){
        $qlr = "delete from user where id=".$id;
        $result = mysqli_query($this->con,$qlr);
    }
}
?>
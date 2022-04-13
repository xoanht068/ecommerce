<?php
class UserModel extends DB{
    public function checkUser($data){
        $qlr = "select id from users where username =? and pass = ?";
	    $stmt = $this->con->prepare($qlr);
	    $stmt->bind_param("ss", $data['username'], $data['password']);
	    $stmt->execute();
	    $result = $stmt->get_result();
	    return $result->num_rows;
    }
	public function checkUsername($data){
		$qlr = "select id from users where username =? ";
		$stmt = $this->con->prepare($qlr);
		$stmt->bind_param("s", $data);
		$stmt->execute();
		$result = $stmt->get_result();
		return mysqli_fetch_assoc($result);
	}
    public function listUser(){
        $qlr = "select * from users";
        $result = mysqli_query($this->con,$qlr);
        return mysqli_fetch_all($result);
    }
    public function delUser($id){
        $qlr = "delete from users where id=".$id;
        $result = mysqli_query($this->con,$qlr);
    }
	public function addUser($data){
		$qlr = "insert into users (name, username, email, phonenumber, pass) values (?, ?, ?, ?, ?)";
		$stmt = $this->con->prepare($qlr);
		$stmt->bind_param("sssss", $data['name'], $data['username'], $data['email'], $data['phonenumber'], $data['password']);
		$stmt->execute();
		return $stmt->error == '';
    }
}
?>
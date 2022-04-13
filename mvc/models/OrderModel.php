<?php

class OrderModel extends DB{
	public function addOrder($data, $userId){
		$qlr = "insert into orders (user_id, first_name, last_name, email, phone, address1, address2, city, country_code, order_date) values (?, ?, ?, ?, ?, ?, ?, ?, ?, now())";
		$stmt = $this->con->prepare($qlr);
		$stmt->bind_param("issssssss", $userId, $data['first_name'], $data['last_name'], $data['email'], $data['phone'], $data['address1'], $data['address2'], $data['city'], $data['country']);
		$stmt->execute();
		return $stmt->error == '';
	}

	public function getLastOrder(){
		$qlr = "select order_number from orders order by order_number desc limit 0, 1";
		$result = mysqli_query($this->con,$qlr);
		return mysqli_fetch_assoc($result);
	}

	public function getOrdersByUser($userId) {
		$qlr = "select o.order_number, o.address1, o.order_date,sum( op.quantity * p.price) as total
				from orders as o
				join order_product as op on o.order_number = op.order_number
				join products as p on op.product_id = p.id
			    where o.user_id = $userId group by o.order_number";
		$result = mysqli_query($this->con,$qlr);
		return $result ? mysqli_fetch_all($result) : [];
	}

	public function getOrdersDetailById($id) {
		$qlr = "select o.*, p.*, op.quantity
				from orders as o
				join order_product as op on o.order_number = op.order_number
				join products as p on op.product_id = p.id
			    where o.order_number=$id";
		$result = mysqli_query($this->con,$qlr);
		return $result ? mysqli_fetch_all($result) : [];
	}
}

?>
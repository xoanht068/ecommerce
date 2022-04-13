<?php

class OrderProductModel extends DB{
	public function addOrderDetail($orderNumber, $productId, $quantity){
		$qlr = "insert into order_product (order_number, product_id, quantity) values ('" . $orderNumber . "', '" . $productId . "', '" . $quantity . "')";
		return mysqli_query($this->con,$qlr);
	}
}

?>
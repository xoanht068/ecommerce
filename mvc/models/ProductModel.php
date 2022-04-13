<?php

class ProductModel extends DB{
	public function showProduct($order) {
		$orderBy = $this->getOrderBy($order);
		$qlr = "select * from products order by " . $orderBy;
		$result = mysqli_query($this->con, $qlr);
		return mysqli_fetch_all($result);
	}

	public function detailProduct($id){
		if ((int)$id) {
			$qlr = "select * from products where id =" . $id;
			$result = mysqli_query($this->con, $qlr);
			return mysqli_fetch_assoc($result);
		} else {
			return 0;
		}
	}

	public function getTotalProduct() {
		$qlr = "select count(id) as total from products";
		$result = mysqli_query($this->con, $qlr);
		return mysqli_fetch_assoc($result);
	}

	private function getOrderBy($orderBy) {
		switch ($orderBy) {
			case 'A-Z':
				return 'product_name';
			case 'Z-A':
				return 'product_name desc';
			case 'price':
				return 'price';
			case 'price-desc':
				return 'price desc';
			default:
				return 'product_name';
		}
	}
}

?>
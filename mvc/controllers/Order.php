<?php
	class Order extends Controller {
		public function ordering(){
			$userMo = $this->model("UserModel");
			$userIdArr = $userMo->checkUsername($_SESSION["username"]);
			$result2 = 0;
			if (count($userIdArr) > 0 && isset($userIdArr["id"]) && isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
				$userId = $userIdArr["id"];
				$orderMo = $this->model('OrderModel');
				$result1 = $orderMo->addOrder($_REQUEST, $userId);
				if ($result1) {
					$orderNumber = $orderMo->getLastOrder();
					$orderNumber["order_number"];
					$orderProductMo = $this->model("OrderProductModel");
					foreach ($_SESSION["cart"] as $cartItem) {
						$result2 = $orderProductMo->addOrderDetail($orderNumber["order_number"], $cartItem["id"], $cartItem["quantity"]);
					}
					echo $result2;
				}
			}
			if ($result2) {
				$_SESSION["cart"] = [];
			}
		}

		public function default() {
			if (isset($_SESSION["username"])){
				$userMo = $this->model("UserModel");
				$userIdArr = $userMo->checkUsername($_SESSION["username"]);
				if (count($userIdArr) > 0 && isset($userIdArr["id"])) {
					$orderMo = $this->model('OrderModel');
					$orderList = $orderMo->getOrdersByUser($userIdArr["id"]);
					$this->viewFrontend([
						"page" => "order",
						"orders" => $orderList
					]);
				}
			} else {
				header("Location:" . constant("HOST") . "/logIn");
			}
		}

		public function detail($id) {
			if (isset($_SESSION["username"])){
				$orderMo = $this->model('OrderModel');
				$order = $orderMo->getOrdersDetailById($id);
				$total = 0;
				foreach ($order as $v) {
					$total += $v[15] * $v[17];
				}
				if (count($order) > 0) {
					$this->viewFrontend([
						"page" => "order_detail",
						"order" => $order,
						"total" => $total
					]);
				} else {
					$this->view('/404page');
				}

			} else {
				header("Location:" . constant("HOST") . "/logIn");
			}
		}
	}
?>

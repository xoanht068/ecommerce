<?php
	class Cart extends Controller {
		public function default() {
			if (isset($_SESSION["username"])){
				$userMo = $this->model('ProductModel');
				$result = [];
				for ($i=0; $i < count($_SESSION['cart']); $i++){
					$arr = $userMo->detailProduct($_SESSION['cart'][$i]['id']);
					array_push($result, $arr);
				}
				$countryMo = $this->model('CountryModel');
				$countryList = $countryMo->getAllCountry();

				$this->viewFrontend([
					"page" => "cart",
					"data" => $result,
					"quantity" => $_SESSION['cart'],
					"countryList" => $countryList
				]);
			} else {
				header("Location:" . constant("HOST") . "/logIn");
			}

		}
		public function addToCart($id){
			$quantity = (int)$_POST['quantity'];
			$this->mergeCart($id, $quantity);
		}
		public function addToCartAndViewCart($id) {
			$quantity = (int)$_POST['quantity'];
			$this->mergeCart($id, $quantity);
			header("Location:" . constant("HOST") . "/cart");
		}

		public function removeCart() {
			$productId = (int)$_POST['product_id'];
			for ($i=0; $i < count($_SESSION['cart']); $i++){
				if ($_SESSION['cart'][$i]['id'] == $productId) {
					array_splice($_SESSION['cart'], $i, 1);
					echo 1;
					break;
				}
			}
		}

		private function mergeCart($id, $quantity){
			for ($i=0; $i < count($_SESSION['cart']); $i++){
				if ($_SESSION['cart'][$i]['id'] == $id) {
					$_SESSION['cart'][$i]['quantity'] = $_SESSION['cart'][$i]['quantity'] + $quantity;
					$check = true;
					break;
				} else {
					$check = false;
				}
			}
			if (!$check){
				array_push($_SESSION['cart'],[
					'id' => $id,
					'quantity' => $_POST['quantity']
				]);
			}
		}
	}
?>
<?php
class Shop extends Controller{
    public function default() {
	    if (isset($_SESSION["username"])) {
		    $productMo = $this->model('ProductModel');
		    $order = isset($_REQUEST['orderBy']) ? $_REQUEST['orderBy'] : '';
		    $result = $productMo->showProduct($order);
			$this->viewFrontend([
			    "page" => "shop",
			    "data" => $result,
				"orderBy" => $order
		    ]);
	    } else {
		    header("Location:" . constant("HOST") . "/login");
	    }
    }
    public function detail($id){
    	$userMo = $this->model('ProductModel');
	    $result = $userMo->detailProduct($id);
	    if ($result != 0) {
		    $this->viewFrontend([
			    "page" => "product",
			    "data" => $result
		    ]);
	    } else {
	    	$this->view('404page');
	    }

    }
}
?>
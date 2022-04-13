<?php
class Controller{

	public function __construct() {
		require_once "./mvc/core/Util/AppUtil.php";
	}

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }
    public function view($view, $data = []){
        require_once "./mvc/views/".$view.".php";
    }
    public function viewFrontend($data = []){
        // $data = ["page" => "shop"]
        require_once "./mvc/views/Frontend/layout_frontend.php";
    }
    public function viewAdmin($view, $data = []){
        require_once "./mvc/views/Admin/".$view.".php";
    }
}
?>
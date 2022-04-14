<?php

class App{
    protected $controller = "Home";
    protected $action = "default";
    protected $params= [];

    function __construct(){
        $arr = $this->UrlProcess();
        $correctUrl = true;
        if (count($arr) > 0) {
            $con = ucfirst($arr[0]);
        	if (file_exists("./mvc/controllers/".$con.".php")) {
                $this->controller = $con;
	        } else {
		        $correctUrl = false;
	        }
        }
        unset($arr[0]);
        require_once "./mvc/controllers/" . $this->controller . ".php";
        if (isset($arr[1])){
            if (method_exists( $this->controller, $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            } else {
	            $correctUrl = false;
            }
        }
        if ($correctUrl) {
	        $this->params = $arr;
	        $this->controller = new $this->controller;
	        call_user_func_array([$this->controller,$this->action], $this->params);
        } else {
	        require_once "./mvc/views/404page.php";
        }
	}

    function UrlProcess(){
        if (isset($_GET["url"])){
            return explode("/",filter_var(trim($_GET["url"], "/")) );
        }
        return [];
    }
    
}

?>
<?php
class Login extends Controller{
    public function default(){
    	$status = 1;
    	if (isset($_REQUEST["status"])) {
		    $status = $_REQUEST["status"];
	    }
        $this->view('viewLogIn', [
        	"status" => $status
        ]);
    }
    public function checkLogin(){
    	if (!isset($_POST['username']) || !isset($_POST['password'])) {
		    header("Location:" . constant("HOST") . "/login?status=2");
	    } elseif (AppUtil::isInvalidString($_POST['username']) && AppUtil::isInvalidString($_POST['password'])){
		    $userMo = $this->model('UserModel');
		    if ($userMo->checkUser($_POST)) {
			    $_SESSION['username'] = $_POST['username'];
			    $_SESSION['cart'] = [];
			    header("Location:" . constant("HOST"));
		    }else {
			    header("Location:" . constant("HOST") . "/login?status=2");
		    }
	    } else {
		    header("Location:" . constant("HOST") . "/login?status=2");
	    }
    }
    public function logOut(){
	    unset($_SESSION['username']);
	    header("Location:" . constant("HOST") . "/login");
    }
}
?>
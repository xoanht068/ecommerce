<?php
class Register extends Controller{
    public function default(){
	    $status = 0;
	    if (isset($_REQUEST["status"])) {
		    $status = $_REQUEST["status"];
	    }
	    $this->view('viewRegister', [
		    "status" => $status
	    ]);
    }
    public function checkRegister(){
		$userMo = $this->model('UserModel');
	    if ($_POST['username'] == '' || $_POST['password'] == '') {
		    header("Location:" . constant("HOST") . "/Register?status=3");
	    } else {
			if (count($userMo->checkUsername($_POST['username'])) > 0){
				header("Location:" . constant("HOST") . "/Register?status=1");
			} else {
				if ($userMo->addUser($_POST)){
					header("Location:" . constant("HOST") . "/logIn?status=3");
				} else {
					header("Location:" . constant("HOST") . "/Register?status=2");
				}
			}
	    }
    }

}
?>
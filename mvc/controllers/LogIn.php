<?php
class LogIn extends Controller{
    public function default(){
        $this->view('viewLogIn');
    }
    public function checkLogIn(){
        $userMo = $this->model('UserModel');
        $result = $userMo->checkUser($_POST);
        if ($result) {
            $this->viewFrontend(["page" => "home"]);
            
        }
    }
}
?>
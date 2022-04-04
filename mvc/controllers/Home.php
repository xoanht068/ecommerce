<?php
    class Home extends Controller{
        public function default(){
            if (isset($_SESSION["userInfor"])) {
                $this->viewFrontend([
                    "page" => "home"
                ]);
            } else {
                header("Location:" . constant("HOST") . "/logIn");
            }
        }
    }
?>
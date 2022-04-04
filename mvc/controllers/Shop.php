<?php
class Shop extends Controller{
    public function default() {
        $this->viewFrontend([
            "page" => "shop"
        ]);
    }
}
?>
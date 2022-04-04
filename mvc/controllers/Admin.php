<?php
class Admin extends Controller{
    public function trangChu(){
        $this->view('/Admin/Admin_view');
    }
    public function userList(){
        $userMo = $this->model('UserModel');
        $productList = $userMo->listUser();
        $this->view('/Admin/Admin_List',[
            'productList'=>$productList
        ]);
    }
    public function deleteUser($id){
        if ((int)$id > 0){
            $userMo = $this->model('UserModel');
            $deleUser = $userMo->delUser($id);
            $deleUser = $userMo->listUser();
            $this->view('/Admin/Admin_List',[
                'userList'=>$deleUser
            ]);
        } else{
            $this->view('/404page');  
        }
    }
}
?>
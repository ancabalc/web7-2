<?php
require "../api/models/UsersModels.php";
class Users {
    
        public function updateUsers(){
         if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"])) {
             $_POST['image'] = '';
             if(isset($_FILES["image"])){
    $file=$_FILES["image"];
    move_uploaded_file($file["tmp_name"],  "uploads/".$file["name"]);
    $_POST['image'] = $file['name'];
}
                $usersModel = new UsersModel();
                $row = $usersModel->updateUsers($_POST);
                if ($row) {
                    $response = array("success"=>TRUE);  
                }
                else {
                   $response = array("error"=>"An error occured");        
                }
                return $response;
                } else {
                    $errors = array();
                    if(!isset($_POST["id"])) {
                        $erros ['id'] = 'Id is required';
                    }
                    if(!isset($_POST["name"])) {
                        $erros['name'] = 'Name is required';
                        
                    }
                    if(!isset($_POST["description"])) {
                        $erros['description'] = 'Description is required';
                        
                    }
                    $response = array("error"=>"An error occured",'messsage'=>$erros);   
                    return $response;
                }
    }
    
    public function listUsers () {
        $limit = empty($_GET['items']) ? 0 : $_GET['items'];
        $listUsersModel = new UsersModel();
        $response = $listUsersModel->listUsers($limit);
        return $response;
        
    }
    
}
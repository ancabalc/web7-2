<?php
require "../api/models/UsersModels.php";
class Users {
    public function updateUsers(){
         if (isset($_POST["id"])) {
            if (isset($_POST["name"]) || isset($_POST["description"]) || isset($_POST["image"])) {
                $usersModel = new UsersModel();
                $row = $usersModel->updateUsers($_POST);
                if ($row) {
                    $response = array("success"=>TRUE);  
                }
                else {
                   $response = array("error"=>"error");        
                }
                return $response;
                } 
            } 
    }
}
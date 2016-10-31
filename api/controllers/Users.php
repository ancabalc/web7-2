<?php
  require "models/UsersModels.php";
class Users {
<<<<<<< HEAD
    
        public function updateUsers(){
         if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"])) {
=======
    public function updateUsers(){
          $errors = array();
                  
         if (isset($_POST["id"])) {
               if(empty($_POST["id"])) {
                        $errors ['id'] = 'Id is required';
                    }
                    if(empty($_POST["name"])) {
                        $errors['name'] = 'Name is required';
                        
                    }
                    if(empty($_POST["description"])) {
                        $errors['description'] = 'Description is required';
                        
                    }
                    if(empty($_FILES["image"])){
                         $errors['image'] = 'Image is required';
                    }
            if(empty($errors)){
>>>>>>> 090d8e055b982e0adb1b87e8d02b8d22e6d4c60b
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
                    return $response;
                }
         
             }       
             
         }  
                else {
                   $response = array("error"=>"An error occured");  
                   return $response;
                }
                return array("errors" => $errors);

         }
    
    public function listUsers () {
        $limit = empty($_GET['items']) ? 0 : $_GET['items'];
        $listUsersModel = new UsersModel();
        $response = $listUsersModel->listUsers($limit);
        return $response;
        
    }
    
}
<?php
class Accounts {
    
    function create(){
        
        $errors = array();
     
            if (empty($_POST["name"])) {
                $errors["name"] = "Name is required";    
            }
            
            if (empty($_POST["email"])) {
                $errors["email"] = "Email is required";    
            }  elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  {
                $errors["email"] = "Email is invalid";
            }
            
            $patternPassword = '/^[a-z0-9$#_]{6,25}$/i';
            if (empty($_POST["password"])) {
                $errors["password"] = "Password is required";    
            }  elseif (!preg_match($patternPassword,$_POST["password"])) {
                $errors["password"] = "Password is invalid";    
            }  elseif (($_POST["password"]) !== ($_POST["repassword"])){
                $errors["password"] = "Passwords not the same"; 
            }
            
            if (($_POST["role"] !== "client") && ($_POST["role"] !== "provider")){
                $errors["role"] = "Choose a proper role";    
            }
            
            if (($_POST["role"] === "provider") && (empty($_POST["job"]))) {
                $errors["job"] = "Choose a job that you're providing";
            }
            
            if (empty($_POST["description"])) {
                $errors["description"] = "Description is required";    
            }
            
            if (isset($_FILES["file"])) {
                $file = $_FILES["file"];
                move_uploaded_file($file["tmp_name"],  "uploads/".$file["name"]);
                $_POST["image"] = $file["name"];
            } else {
                $errors["image"] = "Choose an image, please";
            }
            
            
            if (empty($errors)) {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                require "models/UsersModels.php";
                $usersModel = new UsersModel();
                $user = $usersModel->createUser($_POST);
                if ($user === 0) {
                    $errors["request"] = "Invalid request"; 
                } 
            }
        
        return array("errors" => $errors);
    }
    
    function login() {
        $errors = array();
        if (isset($_POST["email"])) {
            if (empty($_POST["email"])) {
                $errors["email"] = "Email is required";    
            }
            elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $errors["email"] = "Email is invalid";
            }
            $patternPassword = '/^[a-z0-9$#_]{5,15}$/i';
            if (empty($_POST["password"])) {
                $errors["password"] = "Password is required";    
            }
            elseif (!preg_match($patternPassword,$_POST["password"])) {
                $errors["password"] = "Password is invalid";
            }
            
            if (empty($errors)) {
                require "models/UsersModels.php";
                $usersModel = new UsersModel();
                $user = $usersModel->loginUser($_POST["email"]);
                
                if ($user === FALSE) {
                    $errors["invalid"] = "Invalid credentials";
                }
                elseif($password === FALSE){
                    $errors["invalid"] = "Invalid password";
                }
                else {
                    $_SESSION["isLogged"] = TRUE;
                    $_SESSION["user"] = $user;
                    return $user;
                }
            }
        }
        else {
            $errors["invalid"] = "Request invalid"; 
        }
        
        return array("errors" => $errors);
    }  
      
       function getProfileData() {
           $_SESSION["isLogged"] = true;
           $_SESSION["user"] = array('id'=>3);
            validate_request();
            require "models/UsersModels.php";
            $usersModel = new UsersModel();
            return array("logged"=>TRUE, "user" => $usersModel->getUsersById($_SESSION["user"]['id']));   

    }
}
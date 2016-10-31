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
            
            if (empty($errors)) {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                require "../api/models/UsersModels.php";
                $usersModel = new UsersModel();
                $user = $usersModel->createUser($_POST);
            }
        
        return array("errors" => $errors);
    }
    
    function login() {
        
      
    }
}
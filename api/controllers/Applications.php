<?php

require "models/ApplicationsModel.php";

class Applications {
    function create(){
        
        $errors = array();
        
        if (empty($_POST["title"])) {
            $errors["title"] = "Title is required";
        } 
        if (empty($_POST["description"])) {
            $errors["description"] = "Description is required";
        }
        if (empty($_POST["active"])) {
            $errors["active"] = "Active is required";
        }
        
        if(empty($errors)) {
            $applicationsModels = new ApplicationsModels();
            $applicationId = $applicationsModels->createApplications($_POST);
            if ($applicationId) {
                return ($_POST["title"]); 
                return ($_POST["description"]);
                return ($_POST["active"]);
            }
        } else {
            return $errors;
        }
        
    }
     
    function listApplications() {
     
        
            $applicationsModel = new ApplicationsModel();
            $response = $applicationsModel->getAll($_GET);
            return $response;
        
        }  
}
      
    

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
            $applicationsModels = new ApplicationsModel();
            $id = $applicationsModels->createApplications($_POST);
            if ($id) {
                return array("id" => $id);
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
        
    function search() {
        if (isset($_GET["value"])) {
            $applicationsModel = new ApplicationsModel();
            $response = $applicationsModel->search($_GET["value"]);
            return $response;
        } 
    }    
    }  
      
    

<?php

require "models/ApplicationsModel.php";

class Applications {
    function create(){
        $applicationsModels = new ApplicationsModels();
        return $applicationsModels->createApplications();
    }
    function validateApplications() {
        $appTitle = mysql_query("SELECT title FROM applications WHERE id = 1");
        $result = mysql_fetch_array($appTitle);
        
        $appDescription = mysql_query("SELECT description FROM applications WHERE id = 1");
        $result = mysql_fetch_array($appDescription);
        
        echo $result['appTitle'];
        echo $result['appDescription'];
    }
    function listApplications() {
     
        if (isset($_GET["id"])) {
            $applicationsModel = new ApplicationsModel();
            $response = $applicationsModel->getAll($_GET["id"]);
            return $response;
        } 
        }  
}
      
    

<?php

<<<<<<< HEAD
require "models/ApplicationsModel.php";


class Applications {
    
    
=======
require "api/models/ApplicationsModels.php";

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
>>>>>>> 46eb4a0e6abc181ec05aef407fc28f93ff734d66
    function listApplications() {
     
        if (isset($_GET["id"])) {
            $applicationsModel = new ApplicationsModel();
            $response = $applicationsModel->getAll($_GET["id"]);
            return $response;
        } 
        }  
}
      
    

<?php

require "models/ApplicationsModel.php";


class Applications {
    
    
    function listApplications() {
     
        if (isset($_GET["id"])) {
            $applicationsModel = new ApplicationsModel();
            $response = $applicationsModel->getAll($_GET["id"]);
            return $response;
        } 
        }  
}
      
    

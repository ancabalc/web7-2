<?php

require "models/OffersModel.php";

class Offers {
    function createOffers() {
        //  $response = validate_request();
        //  if ($response['error']) return $response;
        
         if (!empty($_POST["description"])){
           $offersModel = new OffersModel();
           $id = $offersModel -> createOffers($_POST);
           return array("id" =>$id);
           
       }
    }
    function listOffers() {
        $offersModel = new OffersModel();
        $offers = $offersModel -> getAll();
        return $offersModel->getAll();
    }
}
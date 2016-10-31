<?php

require "models/OffersModel.php";

class Offers {
    function createOffers() {
        //  $response = validate_request();
        //  if ($response['error']) return $response;
        
         $errors = array();
            if (empty($_POST["description"])) {
                $errors["description"] = " Add a description to your offer!";   
            };
            if (empty($_POST["application_id"])) {
                $errors["application_id"] = " Application Id is invalid";   
            };
            if (empty($_POST["user_id"])) {
                $errors["user_id"] = " User Id invalid";   
            };
            if (empty($errors)) {
                $offersModel = new OffersModel();
                $id = $offersModel -> createOffers($_POST);
                return array("id" =>$id);
           }
       return array("errors" => $errors);
    }
    function listOffers() {
        $offersModel = new OffersModel();
        $offers = $offersModel -> getAll();
        return $offersModel->getAll();
    }
}
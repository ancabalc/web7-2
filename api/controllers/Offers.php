<?php

require "models/OffersModel.php";

class Offers {
    function createOffer() {
        //  $response = validate_request();
        //  if ($response['error']) return $response;
        // echo "here";
        // die();
        $errors = array();
            if (empty($_POST["description"])) {
                $errors["description"] = " Add a description to your offer!";   
            };
            if (empty($_POST["application_id"])) {
                $errors["application_id"] = " Application Id is invalid";   
            };
            $_POST['user_id'] ="1";
            //$_POST['user_id'] = $_SESSION['user']['id'];
            //echo 'here';

            if (empty($errors)) {
                $offersModel = new OffersModel();
                $id = $offersModel -> createOffer($_POST);
                
                return array("id" =>$id);
           }
       return array("errors" => $errors);
    }
    
    function listOffers() {
        $offersModel = new OffersModel();
        $offers = $offersModel->getOffersById($_GET['id']);
        return $offers;
        
    }
    
        function deleteOffer($id){
        $params = [':id' => $id];
        $sql = 'DELETE from offers WHERE id=:id';
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        
        return $sth->rowCount();
        
    }
}
 ?>
<?php

require "models/OffersModel.php";

class Offers {
    function createOffer() {

        
         if (!empty($_POST["description"])){
           $offersModel = new OffersModel();
           $id = $offersModel -> createOffer($_POST);
           return array("id" =>$id);
           
       }
    }
    function listOffers() {
        $offersModel = new OffersModel();
        $offers = $offersModel -> getAll();
        return $offersModel->getAll();
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
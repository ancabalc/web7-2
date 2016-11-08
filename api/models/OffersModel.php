<?php

require_once "db.php";

class OffersModel extends DB {
    function createOffer($item) {
       $params = [':user_id' => $item["user_id"],
                  ':application_id' => $item["application_id"],
                  ':description' => $item["description"]];

        $sql = 'INSERT INTO offers(user_id, application_id, description) 
                             VALUES(:user_id , :application_id , :description)';
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
       
        return $this->dbh->lastInsertId();
    } 
    
    function deleteOffer(){
           
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $offerssModel = new OffersModel();
            $id = $offersModel->deleteOffer($_GET["id"]);
            
            if ($id == 0) {
                $response = array("error"=>"Offer not found");    
            }
            else {
                $response = array("success"=>TRUE);         
            }
            return $response;
        }
     }
     
     function listOffers(){
        $sql = "SELECT * FROM offers WHERE application_id=:application_id'";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
       
        return $sth->fetchAll(PDO::FETCH_ASSOC);  
     }
    
}
?>
<?php

// require "models/OffersModel.php";

// class Offers {
//     function addOffer() {
//         if (!empty($_POST["description"])){
//           $offersModel = new OffersModel();
//           $id = $offersModel -> addOffer($_POST);
//           return array("id" =>$id);
           
//       }
//     }
//     function listOffers() {
//         $offersModel = new OffersModel();
//         $offers = $offersModel -> getAllOffers();
//         return $offersModel->getAllOffers();
//     }
    
// 
    
    
// }
//



require "models/OffersModel.php";

class Offers {
    function createOffer() {
        //  $response = validate_request();
        //  if ($response['error']) return $response;
        
         $errors = array();
            if (empty($_POST["description"])) {
                $errors["description"] = " Add a description to your offer!";   
            };
            if (empty($_POST["application_id"])) {
                $errors["application_id"] = " Application Id is invalid";   
            };
            $_POST['user_id'] = $_SESSIO['user']['id'];

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
<?php

// 


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
    
    function getOffersById($id) {
        $sql = 'SELECT * FROM offers WHERE application_id=1 ' . $id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchALL(PDO::FETCH_ASSOC);
    }
    
}
?>
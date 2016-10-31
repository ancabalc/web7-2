<?php 
require_once "db.php";

class ApplicationsModels extends DB {
    function createApplications(){
        $sql = "SELECT * FROM applications WHERE id = 1";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
       
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
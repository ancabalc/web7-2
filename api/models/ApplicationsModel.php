<?php 
require_once "db.php";

class ApplicationsModel extends DB {
    function createApplications($item){
        $params = [':title' => $item["title"],
                    ':description' => $item["description"],
                    ':active' => $item["active"]];
        
        $sql = "INSERT INTO applications (`title`, `description`, `active`) Values (:title, :description, :active) ";
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
       
        return $this->dbh->lastInsertId();
    }
    
    function getAll() {
        $sql = 'SELECT title, description, creation_date FROM applications';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
       
        return $sth->fetchAll(PDO::FETCH_ASSOC);   
    }
    
    function getApplicationsById($id) {
        $sql = "select * from applications where id=" . $id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
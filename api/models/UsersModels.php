<?php
require_once "db.php";
class UsersModel extends DB{
       function createUser(){
        
    }
      function updateUsers($data) {
        $params = [':id' => $data["id"],
                    ':name' => $data["name"],
                    ':description' => $data["description"]];
        
        $sql = 'UPDATE users SET name=:name, description=:description  where id=:id';
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->rowCount(); 
    }
}
<?php
require_once "db.php";
class UsersModel extends DB{
       function createUser(){
        
    }
      function updateUsers($data) {
        $params = [':id' => $data["id"],
                    ':name' => $data["name"],
                    ':description' => $data["description"],
                    ':image' => $data['image']];
        
        $sql = 'UPDATE users SET name=:name, description=:description, image=:image where id=:id';
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params); 
    }
}
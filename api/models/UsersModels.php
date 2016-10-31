<?php
require "db.php";
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
    
    
      function listUsers() {
        $sql = "SELECT name, description, image FROM users";
        $sth = $this ->dbh -> prepare($sql);
        $sth -> execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
      }

    function loginUser($email) {
        
        $params = [':email' => $email];

        $sql = 'SELECT * FROM users WHERE email = :email';
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
       
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    }
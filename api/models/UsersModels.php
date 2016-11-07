<?php
require "db.php";
class UsersModel extends DB{

      function createUser($user){
        $params = [':name' => $user["name"],
                    ':email' => $user["email"],
                    ':password' => $user["password"],
                    ':role' => $user["role"]];
        $sql = 'INSERT INTO users(name, email, password, role) VALUES (:name, :email, :password, :role)';
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $this->dbh->lastInsertId();
    }
     function getUsersById($id) {
        $sql = "select * from users where id=" . $id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
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
    
    
      function listUsers($limit = 0) {
        $sql = 'SELECT name, description, image FROM users ORDER BY id DESC';
        if ($limit > 0) {
          $sql .= ' LIMIT ' . $limit;
        }
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
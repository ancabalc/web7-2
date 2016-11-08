<?php
require "db.php";
class UsersModel extends DB{
      function createUser($user){
        $params = [':name' => $user["name"],
                    ':email' => $user["email"],
                    ':password' => $user["password"],
                    ':role' => $user["role"],
                    ':job' => $user["job"],
                    ':description' => $user["description"],
                    ':image' => $user["image"]
                    ];
        $sql = 'INSERT INTO users(name, email, password, role, job, description, image) VALUES (:name, :email, :password, :role, :job, :description, :image)';
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
                    ':job' => $data["job"],
                    ':description' => $data["description"],
                    ':image' => $data['image']];
        
        $sql = 'UPDATE users SET name=:name, job=:job, description=:description, image=:image where id=:id';
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params); 
    }
    
    
      function listUsers() {
        $sql = "SELECT name, job, description, image FROM users WHERE role = 'provider' ORDER BY id DESC LIMIT 3";
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
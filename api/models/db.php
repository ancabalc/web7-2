<?php

class DB {
    protected $dbh;
    
    function __construct() {
        $db_host = getenv('IP');
        $db_name = 'webapp_services';
        $db_user = getenv('C9_USER');
        $db_pass = '';

        try {
         $this->dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, 
                          $db_user, 
                          $db_pass);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
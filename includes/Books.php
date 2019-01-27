<?php

require_once('connection.php');

class Book {

    private $conn;

    public function __construct() {
        $database = new Connection();
        $db = $database->openConnection();
        $this->conn = $db;
    }


    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    

}

?>
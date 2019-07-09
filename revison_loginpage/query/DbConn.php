<?php

abstract class DbConnection
{
    protected $CONN;
    public function __construct(){
        $this->createConnection();
    }

    public function __destruct(){
    }
    
    private function createConnection(){
        $mysqli = new mysqli("localhost", "karan", "kanu", "test");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        $this->CONN = $mysqli;
    }
}
?>
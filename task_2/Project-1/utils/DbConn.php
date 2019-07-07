<?php
class DbConn
{
     protected $conn;
     public function __construct(){
        //  echo "hi";
         $this->connection();
        }
        public function __destruct(){
            // echo "bye";
            $this->conn->close();
            
     }
    private function connection()
    {
        $mysqli = new mysqli("localhost", "karan", "kanu", "test");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            throw new Exception("connect_errno", 1);
            
        }
        $this->conn = $mysqli;
    }        
}  

?>
<?php
abstract class DbConnection
{
    public $CONN;
    public function __construct(){
        // echo "Hello";
        $this->CONN =null;
        $this->connection();
    }
    private function connection(){
        $conn = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_errno) {
            exit( "Failed to connect to MySQL: " . $conn->connect_error);
        }
        $this->CONN = $conn;
    }
    protected function foo(){
        echo " HI Karana";
    }
    static function bar(){
        echo " HI BAR";
    }
    public function __destruct(){
        // echo "Bye";
        $this->CONN->close();
    }

    
}
 ?>
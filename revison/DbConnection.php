<?php

class DbConnection
{
    private $CONN;
    public $RESULT;
    public function __construct(){
        echo "Hello";
        $this->createConn();
    }

    public function __destruct(){
        // echo "Bye";
        $this->CONN->close();
    }

    private function createConn(){
        $mysqli = new mysqli("localhost", "root", "", "test");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        // echo $mysqli->host_info . "\n";
        $this->CONN=$mysqli;
    }

    private function getResult(){
        $this->CONN->real_query("SELECT * FROM user ORDER BY id ASC");
        $res = $this->CONN->use_result();

        echo "Result set order...\n";
        while ($row = $res->fetch_assoc()) {
            // echo "<br/>";
            // echo " id = " . $row['id'] . "\n";
            // echo " username = " . $row['username'] . "\n";
            // echo " useremail = " . $row['useremail'] . "\n";
            // echo " userpassword = " . $row['userpassword'] . "\n";
            // echo "<br/>";
            $this->RESULT[]=$row;

        }
    }

    public function showResult(){
        $this->getResult();
        foreach ($this->RESULT as $key => $value) {
            echo "<tr>";
                echo "<td>" . $value['id'] . "</td>" ;
                echo "<td>" . $value['username'] . "</td>" ;
                echo "<td>" . $value['useremail'] . "</td>" ;
                echo "<td>" . $value['userpassword'] . "</td>" ;
                echo "<td> <button type='button' class='btn btn-primary'>Edit</button> </td>";
            echo "</tr>";
            }
    }
    
}

?>
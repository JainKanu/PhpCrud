<?php
//CREATE READ UPDATE DELETE
include("lib/constants.php");
include("lib/DbConnection.php");
class CRUD extends DbConnection
{
    public $data=[];
    private $res;
    private $query;
    public function __construct(){
        // echo "<br/>CRUD CONS <br/>";
        parent::__construct();
        // $this->foo();
        // $this->bar();
    }
    private function execQuery()
    {
        // $query = "SELECT * FROM offices";
        $this->res= $this->CONN->query($this->query);
        if (!$this->res) {
            exit( "Failed to run query: (" . $mysqli->errno . ") " . $mysqli->error);
        }
        $this->data["COUNT"] = $this->CONN->affected_rows;
    }
    public function getRecords($sql){
        $this->query = $sql;
        $this->execQuery();
        // $this->data["records"] = $this->res->fetch_assoc();
        if($this->data["COUNT"] > 0)
        while ($row = $this->res->fetch_assoc()) {
            $this->data["records"][] = $row;
        }
        $this->res->free_result();
    }
    public function __destruct(){
        // echo "<br/>CRUD DES <br/>";
        parent::__destruct();
    }


}

// echo NAME;
// $DB->connection();
// print_r($DB->CONN);

?>
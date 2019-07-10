<?php

include("DbConn.php");

class RunQuery extends DbConnection
{
    public $data = ["count"=>0,"records"=>[],"msg"=>""];
    public function __construct(){
        parent::__construct();
    }
    public function __destruct(){
        parent::__destruct();
    }

    public function selectQuery( $query = ""){
        if( $query !== ""){
            $res =  $this->CONN->query($query);
            $this->data["count"] = $res->num_rows;
        }
        if($this->data["count"] > 0){
            $this->data["records"] = $res->fetch_assoc();
            $this->data["msg"] = "Record founded";
        }
        else{
            $this->data["msg"] = "No User found";
        }
        $res->close();
    }
}
?>
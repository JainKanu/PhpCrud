<?php
    include("utils/DbConn.php");
    class RunQuery extends DbConn
    {
        public $data = ["count"=>0,"records"=>[],"msg"=>""];
        public function __construct()
        {
            parent::__construct();
        }
        public function __destruct()
        {
            parent::__destruct();
        }
        public function selectQuery( $query="" ){
            // $this->data["count"] = 0;
            // $this->data["records"] = [];
            // $this->data["msg"] = "";
            if($query !== "")
            {   
                // echo $query;
                $res =  $this->conn->query($query);
                $this->data["count"] = $res->num_rows;
                // print_r($res);
                if($this->data["count"] > 0){
                    $this->data["records"] = $res->fetch_assoc();
                    $this->data["msg"] = "Record founded";
                }
                else{
                    $this->data["msg"] = "No record found";
                }
                $res->close();
            }
            else {
                $this->data["msg"] = "No query founded";
            }
            
        }
    }
    
?>
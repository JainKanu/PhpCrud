<?php
    // header('Access-Control-Allow-Origin: *');  
    // header('Access-Control-Allow-Methods: GET, POST');

    // header("Access-Control-Allow-Headers: X-Requested-With");
    // header('Access-Control-Allow-Methods: POST');  

    // header('WWW-Authenticate: NTLM', false);
    header('Content-Type: application/json');
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        include("connection.php");
        class tableData extends DbConn
        {
            public $data;
            public function __construct()
            {
                parent::__construct();
            }
            public function __destruct()
            {
                parent::__destruct();
                unset($data);
            }
            public function getTableData()
            {

                $res = $this->CONN->query("SELECT `first_name`,`last_name`, `position`, `email`, `office` FROM datatables_demo");
                $this->data = $res->fetch_all();
                $res->close();
            }
        }
        $db = new tableData();
        $db->getTableData();
        echo json_encode($db->data);
    }
    else{
        $msg = ["error"=>"No page found"];
        echo json_encode($msg);
        // print/_r($msg);
    }
?>
<?php
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
            
      /*       while ($row = $res->fetch_array()) {
                print_r($row);
                die;
                $this->data[] = $row;
            } */
            $res->close();
        }
    }
    
?>
<?php
    class Login {
        private $msg = "";
        private $err = "";
        public function Login($x)
        {
          if(isset($x["msg"]))
            $this->msg = $x["msg"];
          if(isset($x["err"]))
            $this->err = $x["err"];
            $this->showMsgs();
            $this->showErrors();
        }
        public function __destruct()
        {
          unset($this->msg);
          unset($this->err);
        }
        public function showMsgs(){
          if($this->msg !== ""){
            switch ($this->msg) {
                case '0':
                    echo "<div class='alert alert-danger'> No Record Found   </div>";
                  break;
                
                case '1':
                    echo "<div class='alert alert-danger'> Record Founded   </div>";
                  break;
                
                case '2':
                    echo "<div class='alert alert-danger'> No query founded   </div>";
                  break;
                default:
                echo "<div class='alert alert-danger'> Shane chalak na ban   </div>";
                  break;
              }
            }
        }
        public function showErrors(){
          if($this->err !== ""){
            $err = json_decode($this->err);
            foreach ($err as $key => $value) {
              // print_r($key);
              echo "<div class='alert alert-danger'> ".  $value ."   </div>";
            }
          }
        }
    }
    
?>
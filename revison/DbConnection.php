<?php

class DbConnection
{
    private $CONN;
    public $Data;
    public function __construct(){
        // echo "Hello";
        $this->createConn();
    }

    public function __destruct(){
        // echo "Bye";
        $this->CONN->close();
    }
    
    private function createConn(){
        $mysqli = new mysqli("localhost", "karan", "kanu", "test");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        // echo $mysqli->host_info . "\n";
        $this->CONN=$mysqli;
    }

    private function getResult(){
        $this->CONN->real_query("SELECT * FROM user ORDER BY id ASC");
        $res = $this->CONN->use_result();
        $this->data["COUNT"] = $this->CONN->affected_rows;

        if($this->Data["COUNT"] > 0)
        $this->Data["records"] = null;
        while ($row = $res->fetch_assoc()) {
            $this->Data["records"][]=$row;
        }
    }

    public function editForm(){
        $this->getResult();
        $result = null;
        foreach ($this->Data["records"] as $key => $value) {
            if ($_GET["id"] == $value["id"]) {
                $result = $value;
            }
        }
        ?>
            <a class="btn btn-primary" href="?action=showTable">Show Table</a>

            <form action="?action=updateTable" method="post">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $result["username"] ?>" >
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email Address</label>
                    <input type="email" name="useremail" class="form-control" value="<?php echo $result["useremail"] ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="hidden" name="id" class="form-control" value="<?php echo $result["id"] ?>">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        <?php


    }
    
    public function updateTable(){
        $query = "UPDATE `user` SET `username` = '$_POST[username]', `useremail` = '$_POST[useremail]' WHERE `user`.`id` = '$_POST[id]'";
        $this->CONN->real_query($query);
        if($this->CONN->affected_rows == 1 ){
            
            echo "Update record succesfully";
        }
        else{
            echo "No Record Update";
        }
            $this->createTable();
        }

    public function deleteForm(){
        echo "Delete record succesfully";
        $query = "DELETE FROM `user` WHERE `user`.`id` = '$_GET[id]'";
        $this->CONN->real_query($query);     
        
        $this->createTable();
        
    }
    
    public function createRecord(){
        echo "Record Created";
        ?>
        <form action="?action=insertRecord" method="post">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" value="" class="form-control" placeholder="Enter Name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="useremail" value="" class="form-control" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" value="" name="password" class="form-control" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <?php
    }

    public function insertRecord(){
        $query = "INSERT INTO `user` (`id`, `username`, `useremail`, `userpassword`) VALUES (NULL, '".$_POST["username"]."', '".$_POST["useremail"]."', MD5('".$_POST["password"]."'))";
        $this->CONN->real_query($query);
        echo "Insert Record Succesfully";
        $this->createTable();
    }

    public function createTable(){
        $this->getResult();
        // print_r($this->Data["records"]);
        
        $Data = $this->Data["records"];
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Sr.</td>
                    <td>UserName</td>
                    <td>User Email</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
                    $str ="";
                    // print_r($Data);
                    for ($i=0; $i < count($Data) ; $i++) { 
                        // print_r($data[$i]);
                        $str .= "<tr>";
                        $str .= "<td>$i</td>";
                        $str .= "<td>{$Data[$i]["username"]}</td>";
                        $str .= "<td>{$Data[$i]["useremail"]}</td>";
                        $str .= "<td><a href='?action=edit&id={$Data[$i]['id']}' class='btn btn-primary '> Edit</a></td>";
                        $str .= "<td><a  href='?action=delete&id={$Data[$i]['id']}' class='btn btn-primary '> Delete</a></td>";
                        $str .= "</tr>";
                        // echo $str;
                    }
                    echo $str;
            ?>  
            </tbody>
        </table>
        <?php
                    echo "<a  href='?action=createRecord' class='btn btn-primary '> Create Record</a>";


    }
}

?>
<?php

include("DbConn.php");

class DbConnection extends DbConn
{   
    // public $CONN;
    public $Data;
    public function __conrcduct(){
        parent::__construct();        
    }

    public function __dercduct(){
        parent::__destruct();        
    }

    private function getRecord(){
        $this->CONN->real_query("SELECT * FROM user ORDER BY id ASC");
        $res = $this->CONN->use_result();
        $this->data["COUNT"] = $this->CONN->affected_rows;

        if($this->Data["COUNT"] > 0)
        $this->Data["records"] = null;
        while ($row = $res->fetch_assoc()) {
            $this->Data["records"][]=$row;
        }
    }

    public function editRecord(){
        $this->getRecord();
        
        $record = null;
        foreach ($this->Data["records"] as $key => $value) {
            if ($_GET["id"] == $value["id"]) {
                $record = $value;
            }
        }

        ?>
        <a class="btn btn-primary" href="?action=showTable">Show Table</a>

            <form action="?action=updateRecord" method="post">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $record["username"] ?>" placeholder="Enter Name">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="useremail" class="form-control" value="<?php echo $record["useremail"] ?>" placeholder="Enter email">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="Address" class="form-control" value="<?php echo $record["Address"] ?>" placeholder="Enter Address">
                    <small class="form-text text-muted">We'll never share your Address with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="City" class="form-control" value="<?php echo $record["City"] ?>" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="State" class="form-control" value="<?php echo $record["State"] ?>" placeholder="Enter State">
                </div>
                <div class="form-group">
                    <label>Contect No.</label>
                    <input type="tel" name="ContectNo" class="form-control" value="<?php echo $record["ContectNo"] ?>" placeholder="Enter Contect No.">
                </div>
                <input type="hidden" name="id" class="form-control" value="<?php echo $record["id"] ?>">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php
    }

    public function updateRecord(){
        $query = "UPDATE `user` SET `username`= '$_POST[username]', `useremail` = '$_POST[useremail]', `Address` = '$_POST[Address]', `City` = '$_POST[City]', `State` = '$_POST[State]', `ContectNo` = '$_POST[ContectNo]' WHERE `user`.`id` = '$_POST[id]'";

        // print_r($query);

        $this->CONN->real_query($query);
        if($this->CONN->affected_rows == 1 ){
            
            echo "Update record Succesfully";
        }
        else{
            echo "No Record Update";
        }
            $this->showTable();
        
    }

    public function DeleteRecord(){
        echo "Record Deleted Succesfully";

        $query = "DELETE FROM `user` WHERE `user`.`id` = '$_GET[id]'";

        $this->CONN->real_query($query);
        $this->showTable();
    }

    public function createRecord(){
        echo "create new record";
        ?>
        <a class="btn btn-primary" href="?action=showTable">Show Table</a>

            <form action="?action=insertRecord" method="post">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="" placeholder="Enter Name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="useremail" class="form-control" value="" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="Address" class="form-control" value="" placeholder="Enter Address">
                    <small class="form-text text-muted">We'll never share your Address with anyone else.</small>
            </div>
            <div class="form-group">
                    <label>City</label>
                    <input type="text" name="City" class="form-control" value="" placeholder="Enter City">
            </div>
            <div class="form-group">
                    <label>State</label>
                    <input type="text" name="State" class="form-control" value="" placeholder="Enter State">
            </div>
            <div class="form-group">
                    <label>Contect No.</label>
                    <input type="tel" name="ContectNo" class="form-control" value="" placeholder="Enter Contect No.">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            </form>

        <?php
    }

    public function insertRecord(){
        $query = "INSERT INTO `user` (`id`, `username`, `useremail`, `Address`, `City`, `State`, `ContectNo`, `userpassword`) VALUES (NULL, '".$_POST["username"]."', '".$_POST["useremail"]."', '".$_POST["Address"]."', '".$_POST["City"]."', '".$_POST["State"]."', '".$_POST["ContectNo"]."', MD5('".$_POST["password"]."'))";
        $this->CONN->real_query($query);

        echo "New Record Created Succesfully";

        $this->showTable();

    }

    public function showTable(){
        $this->getRecord();
        
        $Data = $this->Data["records"];
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>UserName</th>
                    <th>User Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Contect No.</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $rcd ="";
                    for ($i=0; $i < count($Data) ; $i++) { 

                        $rcd .= "<tr>";
                        $rcd .= "<td>$i</td>";
                        $rcd .= "<td>{$Data[$i]["username"]}</td>";
                        $rcd .= "<td>{$Data[$i]["useremail"]}</td>";
                        $rcd .= "<td>{$Data[$i]["Address"]}</td>";
                        $rcd .= "<td>{$Data[$i]["City"]}</td>";
                        $rcd .= "<td>{$Data[$i]["State"]}</td>";
                        $rcd .= "<td>{$Data[$i]["ContectNo"]}</td>";
                        $rcd .= "<td><a href='?action=editRecord&id={$Data[$i]['id']}' class='btn btn-primary '> Edit</a></td>";
                        $rcd .= "<td><a  href='?action=deleteRecord&id={$Data[$i]['id']}' class='btn btn-primary '> Delete</a></td>";
                        $rcd .= "</tr>";
                    }
                    echo $rcd;
            ?>  
            </tbody>
        </table>
        <?php

             echo "<a  href='?action=createRecord' class='btn btn-primary '> Create Record</a>";


    }

}

?>
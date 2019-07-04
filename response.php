<?php
    class response extends CRUD
    {
        public function __construct(){
            parent::__construct();
            $this->setRecords();
        }
        private function setRecords(){
            $query = "SELECT * FROM user ORDER by id ASC";
            $this->getRecords($query);
        }
        public function addRecord(){
            ?>
            <form>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                </form>
            <?php
        }
        public function createButton(){
            ?>
                <form name="newUser" action="?action=createRecord" method="post">
                    <!-- <a href="?create=true" type="button" class="btn btn-primary">Create User</a> -->
                    <input type="hidden" value="true" name="post" />
                    <input type="hidden" value="false" name="users" />
                    <button type="submit" value="true" name="create" class="btn btn-primary">Create User</button>
                </form>
            <?php
        }
        public function showUsers(){
            ?>
                <form name="newUser" method="post">
                    <!-- <a href="?create=true" type="button" class="btn btn-primary">Create User</a> -->
                    <input type="hidden" value="true" name="post" />
                    <input type="hidden" value="false" name="create" />
                    <button type="submit" value="true" name="users" class="btn btn-primary">Show Users</button>
                </form>
            <?php
        }
        public function filterData(){
            global $res;
            $result = null;
            // print_r($res->data["records"]);
            foreach ($res->data["records"] as $key => $value) {
                // print_r($key);
                if($value["id"]  === $_GET["id"] ){
                    $result = $value;
                }
            }
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            return $result;
        }
        public function createRecord(){
            echo '<a class="btn btn-primary" href="?action=showTable">Show Table</a>';
            ?>
               <form method="post" action="?action=insertRecord">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input name="username" value="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="useremail" value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input name="password" value="" type="password" class="form-control" id="Password" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            <?php
        }
        public function insertRecord(){
            // print_r($_POST);
            $sql = "INSERT INTO `user` (`id`, `username`, `useremail`, `userpassword`) VALUES (NULL, '".$_POST["username"]."', '".$_POST["useremail"]."', MD5('".$_POST["password"]."'));";
            // echo $sql;
            if(!$Res = $this->CONN->query($sql)){
                print_r($Res->errno );
            }
            // print_r($this->CONN);
            echo "Insert record succesfully";
            $this->setRecords();
            $this->createTable();
        }
        public function updateTable()
        {
            // print_r($_POST);
            $query = "UPDATE `user` SET `username` = '".$_POST["username"]."' ,`useremail` = '".$_POST["useremail"]."'  WHERE `id` = '".$_POST['id']."';";
            // echo $query; 
            if(!$Res = $this->CONN->query($query)){
                print_r($Res->errno );
            }
            // print_r($this->CONN);
            echo "Update record succesfully";
            $this->setRecords();
            $this->createTable();
        }
        public function showEditForm(){
            $filterData = $this->filterData();
            // echo "<pre>";
            // print_r($filterData);
            // echo "</pre>";
            if($filterData === null)
                {
                    echo "no record found";
                    return;
                }
            ?>
                <a class="btn btn-primary" href="?action=showTable">Show Table</a>
                <form method="post" action="?action=update">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input name="username" value="<?php echo $filterData['username'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="useremail" value="<?php echo $filterData['useremail'] ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $filterData["id"] ?>" />
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            <?php
        }
        public function deleteRow(){
            $query = "Delete from `user`  WHERE `id` = '".$_GET['id']."';";
            // echo $query; 
            if(!$Res = $this->CONN->query($query)){
                print_r($Res->errno );
            }
            // print_r($this->data);
            echo "Delete record succesfully";
            $this->setRecords();
            $this->createTable();
        }
        public function createTable(){
            $data = $this->data["records"];
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
                        for ($i=0; $i < count($data) ; $i++) { 
                            // print_r($data[$i]);
                            $str .= "<tr>";
                            $str .= "<td>$i</td>";
                            $str .= "<td>{$data[$i]["username"]}</td>";
                            $str .= "<td>{$data[$i]["useremail"]}</td>";
                            $str .= "<td><a href='?action=edit&id={$data[$i]['id']}' class='btn btn-primary '> Edit</a></td>";
                            $str .= "<td><a  href='?action=delete&id={$data[$i]['id']}' class='btn btn-primary '> Delete</a></td>";
                            $str .= "</tr>";
                            // echo $str;
                        }
                        echo $str;
                    ?>
                </tbody>
            </table>
    
    
            <?php
        }
    }
    
    
    ?>   

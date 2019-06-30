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
                <form name="newUser" method="post">
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
        public function createTable(){
            $data = $this->data["records"];
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>UserName</td>
                        <td>User Password</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $str ="";
                        for ($i=0; $i < count($data) ; $i++) { 
                            // print_r($data[$i]);
                            $str .= "<tr>";
                            $str .= "<td>{$data[$i]["id"]}</td>";
                            $str .= "<td>{$data[$i]["username"]}</td>";
                            $str .= "<td>{$data[$i]["userpassword"]}</td>";
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

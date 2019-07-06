<?php
    // $x = [ 1,3,4,5,6,7];
    $x = array(1,3,4,5,6,7);
/* 
    print_r($x);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.M.D") . "<br>";
    echo "Today is " . date("d-m-Y-l") . "<br>";
    echo "Today is " . date("l-d");
 */

// $age = ["result"=>[
//                     0=>["Username"=>"35", "email"=>"37", "id"=>"4"]
//                     ,1=>["Username"=>"35", "email"=>"37", "id"=>"3"]
//                     ,2=>["Username"=>"35", "email"=>"37", "id"=>"2"]
//                     ,3=>["Username"=>"35", "email"=>"37", "id"=>"1"]
//                     ,4=>["Username"=>"35", "email"=>"37", "id"=>"5"]
//                     ,5=>["Username"=>"35", "email"=>"37", "id"=>"6"]
//                     ,6=>["Username"=>"35", "email"=>"37", "id"=>"7"]
//                     ,7=>["Username"=>"35", "email"=>"37", "id"=>"8"]
//                     ],
//         "count"=>8
//         ];
$id = 35;
$age[] = ["Username"=>"35", "email"=>"37", "id"=>"31"];
$age[] = ["Username"=>"36", "email"=>"37", "id"=>"32"];
$age[] = ["Username"=>"39", "email"=>"37", "id"=>"35"];
$age[] = ["Username"=>"37", "email"=>"37", "id"=>"33"];
$age[] = ["Username"=>"38", "email"=>"37", "id"=>"34"];
$data["count"] = count($age);
$data["result"] = $age;
echo "<pre>";
// print_r($data["result"][0]["id"]);
// print_r($data["result"]);
echo "</pre>";

$result = null;
foreach($data["result"] as $key => $value) {
    // print_r( $key );
    
    if( $value["id"] == $id ){
        // print_r(  $value);
        // print_r(  $id);
        $result = $value;
        // echo "<br>";
    
    }
}
print_r($result);









public function editForm(){
    $this->getResult();
    // echo "Edit";
    // print_r($_GET["id"]);
    // print_r($this->Data["records"]);
    $result = null;
    foreach ($this->Data["records"] as $key => $value) {
        // print_r($value["id"]);
        if ($_GET["id"]==$value["id"]) {
        // print_r($value);
            $result = $value;
            
        }
    }
    // print_r($result["username"]);
    ?>
    <a class="btn btn-primary" href="?action=showTable">Show Table</a>
    <form action="?action=update" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" name="username" class="form-control" value="<?php echo $result["username"] ?>">
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
    // print_r($_POST);
    $query = "UPDATE `user` SET `username` = '$_POST[username]', `useremail` = '$_POST[useremail]' WHERE `user`.`id` = '$_POST[id]'";
    // print_r($query);
    $this->CONN->real_query($query);
    
    if($this->CONN->affected_rows == 1 ){
        
        echo "Update record succesfully";
    }
    else{
        echo "No Record Update";
    }
    $this->createTable();
}

?>

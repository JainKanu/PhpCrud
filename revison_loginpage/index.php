<?php

include("query/RunQuery.php");


$Db = new RunQuery();

$mypwd = md5($_POST["password"]);

$emp = [];

if ($_POST["username"] === "") {
    $emp["username"] = "please enter username";
}
if ($_POST["password"] === "") {
    $emp["userpassword"] = "please enter Password";
}
if (count($emp)) {
    header("Location:login.php?emp=".json_encode($emp));
    exit();
}


$qry = "SELECT id,username,useremail FROM user where username='$_POST[username]' and userpassword='$mypwd'";
$Db->selectQuery($qry);

if($Db->data["count"] === 0){
    header("Location:login.php?msg=".$Db->data["msg"]);
}
else{
    echo "Logged In Successfull";
    header("Location:blank.php");
}

?>
<?php
    include("utils/RunQuery.php");
    $DB = new RunQuery();
    $mypwd = md5($_POST["password"]);
    // $msg = list($_POST); 
    // print_r($msg);
    $err = [];
    if($_POST["username"] === ""){
        $err["username"] = "Please enter Username";
    }
    if($_POST["password"] === ""){
        $err["userpassword"] = "Please enter Password";
    }
    if(count($err)){
        
        header("Location:login.php?err=".json_encode($err)   );
        exit();
    }
    $sql = "SELECT id,username,useremail FROM user where username='$_POST[username]' and userpassword='$mypwd'";
    $DB->selectQuery($sql);
    
    // print_r($DB->data);
    // print_r($DB->conn);
    if($DB->data["count"] === 0){
        // exit($DB->data["msg"]);
        // $msg = $DB->data["msg"];
        header("Location:login.php?msg=".$DB->data["msg"]   );
    }
    else {
        echo "logged in successfull";
        print_r($DB->data);
    }
?>



<!-- login
    check
        records
            yes
                global session
                profile
            no
                login  --> 
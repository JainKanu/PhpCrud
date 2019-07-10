<?php
    include("utils/RunQuery.php");
    session_start();
    $_SESSION["login"] = false;
    $DB = new RunQuery();
    $mypwd = md5($_POST["password"]);
    // $msg = list($_POST); 
    // print_r($msg);
    $err = [];
    $querySting = "?err=0";
    if($_POST["username"] === ""){
        $err["username"] = "Please enter Username";
        // $querySting = "?err=1&username=1";
    }
    if($_POST["password"] === ""){
        $err["userpassword"] = "Please enter Password";
        // $querySting .= "?err=1&password=1";
    }
    if(count($err)){
        
        header("Location:login.php?err=".json_encode($err)   );
        exit();
    }
    $sql = "SELECT * FROM user where username='$_POST[username]' and userpassword='$mypwd'";
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
        $_SESSION["login"] = true;
        $_SESSION["profile"] = $DB->data["records"];
        // print_r($DB->data);
        header("Location:blank.php"   );
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
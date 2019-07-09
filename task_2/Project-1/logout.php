<?php
    echo " HI Logoubnt";
    session_start();
    session_destroy();
    // print_r($_SESSION);
    header("Location:login.php");
?>
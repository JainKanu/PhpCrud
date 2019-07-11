<?php


if(isset($_GET["page"]))
   switch ($_GET["page"]) {
     case 'Crud':
       require("crud/crud.php");
       exit();
       break;
     case 'Profile':
       require("Profile/Profile.php");
       exit();
       break;
   }


?>
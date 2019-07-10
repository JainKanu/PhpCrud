<?php


if(isset($_GET["page"]))
   switch ($_GET["page"]) {
     case 'crud':
       require("crud/crud.php");
       exit();
       break;
     case 'profile':
       require("Profile/Profile.php");
       exit();
       break;
   }


?>
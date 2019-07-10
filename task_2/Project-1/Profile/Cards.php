<?php


if(isset($_GET["action"])) 
switch ($_GET["action"]) {
    case 'changePhoto':
            changePhoto();
            exit();
        break;
    
    case 'address':
            address();
        break;
    
    default:
        # code...
        break;
}


?>
<?php

include("DbConnection.php");


$Db = new DbConnection();

// $Db->createConn();
// $Db->getResult();

// echo "<pre>";
// print_r($Db->RESULT);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">User Name</th>
      <th scope="col">user Email</th>
      <th scope="col">User Password</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
    // foreach ($Db->RESULT as $key => $value) {
    //     echo "<tr>";
    //         echo "<td>" . $value['id'] . "</td>" ;
    //         echo "<td>" . $value['username'] . "</td>" ;
    //         echo "<td>" . $value['useremail'] . "</td>" ;
    //         echo "<td>" . $value['userpassword'] . "</td>" ;
    //     echo "</tr>";
    //     }
      $Db->showResult();

    ?>
  </tbody>
  </table>  
  <button type="submit" class="btn btn-primary">Add User</button>  
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>
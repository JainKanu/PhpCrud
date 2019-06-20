<?php
$mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
    exit( "Failed to connect to MySQL: " . $mysqli->connect_error);
}
$res = $mysqli->query("SELECT * FROM user");
// $res = mysqli_query($mysqli, "SELECT 'Possible but bad style.' AS _msg FROM DUAL");
if (!$res) {
    exit( "Failed to run query: (" . $mysqli->errno . ") " . $mysqli->error);
}

if ($row = $res->fetch_assoc()) {
    print_r($row);
}
?>
<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "stm@mysql";
$db_name = "mysql";

$conn = new mysqli($db_host,$db_username,$db_pass, $db_name) or die ("Couldn't connect to MySQL");
mysqli_select_db($conn,$db_name) or die ("No database"); // no need as already included in previous function

//echo"Successful connection";
?>

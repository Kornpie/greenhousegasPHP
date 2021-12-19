<?php

$serverName = "localhost"; ##เชื่อมกับdatabase 
$userName = "root";
$userPassword = "";
$dbName = "db_emissions";

$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $userPassword); #เชื่อมกับdatabase ด้วย PDO

// if ($conn) {
//     echo "database connected.";
// } else {
//     echo "database connect failed";
// }

?>
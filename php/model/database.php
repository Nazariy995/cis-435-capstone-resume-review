<?php
$serverName = "cis435.ctap8z2rb4uu.us-east-1.rds.amazonaws.com";
$userName = "nazariy";
$password = "nazariyproject";
$database = "cis435_capstone";
$projectName = "project3";
$projectID = 2;

try {
    $db = new PDO('mysql:host='.$serverName.';dbname='.$database.';charset=utf8mb4', $userName, $password);
} catch(PDOException $ex){
    echo "An error occured while connection to the database!";
}
?>

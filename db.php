<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "librarydb";
$conn = new mysqli($server, $user, $pass, $dbname);

if(!$conn){
    echo "Not conencted: {$conn->connect_error}";
}else{
   
}
?>
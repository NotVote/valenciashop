<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tokoacc";

$connect = mysqli_connect($host, $username, $password, $database);
if (!$connect){
        die("Connection Failed:".mysqli_connect_error());
    }
    

   
?>
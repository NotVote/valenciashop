<?php
       $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "tokoacc";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
    
    date_default_timezone_set('Asia/Jakarta');  
?>
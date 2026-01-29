<?php
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "plaza_db";
    $conn = "";
    
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    if(!$conn){
    	die("Connection failed: ". mysql_connect_error());
    }

   
?>
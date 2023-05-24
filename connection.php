<?php
    
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "appointmentdb";

    $database= new mysqli( $dbhost, $dbuser, $dbpass, $db, "3307"); //add port number mine is 3307
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>
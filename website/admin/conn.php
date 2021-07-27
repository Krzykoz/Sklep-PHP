<?php
    $dbuser="root";
    $dbpass="";
    $dbhost="localhost";
    $dbname="mydb";

    $link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$link){
        echo "website under maintenence";
        exit;
    }
    else{
        session_start();
    }
?>
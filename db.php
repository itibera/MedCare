<?php
    $servername='localhost';
    // $username='dummy';
    // $password='dummy';
    $dbname = "medcare";
    $conn=mysqli_connect($servername, "root", "", "$dbname");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }

    define ('SITE_ROOT', realpath(dirname(__FILE__)));
?>
<?php
    //1.Create a database connection
    define("dbhost","localhost:8080");
    define("dbuser","root");
    define("dbpass","");
    define("dbname","watch_shop");
    $connection=mysqli_connect(dbhost,dbuser,dbpass,dbname);
    //Test if connection occured.
    if(mysqli_connect_errno()){
        die("Database connection failed:" . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
    //5. Disconnect the database
    if(isset($connection)){
    mysqli_close($connection);
    }
?>
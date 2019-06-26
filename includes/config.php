<?php
    ob_start(); //gets all the info before sending to server
    session_start();

    $timezone =  date_default_timezone_set("Africa/Harare");
    // $CurrentTime =time();
    // $DateTime= strftime("%D-%M-%Y %H-%M-%S" ,$CurrentTime);

    // $con = $DSN = 'mysql:host=localhost;dbname=slushious';
    // $ConnectingDB = new PDO($DSN, 'root', ''); //data source network
    $con = mysqli_connect("localhost", "root", "", "slushious"); // host - username - password - database name
    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_errno();
    }





?>
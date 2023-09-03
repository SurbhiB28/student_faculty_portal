<?php

    $serverName = "localhost:3308";
    $userName = "root";
    $password = "";
    $dbName = "portal";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>

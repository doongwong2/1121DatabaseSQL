<?php



$dbConnection = mysqli_connect("localhost","root","","database1121");

//$dbConnection = mysqli_connect("localhost","root","","database-project");


if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" . mysqli_connect_errno();
    exit();
}

// echo "Connected to MySQL:";

mysqli_set_charset($dbConnection, "utf8");

?>

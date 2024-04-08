<?php
include_once ('header.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $EMPID = $_POST["EMPID"];
    $NAME = $_POST["NAME"];
    $SSN = $_POST["SSN"];
    $PHONE = $_POST["PHONE"];
    $DATEJOINED = $_POST["DATEJOINED"];

}

mysqli_query($dbConnection,"INSERT INTO `employee` (
    `EMPID`,
    `NAME`,
    `SSN`,
    `DATEJOINED`,
    `PHONE`
    ) VALUES (
    '$EMPID',
    '$NAME',
    '$SSN',
    '".date('Y-m-d H:i:s')."',




    '$PHONE'
    
    )
    ");

 header("Location: editemployee.php");
 exit();

 include_once ('footer.php');
?>
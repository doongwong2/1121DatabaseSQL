<?php
/////////////////////////////////////////////////還沒加入判斷輸入是否爲空的功能
include "header.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $SupplierName = $_POST["SupplierName"];
    $SupplierID = $_POST["SupplierID"];
    $Contact = $_POST["Contact"];
    $Email = $_POST["Email"];
    echo "Email";
}

mysqli_query($dbConnection,"INSERT INTO `suppliers` (
    `SupplierName`,
    `SupplierID`,
    `Contact`,
    `Email`
    ) VALUES (
    '$SupplierName',
    '$SupplierID',
    '$Contact',
    '$Email'
    )
    ");

 header("Location: editsupplier.php");
 exit();


?>
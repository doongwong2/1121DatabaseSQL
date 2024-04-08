<?php
/////////////////////////////////////////////////還沒加入判斷輸入是否爲空的功能
include "header.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $SequenceNo = $_POST["SequenceNo"];
    $ItemName = $_POST["ItemName"];
    $ItemCode = $_POST["ItemCode"];
    $Dimension_cm = $_POST["Dimension_cm"];
    $SupplierID = $_POST["SupplierID"];
    //$DateAdded = $_POST["DateAdded"];
    $ExpiryDate = $_POST["ExpiryDate"];
    $Description = $_POST["Description"];
    echo "$Description";
}

mysqli_query($dbConnection,"INSERT INTO `inventory` (
    `SequenceNo`,
    `ItemName`,
    `ItemCode`,
    `Dimension_cm`,
    `SupplierID`,
    `DateAdded`,
    `ExpiryDate`,
    `Description`
    ) VALUES (
    '$SequenceNo',
    '$ItemName',
    '$ItemCode',
    '$Dimension_cm',
    '$SupplierID',
    '".date('Y-m-d H:i:s')."',
    '$ExpiryDate',
    '$Description'
    )
    ");

 header("Location: edit.php");
 exit();


?>
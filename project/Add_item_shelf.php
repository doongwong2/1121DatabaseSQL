<?php
/////////////////////////////////////////////////還沒加入判斷輸入是否爲空的功能
include "header.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $ItemCode = $_POST["ItemCode"];
    $ShelfNo = $_POST["ShelfNo"];
    $Quantity = $_POST["Quantity"];
    echo "$Quantity";
}


mysqli_query($dbConnection,"INSERT INTO `shelf` (
    `ItemCode`,
    `ShelfNo`,
    `Quantity`
    ) VALUES (
    '$ItemCode',
    '$ShelfNo',
    '$Quantity'
    )
    ");

 header("Location: editshelf.php");
 exit();


?>
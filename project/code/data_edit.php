<?php
include "header.php";
$edit_row = 0;
if($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['edit_row'])) {
        $edit_row=$_POST['edit_row'];
    } 
} 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $SequenceNo = $_POST["SequenceNo"];
    $ItemName = $_POST["ItemName"];
    $ItemCode = $_POST["ItemCode"];
    $Dimension_cm = $_POST["Dimension_cm"];
    $SupplierID = $_POST["SupplierID"];
    $DateAdded = $_POST["DateAdded"];
    $ExpiryDate = $_POST["ExpiryDate"];
    $Description = $_POST["Description"];
}

mysqli_query($dbConnection, "UPDATE `inventory` SET 
    `SequenceNo`='$SequenceNo',
    `ItemName`='$ItemName', 
    `ItemCode`='$ItemCode', 
    `Dimension_cm`='$Dimension_cm', 
    `SupplierID`='$SupplierID', 
    `DateAdded`='$DateAdded', 
    `ExpiryDate`='$ExpiryDate', 
    `Description`='$Description'  
    WHERE  `SequenceNo`='$edit_row'");
// echo "<h1>Successful</h1>";
////////////////////////////////////////////并沒有判斷更改成功與否,幾乎是一律當作成功

echo "<script>
        var form = document.createElement('form');
        form.action = 'edit1.php';

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'is_Success';
        input.value = '1';
        var input1 = document.createElement('input');
        input1.type = 'hidden';
        input1.name = 'message';
        input1.value = '$SequenceNo';
        
        form.appendChild(input1);
        form.appendChild(input);
        

        document.body.appendChild(form);

        form.submit();
      </script>";
echo "<script>window.history.back();</script>";
/////////////////////////////////////////////////////////////////
?>

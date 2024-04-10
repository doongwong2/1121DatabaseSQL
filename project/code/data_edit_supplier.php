<?php
include "header.php";
$edit_row = 0;
if($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['edit_row'])) {
        $edit_row=$_POST['edit_row'];
    } 
} 
if($_SERVER['REQUEST_METHOD']=="POST"){          
    $SupplierName = $_POST["SupplierName"];
    $SupplierID = $_POST["SupplierID"];
    $Contact = $_POST["Contact"];
    $Email = $_POST["Email"];
    // echo "$Description";
}

mysqli_query($dbConnection, "UPDATE `suppliers` SET 

    `SupplierName`='$SupplierName',
    `SupplierID`='$SupplierID', 
    `Contact`='$Contact', 
    `Email`='$Email'
    WHERE  `SupplierName`='$edit_row'");
// echo "<h1>Successful</h1>";
////////////////////////////////////////////并沒有判斷更改成功與否,幾乎是一律當作成功
echo "<script>
        var form = document.createElement('form');
        form.action = 'editsupplier3.php';

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'is_Success';
        input.value = '1';
        var input1 = document.createElement('input');
        input1.type = 'hidden';
        input1.name = 'message';
        input1.value = '$SupplierName';
        
        form.appendChild(input1);
        form.appendChild(input);
        

        document.body.appendChild(form);

        form.submit();
      </script>";
echo "<script>window.history.back();</script>";
/////////////////////////////////////////////////////////////////
?>

<?php
/////////////////////////////////////////////這裏還不確定有什麽問題，用看看吧
include "header.php";

if (isset($_GET['message'])) {
    $SupplierName_to_del = $_GET['message'];
    mysqli_query($dbConnection,"DELETE FROM `suppliers` WHERE  `SupplierName`='$SupplierName_to_del'");
    
} else {
    echo "Something error, cannot delete.";
}

header("Location: editsupplier.php");
exit();


?>
<?php
include "header.php";

if (isset($_GET['message'])) {
    $Emp_to_del = $_GET['message'];
    mysqli_query($dbConnection,"DELETE FROM `employee` WHERE  `EMPID`='$Emp_to_del'");
    
} else {
    echo "Something error, cannot delete.";
}

header("Location: editemployee.php");
exit();


?>

<?php 
include_once ('header.php');

?>

<body>
  <h1>Edit Suppliers</h1>
  <form method='post' action='Add_supplier.php'>
    <button id="submitBtn" >Add</button>
  </form>
  <?php
  $suppliersQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM suppliers");
  echo "<table>";
  echo "<tr>";
  while($suppliers=mysqli_fetch_assoc($suppliersQ)){
    // echo $suppliers['Field'];
    echo "<th>$suppliers[Field]</th>";
  }
  echo "</tr>";

  $suppliersQ=mysqli_query($dbConnection,"SELECT * FROM suppliers ORDER BY SupplierName,SupplierID,Contact,Email ASC");
  while($suppliersContent=mysqli_fetch_assoc($suppliersQ)){
    echo "<tr>";
    echo "<td>$suppliersContent[SupplierName]</td>";
    echo "<td><a href='editsupplier3.php?message=" . urlencode($suppliersContent['SupplierName']) . "'>$suppliersContent[SupplierID]</a></td>";
    echo "<td>$suppliersContent[Contact]</td>";
    echo "<td>$suppliersContent[Email]</td>";
    echo "<td><form method='post' action='del_item_supplier.php?message=$suppliersContent[SupplierName]'>
    <button id='submitBtn' >DEL</button>
    </form></td>";
    echo "</tr>";
    
  }
  echo "</table>";
?>

<?php 
include_once ('footer.php');
?>

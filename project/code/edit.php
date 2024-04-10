<?php 
include_once ('header.php');

?>

<body>
  <h1>Edit Inventory</h1>
  <form method='post' action='Add_item.php'>
    <button id="submitBtn" >Add</button>
  </form>
  <?php
  $inventoryQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM inventory");
  echo "<table>";
  echo "<tr>";
  while($inventory=mysqli_fetch_assoc($inventoryQ)){
    // echo $inventory['Field'];
    echo "<th>$inventory[Field]</th>";
  }
  echo "</tr>";

  $inventoryQ=mysqli_query($dbConnection,"SELECT * FROM inventory ORDER BY SequenceNo,ItemName,ItemCode,SupplierID,DateAdded,ExpiryDate ASC");
  while($inventoryContent=mysqli_fetch_assoc($inventoryQ)){
    echo "<tr>";
    echo "<td>$inventoryContent[SequenceNo]</td>";
    echo "<td><a href='edit1.php?message=" . urlencode($inventoryContent['SequenceNo']) . "'>$inventoryContent[ItemName]</a></td>";
    echo "<td>$inventoryContent[ItemCode]</td>";
    echo "<td>$inventoryContent[Dimension_cm]</td>";
    echo "<td>$inventoryContent[SupplierID]</td>";
    echo "<td>$inventoryContent[DateAdded]</td>";
    echo "<td>$inventoryContent[ExpiryDate]</td>";
    echo "<td>$inventoryContent[Description]</td>";
    echo "<td><form method='post' action='del_item.php?message=$inventoryContent[SequenceNo]'>
    <button id='submitBtn' >DEL</button>
    </form></td>";
    echo "</tr>";
    
  }
  echo "</table>";
?>

<?php 
include_once ('footer.php');
?>

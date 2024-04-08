<?php 
include_once ('header.php');
?>


<head>
    <nav>
        <ul class = "clientMenu">
            <li><a href = "edit.php">Edit inventory</a></li>

</ul>
</nav>
</head>

<body>
  <h1>Inventory</h1>
  <?php
  $inventoryQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM inventory");
  echo "<table>";
  echo "<tr>";
  while($inventory=mysqli_fetch_assoc($inventoryQ)){
    // echo $inventory['Field'];
    echo "<th>$inventory[Field]</th>";
  }
  echo "</tr>";

  $inventoryQ=mysqli_query($dbConnection,"SELECT * FROM inventory ORDER BY SequenceNo,ItemCode,SupplierID,DateAdded,ExpiryDate ASC");
  while($inventoryContent=mysqli_fetch_assoc($inventoryQ)){
    echo "<tr>";
    echo "<td>$inventoryContent[SequenceNo]</td>";
    echo "<td>$inventoryContent[ItemName]</td>";
    echo "<td>$inventoryContent[ItemCode]</td>";
    echo "<td>$inventoryContent[Dimension_cm]</td>";
    echo "<td>$inventoryContent[SupplierID]</td>";
    echo "<td>$inventoryContent[DateAdded]</td>";
    echo "<td>$inventoryContent[ExpiryDate]</td>";
    echo "<td>$inventoryContent[Description]</td>";
    echo "</tr>";
  }
  echo "</table>";
?>

<?php
include_once('footer.php')
?>
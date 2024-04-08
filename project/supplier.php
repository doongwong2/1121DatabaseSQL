<?php 
include_once ('header.php');
?>


<head>
    <nav>
        <ul class = "clientMenu">
            <li><a href = "editsupplier.php">Edit suppliers</a></li>

</ul>
</nav>
</head>

<body>
  <h1>Suppliers</h1>
  <?php
  $suppliersQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM suppliers");
  echo "<table>";
  echo "<tr>";
  while($suppliers=mysqli_fetch_assoc($suppliersQ)){
    // echo $supplier['Field'];
    echo "<th>$suppliers[Field]</th>";
  }
  echo "</tr>";

  $suppliersQ=mysqli_query($dbConnection,"SELECT * FROM suppliers ORDER BY SupplierName,SupplierID,Contact,Email ASC");
  while($suppliersContent=mysqli_fetch_assoc($suppliersQ)){
    echo "<tr>";
    echo "<td>$suppliersContent[SupplierName]</td>";
    echo "<td>$suppliersContent[SupplierID]</td>";
    echo "<td>$suppliersContent[Contact]</td>";
    echo "<td>$suppliersContent[Email]</td>";
    echo "</tr>";
  }
  echo "</table>";
?>

<?php
include_once('footer.php')
?>
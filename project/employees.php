<?php 
include_once ('header.php');

?>

<head>
    <nav>
        <ul class = "clientMenu">
            <li><a href = "editemployee.php">Edit Employees</a></li>

</ul>
</nav>
</head>

<body>
  <h1>Employees</h1>
  <?php
  $employeeQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM employee");
  echo "<table>";
  echo "<tr>";
  while($employee=mysqli_fetch_assoc($employeeQ)){
    // echo $inventory['Field'];
    echo "<th>$employee[Field]</th>";
  }
  echo "</tr>";

  $employeeQ=mysqli_query($dbConnection,"SELECT * FROM employee ORDER BY EMPID,NAME,SSN,PHONE,DATEJOINED ASC");
  while($employeeContent=mysqli_fetch_assoc($employeeQ)){
    echo "<tr>";
    echo "<td>$employeeContent[EMPID]</td>";
    echo "<td>$employeeContent[NAME]</td>";    
    echo "<td>$employeeContent[SSN]</td>";
    echo "<td>$employeeContent[PHONE]</td>";
    echo "<td>$employeeContent[DATEJOINED]</td>";
    echo "</tr>";
  }
  echo "</table>";
?>


<?php 
include_once ('footer.php');
?>
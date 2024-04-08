<?php 
include_once ('header.php');

?>

<body>
  <h1>Welcome to edit employee.</h1>
  <form method='post' action='Add_employee.php'>
    <button id="submitBtn" >Add</button>
  </form>
  <?php
  $employeeQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM employee");
  echo "<table>";
  echo "<tr>";
  while($employee=mysqli_fetch_assoc($employeeQ)){
    // echo $inventory['Field'];
    echo "<th>$employee[Field]</th>";
  }
  echo "</tr>";

  $employeeQ=mysqli_query($dbConnection,"SELECT * FROM employee ORDER BY EMPID, NAME, SSN, PHONE, DATEJOINED ASC");
  while($employeeContent=mysqli_fetch_assoc($employeeQ)){
    echo "<tr>";
    echo "<td>$employeeContent[EMPID]</td>";
    echo "<td><a href='edit_employee_update.php?message=" . urlencode($employeeContent['EMPID']) . "'>$employeeContent[NAME]</a></td>";
    echo "<td>$employeeContent[SSN]</td>";
    echo "<td>$employeeContent[PHONE]</td>";
    echo "<td>$employeeContent[DATEJOINED]</td>";
    echo "<td><form method='post' action='del_employee.php?message=$employeeContent[EMPID]'>
    <button id='submitBtn' >DEL</button>
    </form></td>";
    echo "</tr>";
    
  }
  echo "</table>";
?>
</body>
<?php 
include_once ('footer.php');
?>

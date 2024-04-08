<?php 
include_once ('header.php');
?>
  <h1>welcome to add employee page</h1>

  <IMG SRC="gangnamstyle.gif"></IMG>
</head>
<body>
<?php
    $employeeQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM employee");
    echo "<table>";
    echo "<tr>";
    while($employee=mysqli_fetch_assoc($employeeQ)){
    echo "<th>$employee[Field]</th>";
    }
    echo "</tr>";
    echo "<form id='changed_content' method='post' action='Add_employee_imp.php'>";
    echo "<tr>";
    
    echo "<td><input type='text' id='EMPID' name='EMPID' ></td>";
    echo "<td><input type='text' id='NAME' name='NAME'></td>";
    echo "<td><input type='text' id='SSN' name='SSN'></td>";
    echo "<td><input type='text' id='PHONE' name='PHONE'></td>";
    echo "<td><input type='text' id='DATEJOINED' name='DATEJOINED'></td>";
  echo "</tr>";
  echo "</table>";
?>
    <button id="submitBtn" onclick="submitForm_add()">Add</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
  if (isset($_GET['is_Success']) && $_GET['is_Success'] == '1') {
      echo "<h2>Success</h2>";
  } 
  else {
      echo "<h2>Not Successful</h2>";
  }
} 
else {
  echo "<h2>Invalid request method</h2>";
}
?>

<script>
    function submitForm_add() {
      // 獲取輸入框的值
      var form=document.getElementById('change_content');
      form.submit();
    }
  </script>


</body>



<?php 
include_once ('footer.php');
?>

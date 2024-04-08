<?php 
include_once ('header.php');
?>
  <h1>welcome to change employee page.</h1>

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
  $receivedData=urldecode($_GET["message"]);

  $selected_employee_Q=mysqli_query($dbConnection,"SELECT *  FROM employee WHERE EMPID='$receivedData'");  
  $selected_employee=mysqli_fetch_assoc($selected_employee_Q);
  echo "<form id='changed_content' method='post' action='data_edit_employee.php'>";
  echo "<tr>";
    echo "<td><input type='text' id='EMP' name='EMPID' value='$selected_employee[EMPID]'></td>";
    echo "<td><input type='text' id='NAME' name='NAME' value='$selected_employee[NAME]'></td>";
    echo "<td><input type='text' id='SSN' name='SSN' value='$selected_employee[SSN]'></td>";
    echo "<td><input type='text' id='PHONE' name='PHONE' value='$selected_employee[PHONE]'></td>";
    echo "<td><input type='text' id='DATEJOINED' name='DATEJOINED' value='$selected_employee[DATEJOINED]'></td>";
  echo "</tr>";
  echo "</table>";

  echo  "<button id='submitBtn' onclick='submitForm()'>Edit</button>";
echo "</form>";

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


echo "<script>
        var form = document.getElementById('changed_content');
        var input1 = document.createElement('input');
        input1.type = 'hidden';
        input1.name = 'edit_row';
        input1.value = '$receivedData';
        
        form.appendChild(input1);
        form.appendChild(input);
        

        document.body.appendChild(form);

        form.submit();
      </script>";
?>
    
</body>

<?php 
include_once ('footer.php');
?>
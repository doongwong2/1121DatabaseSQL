<?php 
include_once ('header.php');
////////////////////////////////////////////////////還缺delete，看是要加在這裏(用php while loop去做很多粒button)或data_edit(只需要做一個button就行)應該都可以
?>
  <h1>welcome to change something page</h1>

  <IMG SRC="gangnamstyle.gif"></IMG>
</head>
<body>
<?php
  $suppliersQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM suppliers");
  echo "<table>";
  echo "<tr>";
  while($suppliers=mysqli_fetch_assoc($suppliersQ)){
    // echo $inventory['Field'];
    echo "<th>$suppliers[Field]</th>";
  }
  echo "</tr>";
  $receivedData=urldecode($_GET["message"]);
  // echo $receivedData;

  $selected_suppliers_Q=mysqli_query($dbConnection,"SELECT *  FROM suppliers WHERE SupplierName='$receivedData'");
  $selected_suppliers=mysqli_fetch_assoc($selected_suppliers_Q);
  echo "<form id='changed_content' method='post' action='data_edit_supplier.php'>";
  echo "<tr>";
//////////////////////////////////////要改
    echo "<td><input type='text' id='SupplierName' name='SupplierName' value='$selected_suppliers[SupplierName]'></td>";
//////////////////////////////////////
    echo "<td><input type='text' id='SupplierID' name='SupplierID' value='$selected_suppliers[SupplierID]'></td>";
    echo "<td><input type='text' id='Contact' name='Contact' value='$selected_suppliers[Contact]'></td>";
    echo "<td><input type='text' id='Email' name='Email' value='$selected_suppliers[Email]'></td>";
  echo "</tr>";
  echo "</table>";

  echo "<button id='submitBtn' onclick='submitForm()'>Edit</button>";
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
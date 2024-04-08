<?php 
include_once ('header.php');
////////////////////////////////////////////////////還缺delete，看是要加在這裏(用php while loop去做很多粒button)或data_edit(只需要做一個button就行)應該都可以
////////////////////////////////////////////////////del已增加
?>
  <h1>welcome to change something page.</h1>

  <IMG SRC="gangnamstyle.gif"></IMG>
</head>
<body>
<?php
  $inventoryQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM inventory");
  echo "<table>";
  echo "<tr>";
  while($inventory=mysqli_fetch_assoc($inventoryQ)){
    // echo $inventory['Field'];
    echo "<th>$inventory[Field]</th>";
  }
  echo "</tr>";
  $receivedData=urldecode($_GET["message"]);
  // echo $receivedData;

  $selected_inventory_Q=mysqli_query($dbConnection,"SELECT *  FROM inventory WHERE SequenceNo=$receivedData");
  $selected_inventory=mysqli_fetch_assoc($selected_inventory_Q);
  echo "<form id='changed_content' method='post' action='data_edit.php'>";
  echo "<tr>";
//////////////////////////////////////要改
    echo "<td><input type='text' id='SequenceNo' name='SequenceNo' value='$selected_inventory[SequenceNo]'></td>";
//////////////////////////////////////
    echo "<td><input type='text' id='ItemName' name='ItemName' value='$selected_inventory[ItemName]'></td>";
    echo "<td><input type='text' id='ItemCode' name='ItemCode' value='$selected_inventory[ItemCode]'></td>";
    echo "<td><input type='text' id='Dimension_cm' name='Dimension_cm' value='$selected_inventory[Dimension_cm]'></td>";
    echo "<td><input type='text' id='SupplierID' name='SupplierID' value='$selected_inventory[SupplierID]'></td>";
    echo "<td><input type='text' id='DateAdded' name='DateAdded' value='$selected_inventory[DateAdded]'></td>";
    echo "<td><input type='text' id='ExpiryDate' name='ExpiryDate' value='$selected_inventory[ExpiryDate]'></td>";
    echo "<td><input type='text' id='Description' name='Description' value='$selected_inventory[Description]'></td>";
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
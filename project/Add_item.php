<?php 
include_once ('header.php');
////////////////////////////////////////////////////還缺delete，看是要加在這裏(用php while loop去做很多粒button)或data_edit(只需要做一個button就行)應該都可以
?>
  <h1>welcome to change something page</h1>

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
    echo "<form id='changed_content' method='post' action='Add_item_imp.php'>";
    echo "<tr>";
    
    echo "<td><input type='text' id='SequenceNo' name='SequenceNo' ></td>";
    echo "<td><input type='text' id='ItemName' name='ItemName'></td>";
    echo "<td><input type='text' id='ItemCode' name='ItemCode'></td>";
    echo "<td><input type='text' id='Dimension_cm' name='Dimension_cm'></td>";
    echo "<td><input type='text' id='SupplierID' name='SupplierID'></td>";
/////////////////////////////////////////////////時間輸入有問題，需要嚴格按照格式輸入
    echo "<td><input type='text' id='DateAdded' name='DateAdded'></td>";
    echo "<td><input type='text' id='ExpiryDate' name='ExpiryDate'></td>";
/////////////////////////////////////////////////不然會錯
    echo "<td><input type='text' id='Description' name='Description'></td>";
  echo "</tr>";
  echo "</table>";
?>
    <button id="submitBtn" onclick="submitForm_add()">Add</button>
</form>
<!-- <?php
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
?> -->

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
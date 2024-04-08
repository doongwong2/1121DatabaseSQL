<?php 
include_once ('header.php');
////////////////////////////////////////////////////還缺delete，看是要加在這裏(用php while loop去做很多粒button)或data_edit(只需要做一個button就行)應該都可以
?>
  <h1>welcome to change something page</h1>

  <IMG SRC="gangnamstyle.gif"></IMG>
</head>
<body>
<?php
    $shelfQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM shelf");
    echo "<table>";
    echo "<tr>";
    while($shelf=mysqli_fetch_assoc($shelfQ)){
    // echo $shelf['Field'];
    echo "<th>$shelf[Field]</th>";
    }
    echo "</tr>";
    echo "<form id='changed_content' method='post' action='Add_item_shelf.php'>";
    echo "<tr>";
    echo "<td><input type='text' id='ItemCode' name='ItemCode' ></td>";
    echo "<td><input type='text' id='ShelfNo' name='ShelfNo'></td>";
    echo "<td><input type='text' id='Quantity' name='Quantity'></td>";
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
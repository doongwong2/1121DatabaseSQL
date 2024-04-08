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
  $receivedData=urldecode($_GET["message"]);
  // echo $receivedData;

  $selected_shelf_Q=mysqli_query($dbConnection,"SELECT *  FROM shelf WHERE ItemCode='$receivedData'");
  $selected_shelf=mysqli_fetch_assoc($selected_shelf_Q);
  echo "<form id='changed_content' method='post' action='data_edit_shelf.php'>";
  echo "<tr>";
//////////////////////////////////////要改
    echo "<td><input type='text' id='ItemCode' name='ItemCode' value='$selected_shelf[ItemCode]'></td>";
//////////////////////////////////////
    echo "<td><input type='text' id='ShelfNo' name='ShelfNo' value='$selected_shelf[ShelfNo]'></td>";
    echo "<td><input type='text' id='Quantity' name='Quantity' value='$selected_shelf[Quantity]'></td>";
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

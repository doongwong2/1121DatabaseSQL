<?php 
include_once ('header.php');

?>

<body>
  <h1>Edit Shelf</h1>
  <form method='post' action='Add_shelf.php'>
    <button id="submitBtn" >Add</button>
  </form>
  <?php
  $shelfQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM shelf");
  echo "<table>";
  echo "<tr>";
  while($shelf=mysqli_fetch_assoc($shelfQ)){
    // echo $inventory['Field'];
    echo "<th>$shelf[Field]</th>";
  }
  echo "</tr>";

  $shelfQ=mysqli_query($dbConnection,"SELECT * FROM shelf ORDER BY ItemCode,ShelfNo,Quantity ASC");
  while($shelfContent=mysqli_fetch_assoc($shelfQ)){
    echo "<tr>";
    echo "<td>$shelfContent[ItemCode]</td>";
    echo "<td><a href='editshelf2.php?message=" . urlencode($shelfContent['ItemCode']) . "'>$shelfContent[ShelfNo]</a></td>";
    echo "<td>$shelfContent[Quantity]</td>";
    echo "<td><form method='post' action='del_item_shelf.php?message=$shelfContent[ItemCode]'>
    <button id='submitBtn' >DEL</button>
    </form></td>";
    echo "</tr>";
    
  }
  echo "</table>";
?>

<?php 
include_once ('footer.php');
?>

<?php 
include_once ('header.php');
?>


<head>
    <nav>
        <ul class = "clientMenu">
            <li><a href = "editshelf.php">Edit shelf</a></li>

</ul>
</nav>
</head>

<body>
  <h1>Shelf</h1>
  <?php
  $shelfQ=mysqli_query($dbConnection,"SHOW COLUMNS FROM shelf");
  echo "<table>";
  echo "<tr>";
  while($shelf=mysqli_fetch_assoc($shelfQ)){
    // echo $shelf['Field'];
    echo "<th>$shelf[Field]</th>";
  }
  echo "</tr>";

  $shelfQ=mysqli_query($dbConnection,"SELECT * FROM shelf ORDER BY ItemCode,ShelfNo,Quantity ASC");
  while($shelfContent=mysqli_fetch_assoc($shelfQ)){
    echo "<tr>";
    echo "<td>$shelfContent[ItemCode]</td>";
    echo "<td>$shelfContent[ShelfNo]</td>";
    echo "<td>$shelfContent[Quantity]</td>";
    echo "</tr>";
  }
  echo "</table>";
?>

<?php
include_once('footer.php')
?>
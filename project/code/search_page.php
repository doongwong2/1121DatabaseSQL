<?php
include "header.php";
echo "<h1>Search for something</h1>";

echo "<form method='post' action='search_page.php'>
  <h2>Search by SequenceNo:
  <input type='text' id='Search_SequenceNo' name='Search_SequenceNo'>
  <button id='submitBtn'>Enter</button></h2>
  
  <h2>Search by ItemCode:
  <input type='text' id='Search_ItemCode' name='Search_ItemCode'>
  <button id='submitBtn'>Enter</button></h2>

  <h2>Search by SupplierID:
  <input type='text' id='Search_SupplierID' name='Search_SupplierID'>
  <button id='submitBtn'>Enter</button></h2>
</form>";

$searching_sqNo=0;
$searching_SupplierID=0;
$searching_ItemCode=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Search_SequenceNo']) && $_POST['Search_SequenceNo'] != '') {
        $searching_sqNo=1;
        $search_sqN=$_POST['Search_SequenceNo'];
        $searching_SupplierID=0;
        $searching_ItemCode=0;
    } 
    else if (isset($_POST['Search_ItemCode']) && $_POST['Search_ItemCode'] != '') {
        $searching_ItemCode=1;
        $search_ItemCode=$_POST['Search_ItemCode'];
        $searching_sqNo=0;
        $searching_SupplierID=0;
    }
    else if (isset($_POST['Search_SupplierID']) && $_POST['Search_SupplierID'] != '') {
        $searching_SupplierID=1;
        $search_SupplierID=$_POST['Search_SupplierID'];
        $searching_sqNo=0;
        $searching_ItemCode=0;
    }
}



if($searching_sqNo){
    $searchQ = mysqli_query($dbConnection, "SELECT  
    inventory.SequenceNo,
    inventory.ItemName,
    shelf.ItemCode,
    shelf.Quantity,
    shelf.ShelfNo,
    suppliers.SupplierID,
    suppliers.SupplierName
    FROM inventory LEFT JOIN suppliers ON inventory.SupplierID = suppliers.SupplierID LEFT JOIN shelf ON shelf.ItemCode= inventory.ItemCode WHERE SequenceNo='$search_sqN' ");
    
    $search_result_count=mysqli_query($dbConnection, "SELECT COUNT(*) FROM inventory LEFT JOIN suppliers ON inventory.SupplierID = suppliers.SupplierID LEFT JOIN shelf ON shelf.ItemCode= inventory.ItemCode WHERE SequenceNo='$search_sqN' ");
    if (!$searchQ) {
        // 输出错误信息
        echo "Error: " . mysqli_error($dbConnection);
    } else {
        $search_count=mysqli_fetch_assoc($search_result_count);
        echo "<h2>Total {$search_count['COUNT(*)']} results found.</h2>";
        echo "<table>";
        echo "<tr>";

        // 获取列的数量
        $numColumns = mysqli_num_fields($searchQ);

        // 循环获取每一列的列名
        for ($i = 0; $i < $numColumns; $i++) {
            $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
            echo "<th>{$columnInfo->name}</th>";
        }


        echo "</tr>";

        // 输出查询结果
        while ($search = mysqli_fetch_assoc($searchQ)) {
            echo "<tr>";
            for ($i = 0; $i < $numColumns; $i++) {
                $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
                if($columnInfo->name=="ItemName"){
                    if($search[$columnInfo->name])
                    {
                        echo "<td><a href='edit1.php?message=" . urlencode($search["SequenceNo"]) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="SupplierName"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editsupplier3.php?message=" . urlencode($search['SupplierName']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="ShelfNo"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editshelf2.php?message=" . urlencode($search['ItemCode']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else{
                    if($search[$columnInfo->name]){
                        echo "<td>{$search[$columnInfo->name]}</td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    };
}
else if($searching_ItemCode){
    $searchQ = mysqli_query($dbConnection, "SELECT
    inventory.SequenceNo,
    inventory.ItemName,
    shelf.ItemCode,
    shelf.Quantity,
    shelf.ShelfNo,
    suppliers.SupplierID,
    suppliers.SupplierName
    FROM shelf LEFT JOIN inventory ON shelf.ItemCode = inventory.ItemCode LEFT JOIN suppliers ON inventory.SupplierID= suppliers.SupplierID WHERE shelf.ItemCode='$search_ItemCode' ");
    $search_result_count=mysqli_query($dbConnection, "SELECT COUNT(*) FROM shelf LEFT JOIN inventory ON shelf.ItemCode = inventory.ItemCode LEFT JOIN suppliers ON inventory.SupplierID= suppliers.SupplierID WHERE shelf.ItemCode='$search_ItemCode' ");
    if (!$searchQ) {
        // 输出错误信息
        echo "Error: " . mysqli_error($dbConnection);
    } else {
        $search_count=mysqli_fetch_assoc($search_result_count);
        echo "<h2>Total {$search_count['COUNT(*)']} results found.</h2>";
        echo "<table>";
        echo "<tr>";

        // 获取列的数量
        $numColumns = mysqli_num_fields($searchQ);

        // 循环获取每一列的列名
        for ($i = 0; $i < $numColumns; $i++) {
            $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
            echo "<th>{$columnInfo->name}</th>";
        }

        echo "</tr>";

        // 输出查询结果
        while ($search = mysqli_fetch_assoc($searchQ)) {
            echo "<tr>";
            for ($i = 0; $i < $numColumns; $i++) {
                $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
                if($columnInfo->name=="ItemName"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='edit1.php?message=" . urlencode($search["SequenceNo"]) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="SupplierName"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editsupplier3.php?message=" . urlencode($search['SupplierName']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="ShelfNo"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editshelf2.php?message=" . urlencode($search['ItemCode']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else{
                    if($search[$columnInfo->name]){
                        echo "<td>{$search[$columnInfo->name]}</td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    };
}
else if($searching_SupplierID){
    $searchQ = mysqli_query($dbConnection, "SELECT
    inventory.SequenceNo,
    inventory.ItemName,
    shelf.ItemCode,
    shelf.Quantity,
    shelf.ShelfNo,
    suppliers.SupplierID,
    suppliers.SupplierName 
    FROM suppliers LEFT JOIN inventory ON suppliers.SupplierID = inventory.SupplierID LEFT JOIN shelf ON inventory.ItemCode = shelf.ItemCode WHERE suppliers.SupplierID='$search_SupplierID' ");
    
    $search_result_count=mysqli_query($dbConnection, "SELECT COUNT(*) FROM suppliers LEFT JOIN inventory ON suppliers.SupplierID = inventory.SupplierID LEFT JOIN shelf ON inventory.ItemCode = shelf.ItemCode WHERE suppliers.SupplierID='$search_SupplierID' ");
    if (!$searchQ) {
        // 输出错误信息
        echo "Error: " . mysqli_error($dbConnection);
    } else {
        $search_count=mysqli_fetch_assoc($search_result_count);
        echo "<h2>Total {$search_count['COUNT(*)']} results found.</h2>";
        echo "<table>";
        echo "<tr>";

        // 获取列的数量
        $numColumns = mysqli_num_fields($searchQ);

        // 循环获取每一列的列名
        for ($i = 0; $i < $numColumns; $i++) {
            $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
            echo "<th>{$columnInfo->name}</th>";
        }

        echo "</tr>";

        // 输出查询结果
        while ($search = mysqli_fetch_assoc($searchQ)) {
            echo "<tr>";
            for ($i = 0; $i < $numColumns; $i++) {
                $columnInfo = mysqli_fetch_field_direct($searchQ, $i);
                if($columnInfo->name=="ItemName"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='edit1.php?message=" . urlencode($search["SequenceNo"]) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="SupplierName"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editsupplier3.php?message=" . urlencode($search['SupplierName']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else if($columnInfo->name=="ShelfNo"){
                    if($search[$columnInfo->name]){
                        echo "<td><a href='editshelf2.php?message=" . urlencode($search['ItemCode']) . "'>{$search[$columnInfo->name]}</a></td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
                else{
                    if($search[$columnInfo->name]){
                        echo "<td>{$search[$columnInfo->name]}</td>";
                    }
                    else{
                        echo "<td>-</td>";
                    }
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    };
}

?>

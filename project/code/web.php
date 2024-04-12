<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .inputs {
      display: flex;
      margin: 20px;
    }

    .left-inputs,
    .right-inputs {
      margin-right: 20px;
    }

    input {
      width: 100px;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    table {
      border-collapse: collapse;
      width: 60%;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 15px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    #submitBtn {
      width: 100px;
      padding: 10px;
      margin-top: 20px;
      cursor: pointer;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .price-input {
      display: flex;
      align-items: center;
    }

    .price-input label {
      margin-right: 10px;
    }

    .size-inputs {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }

    .size-inputs label {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="inputs">
    <div class="left-inputs">
      <label for="itfNumber">ITF編號:</label>
      <input type="text" id="itfNumber">
      <br>
      <label for="productNumber">商品編號:</label>
      <input type="text" id="productNumber">
      <br>
      <label for="productLocation">商品儲位:</label>
      <input type="text" id="productLocation">
    </div>

    <div class="right-inputs">
      <label for="expirationDate">商品有效期:</label>
      <input type="text" id="expirationDate">
      <br>
      <div class="size-inputs">
        <label for="productSize">商品大小:</label>
        <input type="number" id="productWidth">
	  <label for="productSize">*W</label>
        <input type="number" id="productLength">
	  <label for="productSize">*L</label>
        <input type="number" id="productHeight">
	  <label for="productSize">*H</label>
      </div>
    </div>
  </div>
  <form method='post' action='web.php'>
    <button id="submitBtn" onclick="submitForm()">提交</button>
  </form>





<?php
if(isset($_POST['submitBtn'])){
  echo "This button is clicked.\n";
}




?>







  <table>
    <tr>
      <th>表頭1</th>
      <th>表頭2</th>
      <th>表頭3</th>
	    <th>表頭4</th>
	    <th>表頭5</th>
    </tr>
    <tr>
      <td>資料1</td>
      <td>資料2</td>
      <td>資料3</td>
	<td>資料4</td>
	<td>資料5</td>
    </tr>
    <!-- 可以繼續添加更多的表格行 -->
  </table>

  <script>
    function submitForm() {
      // 獲取輸入框的值
      var itfNumberValue = document.getElementById("itfNumber").value;
      var productNumberValue = document.getElementById("productNumber").value;
      var productLocationValue = document.getElementById("productLocation").value;
      var expirationDateValue = document.getElementById("expirationDate").value;
      var productSize1Value = document.getElementById("productSize1").value;
      var productSize2Value = document.getElementById("productSize2").value;
      var productSize3Value = document.getElementById("productSize3").value;

      // 在這裡添加提交表單的相應邏輯，可以使用這些值進行處理
      alert("表單已提交！\nITF編號: " + itfNumberValue + "\n商品編號: " + productNumberValue +
        "\n商品儲位: " + productLocationValue + "\n商品有效期: " + expirationDateValue +
        "\n商品大小1: " + productSize1Value + "\n商品大小2: " + productSize2Value +
        "\n商品大小3: " + productSize3Value);
    }
  </script>

</body>
</html>

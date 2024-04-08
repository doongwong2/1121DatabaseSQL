<?php
include_once('dbConnect.php');
  ?>

<!DOCTYPE html>
<html lang = "en">

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
    nav {
      background-color: #333;
      color: white;
      padding: 10px;
    }

    .clientMenu {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: space-around;
    }

    .clientMenu li {
      margin: 0;
    }

    .clientMenu a {
      text-decoration: none;
      color: white;
      padding: 10px;
      display: block;
      transition: background-color 0.3s;
    }

    .clientMenu a:hover {
      background-color: #555;
    }
  </style>
  <title>Warehouse</title>
</head>

<body>
    <nav>
        <ul class = "clientMenu">
            <li><a href = "/">Home</a></li>
            <li><a href = "/about.php">About us</a></li>
            <li><a href = "/inventory.php">Inventory</a></li>
            <li><a href = "/shelf.php">Shelf</a></li>
            <li><a href = "/supplier.php">Supplier</a></li>
            <li><a href = "/employees.php">Employees</a></li>
            <li><a href = "/search_page.php">Search</a></li>
</ul>
</nav>
</body>
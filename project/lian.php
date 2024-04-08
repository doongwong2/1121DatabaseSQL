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
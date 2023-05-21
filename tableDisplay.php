<!DOCTYPE html>
<html>
<head>
  <title>Information Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    table, th, td {
      border: 1px solid #ccc;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #f2f2f2;
    }
    button {
	background-color: #4CAF50;
	color: white;
	padding: 10px 20px;
	font-size: 16px;
	border: none;
	cursor: pointer;
  }
  
  button:hover {
	background-color: #45a049;
  }
  header {
    text-align: center;
  }
  h1 {
    text-align: center;
  }
  </style>
</head>
<body>
    <header>
        <button onclick="window.location.href='home.php'">Back to Calculator</button>
    </header>
    

  <h1>Information Table</h1>
  
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Number 1</th>
        <th>Number 2</th>
        <th>Number 3</th>
        <th>Date of Entry</th>
      </tr>
    </thead>
    <tbody>
      <!-- Insert rows of data here -->
      <tr>
        <td>John Doe</td>
        <td>10</td>
        <td>20</td>
        <td>30</td>
        <td>2023-05-14</td>
      </tr>
      <tr>
        <td>Jane Smith</td>
        <td>15</td>
        <td>25</td>
        <td>35</td>
        <td>2023-05-15</td>
      </tr>
    </tbody>
  </table>
</body>
</html>

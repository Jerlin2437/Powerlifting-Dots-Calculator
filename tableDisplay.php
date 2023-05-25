

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, "myDB");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "CREATE Table if not exists listOfDots (
  fullName varchar(50),
  total float,
  bodyWeight float,
  gender varchar(10),
  dots float,
  kgs varchar(4)
  )";
  $conn->query($sql);

$sql = "SELECT * FROM listOfDots";

// Execute the query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Total</th>";
  echo "<th>Bodyweight</th>";
  echo "<th>Gender</th>";
  echo "<th>Dots</th>";
  echo "<th>Type</th>";
  echo "</tr>";

  // Output data of each row
  while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["fullName"] . "</td>";
      echo "<td>" . $row["total"] . "</td>";
      echo "<td>" . $row["bodyWeight"] . "</td>";
      echo "<td>" . $row["gender"] . "</td>";
      echo "<td>" . $row["dots"] . "</td>";
      echo "<td>" . $row["kgs"] . "</td>";
      echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}
?>
</body>
</html>
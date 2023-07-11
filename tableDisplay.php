<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-button {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .green-button {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        background-color: green;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <a href="login.php" class="green-button">Go Back to Login</a>
    <br>
    <br>
    <br>
    <br>
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

    $sql = "CREATE Table if not exists listOfDots (
  username varchar(20),
  fullName varchar(50),
  total float,
  bodyWeight float,
  gender varchar(10),
  dots float,
  kgs varchar(4)
  )";
    $conn->query($sql);

    session_start();
    $loginUsername = $_SESSION['username'];
    $sql = "SELECT * FROM listOfDots WHERE username = '$loginUsername'";

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
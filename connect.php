<?php
$servername = "localhost";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql= "CREATE DATABASE IF NOT EXISTS mydb";


if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }
  
$conn = new mysqli($servername, $username, $password, "mydb");





  $sql = "CREATE Table if not exists listOfDots (
    fullName varchar(50),
    total float,
    bodyWeight float,
    gender boolean,
    dots float
    )";
    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }  
  ?>
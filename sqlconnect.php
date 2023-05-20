<?php

class Sqlconnect {

private  $servername = "localhost";
private  $username = "root";
private  $password = "password";
private $conn; 
  
function __construct(){
// Create connection
  $this ->conn = new mysqli($this ->servername, $this -> username, $this ->password);
  
  // Check connection
  if ($this ->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
  }
  echo "Connected successfully";
  
}

function insertTable($name, $total, $bodyWeight, $gender, $dots){
  $sql = "INSERT INTO listOfDots (fullName, total, bodyWeight, gender, dots)
  VALUES ('$name', '$total', '$bodyWeight', '$gender', '$dots')";
  if ($this->conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $this->conn->error;
  }
}

function createDB(){
  $sql= "CREATE DATABASE IF NOT EXISTS myDB";
  

  
  if ($this -> conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $this ->conn->error;
  }

  $this ->conn = new mysqli($this ->servername, $this -> username, $this ->password, "myDB");
}
  
function createTable(){
  $sql= "CREATE Table if not exists listOfDots (
    fullName varchar(50),
    total float,
    bodyWeight float,
    gender boolean,
    dots float
    )";
  
    if ($this ->conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $this ->conn->error;
    }
}

}

?>



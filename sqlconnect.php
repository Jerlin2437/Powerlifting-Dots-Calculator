<?php

class Sqlconnect
{

  private $servername = "localhost";
  private $username = "root";
  private $password = "password";
  private $conn;
  private $tableName;

  function __construct()
  {
    // Create connection
    $this->conn = new mysqli($this->servername, $this->username, $this->password);

    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

  }


  function createDB()
  {
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
    $this->conn->query($sql);
    $this->conn = new mysqli($this->servername, $this->username, $this->password, "myDB");
  }

  function createTable()
  {
    $sql = "CREATE Table if not exists listOfDots (
    username varchar(20),
    fullName varchar(50),
    total float,
    bodyWeight float,
    gender varchar(10),
    dots float,
    kgs varchar(4)
    )";
    $this->conn->query($sql);

  }
  function insertTable($username, $name, $total, $bodyWeight, $gender, $dots, $type)
  {
    $sql = "INSERT INTO listOfDots (username, fullName, total, bodyWeight, gender, dots, kgs)
  VALUES ('$username', '$name', '$total', '$bodyWeight', '$gender', '$dots', '$type')";
    $this->conn->query($sql);

  }
}


?>
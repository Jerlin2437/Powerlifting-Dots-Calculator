<?php
class sqlLogin
{
  private $servername = "localhost";
  private $username = "root";
  private $password = "password";
  private $conn;
  private $type;

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
    $sql = "CREATE DATABASE IF NOT EXISTS loginInfo";
    $this->conn->query($sql);
    $this->conn = new mysqli($this->servername, $this->username, $this->password, "loginInfo");
  }

  function createTable()
  {
    $sql = "CREATE Table if not exists usernamePassword (
                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                createdUsername varchar(20),
                createdPassword varchar(60)
                )";
    $this->conn->query($sql);

  }

  function signUp($username, $password)
  {
    $sql = "SELECT * FROM usernamePassword 
                WHERE createdUsername = '$username'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0 and $username != "") {
      echo "Username Already Exists";

    } else {
      $sql = "INSERT INTO usernamePassword( createdUsername, createdPassword)
                VALUES ('$username', '$password')";
      $this->conn->query($sql);
      header("Location: home.php?fullName=&total=&bodyWeight=&gender=male&kilos=lbs");
      exit;
    }

  }
  function login($username, $password)
  {
    $sql = "SELECT createdPassword FROM usernamePassword 
                WHERE createdUsername = '$username'";
    $result = $this->conn->query($sql);

    if ($result->num_rows == 1) {
      while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["createdPassword"])) {


          header("Location: home.php?fullName=&total=&bodyWeight=&gender=male&kilos=lbs");
          exit;
        } else {
          echo "Wrong Password";
        }
      }
    } else {
      echo "Incorrect Username/Password Combination";
    }
  }
  function initialize()
  {
    $this->createDB();
    $this->createTable();
  }
}
?>
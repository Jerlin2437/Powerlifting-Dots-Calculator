<!DOCTYPE html>
<html>

<head>
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .signup-container {
            width: 300px;
            margin: 0 auto;
            margin-top: 150px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .signup-container h2 {
            text-align: center;
        }

        .signup-form input[type="text"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .signup-form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        .signup-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Signup</h2>
        <form class="signup-form" method="POST" action="signup.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Signup">
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    include_once "sqllogin.php";
    $signupVar = new sqlLogin();
    $signupVar->createDB();
    $signupVar->createTable();

    session_start();
    $_SESSION['username'] = $username;

    if ($username != "" and $password != "") {
        $signupVar->signUp($username, $hashed_password);
    }
    ?>



</body>

</html>
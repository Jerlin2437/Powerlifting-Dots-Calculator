<!DOCTYPE html>
<html>
<head>
	<title>Name Collection Site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	
	<header>
    	<button onclick="window.location.href='home.html'">Old Scores</button>
  	</header>

	<h1>Dots Calculator</h1>
<br>
	<form id="name-collection-form" action = "home.php" method = "get">
		<label for="fullName">Full Name:</label>
		<input type="text" id="fullName" name="fullName" placeholder = "John Smith">

		<label for="total">Total:</label>
		<input type="float" id="total" name="total" placeholder = "0">

		<label for="bodyWeight">Body Weight:</label>
		<input type="float" id="bodyWeight" name="bodyWeight" placeholder = "0">

		<label for="gender">Gender:</label>
		<select id="gender" name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>

		<label for ="kilos"> Pounds or Kilos: </label>
		<select id="kilos" name="kilos">
			<option value="lbs">Pounds</option>
			<option value="kgs">Kilograms</option>
		</select>

		<input type="submit" id="submit-button"></button>
	</form>
<br>

	<?php
	$name = $_GET["fullName"];
	$total = $_GET["total"];
	$gender = $_GET["gender"];
	$type =  $_GET["kilos"];
	$bodyWeight = $_GET["bodyWeight"];
	if ($total == '' || $bodyWeight == ''){
		echo 'Enter correct total and bodyweight';
	}
	else{
	include_once "dots.php";
	$dots = new Dots($bodyWeight, $total, $type, $gender);
	
	$computedDots = $dots ->getDots();
	

	echo "DOTS: $computedDots";}
	include_once "sqlconnect.php";
	$sqlConnectVar = new Sqlconnect();
	$sqlConnectVar ->createDB();
	$sqlConnectVar->createTable();
	$sqlConnectVar ->insertTable($name, $total, $bodyWeight, $gender, $computedDots, $type);

	?>
	
	
</body>
</html>
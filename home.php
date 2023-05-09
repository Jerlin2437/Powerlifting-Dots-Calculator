<!DOCTYPE html>
<html>
<head>
	<title>Name Collection Site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Dots Calculator</h1>
	<form id="name-collection-form" action = "home.php" method = "get">
		<label for="fullName">Full Name:</label>
		<input type="text" id="fullName" name="fullName">

		<label for="total">Total:</label>
		<input type="number" id="total" name="total">

		<label for="bodyWeight">Body Weight:</label>
		<input type="number" id="bodyWeight" name="bodyWeight">

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


		<button type="submit" id="submit-button">Submit</button>
	
	</form>
	<script src="script.js"></script>
</body>
</html>
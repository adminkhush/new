<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
		
	// Check for empty fields
	if (empty($name) || empty($quantity) || empty($price)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($quantity)) {
			echo "<font color='red'>quantity field is empty.</font><br/>";
		}
		
		if (empty($price)) {
			echo "<font color='red'>price field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO products1 (`name`, `quantity`, `price`) VALUES ('$name', '$quantity', '$price')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>

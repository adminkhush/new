<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);	
	
	// Check for empty fields
	if (empty($name) || empty($quantity) || empty($price)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($quantity)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if (empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE products1 SET `name` = '$name', `quantity` = '$quantity', `price` = '$price' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}

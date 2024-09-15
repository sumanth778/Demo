<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$host = "dbramsayz.mysql.database.azure.com";
	$username = "ramsayz@dbramsayz";
	$password = "Chinnu@778";
	$database = "demo";

	// Database connection
	$conn = new mysqli($host, $username, $password, $database);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname) values(?, ?)");
		$stmt->bind_param("ss", $firstname, $lastname);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>

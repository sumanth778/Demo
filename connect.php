<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$host = "dbramsayz.mysql.database.azure.com";
	$username = "ramsayz";
	$password = "Chinnu@778";
	$database = "demo";
	$port = 3306;

	// Database connection
	$conn = new mysqli($host, $username, $password, $database, $port);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(id,firstname, lastname) values(?, ?, ?)");
		$stmt->bind_param("iss", $id, $firstName, $lastName);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>

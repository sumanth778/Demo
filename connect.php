<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];

	// Database connection
	$conn = new mysqli('dbramsayz.mysql.database.azure.com','ramsayz','Chinnu@778','dbramsayz');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(id,firstName, lastName) values(?, ?, ?)");
		$stmt->bind_param("iss", $id, $firstName, $lastName);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

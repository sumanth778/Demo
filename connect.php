<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $host = "dbramsayz.mysql.database.azure.com";
    $username = "ramsayz";
    $password = "Chinnu@778";
    $database = "demo";
    $port = 3306;

    // Initialize the MySQLi connection object
    $conn = mysqli_init();
    
    // Establish the connection using mysqli_real_connect
    if (!$conn) {
        die('mysqli_init failed');
    }

    $success = mysqli_real_connect($conn, $host, $username, $password, $database, $port);

    // Check if the connection was successful
    if (!$success) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName) VALUES (?, ?)");
    if (!$stmt) {
        die('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
    }
    
    $stmt->bind_param("ss",$firstName, $lastName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($conn);
?>


<?php
session_start();

if($_SESSION["Username"]!="guest") {
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tradeplatfromserverdb";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "INSERT INTO guestbook (POSTUID, POSTTEXT)
	VALUES (\"" .$_SESSION["UserID"]. "\", \"" . $_GET['t'] . "\")";
	
	if (mysqli_query($conn, $sql)) {
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

}


?>
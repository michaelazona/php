<?php
	
	include 'Misc/phpFunctions.php';
	//pulling connectToDatabase() and assembleSqlStatement()

	$first = $_GET["first"];
	$last  = $_GET["last"];

	$conn = connectToDatabase();

	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	if($conn)
	{
		$sql = assembleSqlStatment($first, $last);
		$conn->query($sql);
	}

	$conn->close();
	header('Location: http://localhost');
	exit;
	
?>
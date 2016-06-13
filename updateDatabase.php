<?php
	
	function connectToDatabase()
	{
		$serverName = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "SampleDatabase";

		$conn = new mysqli($serverName, $username, $password, $dbname);
		return $conn;
	}


	$first = $_GET["first"];
	$last  = $_GET["last"];

	$conn = connectToDatabase();

	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	if($conn)
	{
		$sql = 'INSERT INTO SampleTable ' . '(firstName, lastName) ' . 'VALUES ( "' . $first . '", "' . $last . '" )';
		$conn->query($sql);
	}

	$conn->close();
	header('Location: index.php');

?>
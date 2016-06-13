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

	function assembleSqlStatment($first, $last)
	{
		$sql = 'INSERT INTO SampleTable ' . '(firstName, lastName) ' . 'VALUES ( "' . $first . '", "' . $last . '" )';
		return $sql;
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
		$sql = assembleSqlStatment($first, $last);
		$conn->query($sql);
	}

	$conn->close();
	header('Location: index.php');

?>
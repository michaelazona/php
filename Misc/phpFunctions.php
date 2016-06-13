<?php	

	function connectToDatabase()
	{
		$serverName = "locadlhost";
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
	
?>
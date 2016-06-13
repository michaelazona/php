<?php

	require_once 'phpFunctions.php';

	class variousPHPUnitTests extends PHPUNIT_Framework_TestCase
	{
		//incase there were any alterations to the SQL statment - this will make sure the query is always the right one!
		public function testSqlStatement()
		{
			$sql = 'INSERT INTO SampleTable ' . '(firstName, lastName) ' . 'VALUES ( "Donald", "Duck" )';
			$this->assertEquals(assembleSqlStatment("Donald", "Duck"), $sql);
		}


		//checks to make sure database can still be connected to - incase someone messed with the credentials, dbname, etc.
		public function testDatabaseConnectionFunction()
		{
			$conn = connectToDatabase();

			if($conn)  { $this->assertTrue(TRUE) ;}
			else       { $this->assertTrue(FALSE);}
		}
	}
?>

<?php

	require_once 'phpFunctions.php';

	class PersonTest extends PHPUNIT_Framework_TestCase
	{
		//incase there were any changes to database connection function that caused issues with the web page's ability to connect to the database
		public function testSqlStatement()
		{
			$sql = 'INSERT INTO SampleTable ' . '(firstName, lastName) ' . 'VALUES ( "Donald", "Duck" )';
			$this->assertEquals(assembleSqlStatment("Donald", "Duck"), $sql);
		}
	}
?>
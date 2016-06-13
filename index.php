<?php
	$serverName = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "SampleDatabase";

	$first = array();
	$last  = array();

	$conn = new mysqli($serverName, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	if($conn)
	{
		$sql = "SELECT id, firstName, lastName FROM SampleTable";
		$result = $conn->query($sql);

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$first[] = (string)$row["firstName"];
				$last[]  = (string)$row["lastName"];
			}		
		}
	}

	$conn->close();

?>

<!DOCTYPE>
<html>
	<style>
		#container
		{
			width:  40%;
			background-color: #555555;
			margin: auto;
			text-align: center;
			margin-top: 4%;
			border-style: groove;
		}

		p
		{
			font-family: Consolas, monaco, monospace;
			font-size: 26px;
			font-style: normal;
			font-variant: normal;
			font-weight: 400;
			line-height: 20px;
			color: #fafafa;
		}

		input
		{
			font-family: Consolas, monaco, monospace;
			font-size: 26px;
			font-style: normal;
			font-variant: normal;
			font-weight: 400;
			line-height: 20px;
			color: #555555;
		}

		.button 
		{
		    background-color: #4CAF50; /* Green */
		    border: none;
		    color: white;
		    padding: 15px 32px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		}

		.button:hover
		{
			cursor: pointer;
		}

		.button:active
		{
			cursor: pointer;
			font-size: 15px;
			padding: 14px 31px;
		}
	</style>

	<body>

		<div id = "container"><br>
			<p>
				The names entered so far are: <br>
				<p id="name" style = 'color: #FAFFBD; text-decoration: underline';></p>
			</p><br>

			<hr style='width: 80%'/><br>

			<p>
				Enter a new name:
			</p>

			<p>First Name: <input id="newFirst" type="textbox" style='height:30px'/></p>
			<p>Last Name:  <input id="newLast" type="textbox" style='height:30px; margin-left: 13px'/></p><br>

			<input type="button" class="button" value="Submit" onclick="submit()"/><br/><br/><br/>
		</div>

		<script>
			var firstName = <?php echo json_encode($first); ?>;
			var lastName  = <?php echo json_encode($last); ?>;
			var htmlStuff = "";

			for(var i = 0; i < firstName.length; i++)
			{
				htmlStuff = htmlStuff + firstName[i] + " " + lastName[i] + "<br>";

				if(i != (firstName.length - 1)){ htmlStuff = htmlStuff + "<br>"; }
			}

			document.getElementById("name").innerHTML = htmlStuff;
			
			function submit()
			{
				var newFirst = document.getElementById("newFirst").value;
				var newLast  = document.getElementById("newLast").value;
				var url      = "updateDatabase.php?first=" + newFirst + "&last=" + newLast;

				if(newFirst == "" && newLast == ""){ alert("Please enter enter a first name and a last name."); }
				
				else if(newFirst == ""){ alert("Please enter a first name."); }
				else if(newLast  == ""){ alert("Please enter a last name.") ; }

				else{ document.location.href = url; }
			}
		</script>


	</body>
</html>
<?php

	include 'Misc/phpFunctions.php';
	//pulling connectToDatabase() and assembleSqlStatement()

	$first = array();
	$last  = array();

	$conn = connectToDatabase();;

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
	<head>
		<script src="js/alertify.min.js"></script>
		<link rel="stylesheet" href="css/alertify.core.css" />
		<link rel="stylesheet" href="css/alertify.default.css" />
		<link rel="stylesheet" href="css/mainPage.css" />

		<title>Mike's Web App</title>

	</head>

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
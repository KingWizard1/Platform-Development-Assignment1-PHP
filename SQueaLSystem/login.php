<?php // tells code that we're using PHP

	// Variable declaration requires $ before the variable names
	$servername = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbname = "SQueaLsystem";
	
	$username = $_POST["usernamePost"]; // waiting for username to be sent
	$password = $_POST["passwordPost"];

	// make connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	// check connection and kill if fail
	if(!$conn)
	{
		die("Connection Failed.".mysql_connect_error());
	}
	
	$checkaccount = "SELECT password FROM users WHERE username = '".$username."'";
	$result = mysqli_query($conn,$checkaccount);
	
	// if we have usernames that match the username
	if(mysqli_num_rows($result)>0)
	{
		// check if passwords match
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['password'] == $password)
			{
				echo "Success";
				return;
			}
			
		}
		
		echo "Incorrect Password";
	}
	else
	{
		echo "User not found!";
	}
	
	
	
	
?>
	
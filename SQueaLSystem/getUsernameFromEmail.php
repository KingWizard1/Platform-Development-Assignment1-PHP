<?php // tells code that we're using PHP

	// Variable declaration requires $ before the variable names
	$servername = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbname = "SQueaLsystem";
	
	$email = $_POST["emailPost"];
	
	// make connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	// check connection and kill if fail
	if(!$conn)
	{
		die("Connection Failed.".mysql_connect_error());
	}
	
	$checkaccount = "SELECT username FROM users WHERE email = '".$email."'";
	$result = mysqli_query($conn,$checkaccount);
	
	// if we have usernames that match the email
	if(mysqli_num_rows($result)>0)
	{
		// loop through results
		while($row = mysqli_fetch_assoc($result))
		{
			// only care about the first result
			echo $row['username'];
			return;
		}
	}
	else
	{
		echo "No user found";
	}
	
	
	
	
?>
	
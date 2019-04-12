<?php
    $server_name = "localhost";
    $server_username = "root";
    $server_password = "";
    $database_name = "squealsystem";
    
    $username = $_POST["usernamePost"];
    $password = $_POST["passwordPost"];
    
    //Make the connection
    $conn = new mysqli($server_name, $server_username,$server_password,$database_name);
    //Check the connection
    if(!$conn)
    {
        die("Connection Failed.".mysqli_connect_error());
    }
    
    $finduser = "SELECT username FROM users";
    $finduserresult = mysqli_query($conn,$finduser);
    $canmakeaccount = "";
    
    //if there are more than 0 rows
    if(mysqli_num_rows($finduserresult)>0)
    {
        while($row = mysqli_fetch_assoc($finduserresult))
        {
            if($row['username'] == $username)
            {
                
				$sql = "UDPATE users SET password='$password' WHERE username='$username'";
				
				$sqlResult = mysqli_query($conn, $sql);
				
				if ($sqlResult) {
					
					echo "Success";
					
				}
				else {
					
					echo "SQL error: ".$conn->error;
					
				}
				
				return;
            }
        }
		
		echo "Failed to change password - user does not exist";
    }
      
?>
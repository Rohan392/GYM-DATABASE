<html>
<head><title>Gym Management Database - Membership Table</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updatemembership2.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	
        $server = "vlamp.cs.uleth.ca"; 
        $db = "todm3660"; 

        try {
	$conn = new mysqli($server,$username,$password,$db);
	} catch (Exception $e) {
	   echo "Connection Problem!";
	   exit; 
	}
	
	$sql = "select * from MEMBERSHIP where membershipID='$_POST[membershipID]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
	   echo "Membership Type: <input type=text name=\"type\" value=\"$rec[type]\"><br><br>";
	   echo "<input type=hidden name=\"oldname\" value=\"$_POST[membershipID]\">";
	   echo "<input type=submit name=\"submit\" value=\"Update\">"; 


	}
	else
	{
		echo "<p>Umm...you may want to enter some data. ;) </p>"; 
	}

	echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

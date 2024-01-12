<html>
<head><title>Gym Management Database - Enrollment Table</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateenrollment2.php\" method=post>";

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
	
	$sql = "select * from CLASSENROLLMENT where enrollmentID='$_POST[enrollmentID]'";
	$sql1 = "SELECT CLASS.classID, CLASS.name FROM CLASS";

	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
	if(!$result || !$result1)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
	   if($result1->num_rows != 0)
   	   {
		echo "Class: <select name=\"classID\">";
      
		while($val = $result1->fetch_assoc())
		{

		echo "<option value='{$val['classID']}'>{$val['classID']} - {$val['name']}</option>";
	 
	 }
      		echo "</select\>";  
   		}
   		else
   		{
      		    echo "<p>No Employees! </p>"; 
   		}
	   echo "<input type=hidden name=\"oldname\" value=\"$_POST[enrollmentID]\">";
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

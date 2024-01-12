<html>
<head><title>Gym Management Database - Class Table</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateclass2.php\" method=post>";

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
	
	$sql = "select * from CLASS where classID='$_POST[classID]'";
	$sql1 = "SELECT EMPLOYEE.employeeID, PERSON.name FROM EMPLOYEE INNER JOIN PERSON ON EMPLOYEE.personID = PERSON.personID";

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
	   echo "Class Name: <input type=text name=\"name\" value=\"$rec[name]\"><br><br>";
	   echo "Time: <input type=text name=\"time\" value=\"$rec[time]\"><br><br>";
	   if($result1->num_rows != 0)
   	   {
		echo "Employee: <select name=\"employeeID\">";
      
		while($val = $result1->fetch_assoc())
		{
		echo "<option value='{$val['employeeID']}'>{$val['employeeID']} - {$val['name']}</option>";
	 
	 }
      		echo "</select\>";  
   		}
   		else
   		{
      		    echo "<p>No Classes! </p>"; 
   		}
	   echo "<input type=hidden name=\"oldname\" value=\"$_POST[classID]\">";
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

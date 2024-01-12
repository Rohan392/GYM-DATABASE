<html>
<head><title>Gym Management Database - Employee Table</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteemployee.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT EMPLOYEE.employeeID, PERSON.name FROM EMPLOYEE INNER JOIN PERSON ON EMPLOYEE.personID = PERSON.personID";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Employee Name: <select name=\"employeeID\">";
      
      while($val = $result->fetch_assoc())
      {
	 // Display both employeeID and name in the dropdown
            echo "<option value='{$val['employeeID']}'>{$val['employeeID']} - {$val['name']}</option>";
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Employees! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

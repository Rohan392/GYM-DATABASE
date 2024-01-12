<?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 
   $employeeID = $_POST['employeeID']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}

   $sql = "select * from EMPLOYEE where employeeID='$employeeID'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>employeeID</td>";
      echo "<td>personID</td>";
      echo "<td>Position</td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[employeeID]</td>";
      echo "<td>$rec[personID]</td>";
      echo "<td>$rec[position]</td>"; 
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p> employeeID $employeeID does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?>

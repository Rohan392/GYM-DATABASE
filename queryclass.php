<?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 
   $classID = $_POST['classID']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}

   $sql = "select * from CLASS where classID='$classID'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>classID</td>";
      echo "<td>name</td>";
      echo "<td>instructorID</td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[classID]</td>";
      echo "<td>$rec[name]</td>";
      echo "<td>$rec[instructorID]</td>"; 
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p>class $classID does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?>

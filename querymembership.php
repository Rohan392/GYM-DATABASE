<?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 
   $membershipID = $_POST['membershipID']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}

   $sql = "select * from MEMBERSHIP where membershipID='$membershipID'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>membershipID</td>";
      echo "<td>personID</td>";
      echo "<td>Type</td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[membershipID]</td>";
      echo "<td>$rec[personID]</td>";
      echo "<td>$rec[type]</td>"; 
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p> membershipID $membershipID does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?>

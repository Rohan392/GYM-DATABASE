<?php

if (isset($_COOKIE["username"])) {
      
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 
   $employeeID = $_POST['employeeID'];

   $conn = new mysqli($server,$username,$password,$db);
   
   $sql = "delete from EMPLOYEE where employeeID='$employeeID'"; 
   if($conn->query($sql)) 
   { 
	echo "<h3> Employee deleted!</h3>";
	
   } else {
      $err = $conn->errno; 
      $errtext = $conn->error;
      echo "You got an error code of $err.";
      echo "Text for this code: $errtext."; 
   }
   echo "<br><br><a href=\"main.php\">Return</a> to Home Page."; 
} else {
      
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
      
   }
?>

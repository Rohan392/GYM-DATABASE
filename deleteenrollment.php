<?php

if (isset($_COOKIE["username"])) {
      
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 
   $enrollmentID = $_POST['enrollmentID'];

   $conn = new mysqli($server,$username,$password,$db);
   
   $sql = "DELETE FROM CLASSENROLLMENT WHERE CLASSENROLLMENT.enrollmentID='$enrollmentID'";
 
   if($conn->query($sql)) 
   { 
	echo "<h3> Enrollement deleted !</h3>";
	
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

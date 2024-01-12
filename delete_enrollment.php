<html>
<head><title>Gym Management Database - Enrollment Table</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteenrollment.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT CLASSENROLLMENT.enrollmentID, CLASS.name FROM CLASSENROLLMENT INNER JOIN CLASS ON CLASSENROLLMENT.classID = CLASS.classID";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Enrollment ID: <select name=\"enrollmentID\">";
      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['enrollmentID']}'>{$val['enrollmentID']} - {$val['name']}</option>";	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No one is enrolled! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

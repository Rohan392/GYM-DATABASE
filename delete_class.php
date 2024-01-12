<html>
<head><title>Gym Management Database - Class Table</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteclass.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT classID, name FROM CLASS";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Class Name: <select name=\"classID\">";
      
      while($val = $result->fetch_assoc())
      {
	 // Display both classID and name in the dropdown
            echo "<option value='{$val['classID']}'>{$val['classID']} - {$val['name']}</option>"; 
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Classes! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

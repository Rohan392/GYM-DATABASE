<html>
<head><title>Gym Management Database - Person Table</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteperson2.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT personID, name FROM PERSON";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Person Name: <select name=\"personID\">";
      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['personID']}'>{$val['personID']} - {$val['name']}</option>";
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No People! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

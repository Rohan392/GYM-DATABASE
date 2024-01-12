<html>
<head><title>Gym Management Database - Person Table</title></head>
<body>



<?php
if(isset($_COOKIE['username'])){

   echo "<form action=\"updateperson.php\" method=post>";

   $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
echo $e->getMessage();
exit; 
}

   $sql = "SELECT personID, name, dob FROM PERSON";

   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Person Name: <select name=\"personID\">";
	      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='{$val['personID']}'>{$val['personID']} - {$val['name']} - {$val['dob']} </option>"; 

      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>Umm...you may want to enter some data. ;) </p>"; 
   }

   echo "</form>";
}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?>


 
</body>
</html>

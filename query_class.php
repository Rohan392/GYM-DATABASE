<html>
<head><title>Gym Management Database - Class Table</title></head>
<body>
<?php

try{

  
if(isset($_COOKIE["username"]))
{
   echo "<form action=\"queryclass.php\" method=post>";
	
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   $server = "vlamp.cs.uleth.ca";
   $db = "todm3660"; 

   try {
   $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e){
      echo $e->getMessage(); 
      echo "Error connecting!";
      exit; 
   }

   $sql = "SELECT classID, name FROM CLASS";

   try {
   $result = $conn->query($sql);
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo "Problem with processing query";
      exit; 
   }

   if($result->num_rows > 0)
   {
      echo "Class Name: <select name=\"classID\">";
	      
      while($val = $result->fetch_assoc())
      {
	 // Display both classID and name in the dropdown
            echo "<option value='{$val['classID']}'>{$val['classID']} - {$val['name']}</option>"; 
	      
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are no classes in the system!</p>"; 
   }
   
   echo "</form>";
}
else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

} catch (PDOException $ex) {

   echo $ex->getMessage(); 
  }
?>

</body>
</html>

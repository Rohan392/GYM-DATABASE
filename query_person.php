<html>
<head><title>Gym Management Database - Person Table</title></head>
<body>
<?php

try{
  
if(isset($_COOKIE["username"]))
{
   echo "<form action=\"queryperson.php\" method=post>";
	
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

   $sql = "SELECT personID, name FROM PERSON";

   try {
   $result = $conn->query($sql);
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo "Problem with processing query";
      exit; 
   }

   if($result->num_rows > 0)
   {
      echo "Person Name: <select name=\"personID\">";
	      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['personID']}'>{$val['personID']} - {$val['name']}</option>";       
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are no people in the system!</p>"; 
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

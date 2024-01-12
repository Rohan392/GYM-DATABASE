<html>
<head><title>Gym Management Database - Membership Table</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deletemembership.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "todm3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT MEMBERSHIP.membershipID, PERSON.name FROM MEMBERSHIP INNER JOIN PERSON ON MEMBERSHIP.personID = PERSON.personID";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Member: <select name=\"membershipID\">";
      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['membershipID']}'>{$val['membershipID']} - {$val['name']}</option>";
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Members! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>

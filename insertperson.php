<?php
if (isset($_COOKIE['username'])) { 
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$server = "vlamp.cs.uleth.ca"; 
$db = "todm3660";

try
{
$conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
	echo $e -> getMessage();   
}

$sql = "INSERT INTO PERSON (personID, name, dob) VALUES ('$_POST[personID]', '$_POST[name]', '$_POST[dob]')";

if($conn->query($sql))  
{ 
	echo "<h3> New Person added!</h3>";
}

else {
	$err = $conn->errno;
        if ($err == 1062) {
            echo "<p>personID $personId already exists!</p>";
        } else {
            echo "<p>MySQL error code $err: " . $conn->error . "</p>";
        }
    }
   
   echo "<a href=\"main.php\">Return</a> to Home Page.";


} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?>

<?php
if (isset($_COOKIE["username"])) { 
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $server = "vlamp.cs.uleth.ca";
    $db = "todm3660"; 

    try {
        $conn = new mysqli($server, $username, $password, $db);
    } catch (Exception $e) {
        echo "Connection Problem: " . $e->getMessage();
        exit; 
    }

    // Correcting the SQL syntax
    $sql = "update CLASSENROLLMENT set enrollmentID='$_POST[oldname]',classID='$_POST[classID]' where enrollmentID='$_POST[oldname]'"; 

    try {
        $conn->query($sql); 
        echo "<h3>Class Enrollment changed!</h3>";
    } catch (Exception $e) {
        $err = $conn->errno; 
        if ($err == 1062) {
            echo "<p>Enrollment ID {$_POST['enrollmentID']} already exists or conflicts with another record!</p>"; 
        } else {
            echo "Error code: $err";
        }
    }

    echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>



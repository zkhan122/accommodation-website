<!--  PHP code for connecting to the MySQL database -->
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "coursework"; #you need to replace this with the name of your database
$port = "3306"; # do not remove this - it is being used to automatically run the script

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check that the connection works
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

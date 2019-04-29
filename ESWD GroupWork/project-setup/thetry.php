
<?php
	$servername = "localhost";
	$username = "root"; // MySql username
	$password = ""; // MySql password

  

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE theBasedSystem";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// connect to db

//include '../conn.php';
$conn = new mysqli($servername, $username, $password, "thebasedSystem");

// $name = $_POST['name'];
// $username = $_POST['username'];
// $email = $_POST['email'];
// $pass = $_POST['password'];
//$faculty = $_POST['faculty'];


//echo "</br>";

// sql to create table Articles
$sql = "CREATE TABLE `article` (
  `article_id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `faculty_id` int(6) DEFAULT NULL,
  `article_name` varchar(20) NOT NULL,
  `article_type` varchar(20) NOT NULL,
)";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table article created successfully";
}

?>
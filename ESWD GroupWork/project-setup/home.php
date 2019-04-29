
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

$name = $_POST['name'];
$user_type = $_POST['usertype'];
$name =$_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

//$faculty = $_POST['faculty'];


echo "</br>";

// sql to create table Articles
$sql = "CREATE TABLE `article` (
  `article_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `faculty_id` int(6) NOT NULL,
  `article_name` varchar(20) NOT NULL,
  `article_type` varchar(20) NOT NULL
)";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table article created successfully";
}
//$conn->query($sql);

$sql = "INSERT INTO `article` (`article_id`, `user_id`, `faculty_id`, `article_name`, `article_type`)
 VALUES(1, 2, 2, 'tropical','marge')";
$conn->query($sql);

// Create FACULTY
$sql = "CREATE TABLE `faculty` (
  `faculty_id` int(5) NOT NULL,
  `faculty_name` varchar(30) DEFAULT NULL,
  `user_id` int(6) NOT NULL
) ";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table faculty created successfully";
}

$sql = "INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `user_id`)
 VALUES(1,'business', 4)";
$conn->query($sql);


// Create USERS
$sql = "CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `user_type` varchar(20)NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
)";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table USERS created successfully";
}

$hashed = hash('sha512', $pass);

$sql = "INSERT INTO `user` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`)
 VALUES(1, 'admin', 'peter', 'peter2', 'peter2@yahoo.com', 'peter')";
$conn->query($sql);

$sql = "INSERT INTO `user` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`)
 VALUES(2, 'user', 'mwansa', 'mwansa', 'mwansa2@yahoo.com', 'mwansa')";
$conn->query($sql);

$sql = "INSERT INTO `user` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`) 
VALUES(3, 'user', 'mwansa', 'mwansa', 'mwansa2@yahoo.com', 'mwansa')";
$conn->query($sql);

$sql = "INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`)
 VALUES(4, 'admin', 'IRoot', 'root', 'root@root.com', 'root')";
$conn->query($sql);

$sql = "INSERT INTO users (user_id, user_type, name, user_name, email, password)
VALUES ('$name', '$userType', '$username', '$email', '$hashed')";

$conn->query($sql);

// ADDING PRIMARY AND FOREIGN KEY

$sql = "ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`)";

$conn->query($sql);

$sql = "ALTER TABLE `users`
  ADD UNIQUE(`user_name`)";

$conn->query($sql);
$sql = "ALTER TABLE `users`
  ADD UNIQUE(`email`)";

$conn->query($sql);
//ADING AUTO_INCREMENT VALUES

$sql = "ALTER TABLE `article`
  MODIFY `article_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

$conn->query($sql);

$sql = "ALTER TABLE `faculty`
  MODIFY `faculty_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

$conn->query($sql);

$sql = "ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

$conn->query($sql);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
    echo "<br>Everythig Setup Successfully";
}

header('location: index.php');
$conn->close();


?>

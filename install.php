<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'projectX';
echo "Creating database...";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<br>";
// Create database

$sql = "CREATE DATABASE $db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully...";
    echo "<br>";
    echo "Installation complete.";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->query("USE $db");
$sql = "CREATE TABLE `users` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `username` varchar(32) NOT NULL,
 `password` varchar(60) NOT NULL,
 `email` text NOT NULL,
 PRIMARY KEY (`id`)
)";
if ($conn->query($sql) === TRUE) {
    echo "Users table created successfully...";
    echo "<br>";
    echo "Installation complete.";
} else {
    echo "Error creating table: " . $conn->error;
}


$conn->query("USE $db");
$sql = "CREATE TABLE `login_tokens` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `token` char(64) NOT NULL,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `token` (`token`)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tokens table created successfully...";
    echo "<br>";
    echo "Installation complete.";
} else {
    echo "Error creating table: " . $conn->error;
}

echo "<br>";
echo "Thank you for installing Login-Engine";
echo "<br>";
echo "More features are coming soon. This is a beta version.";

$conn->close();
?>

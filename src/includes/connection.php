<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "formDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// // Create database
// $sql = "CREATE TABLE `formDB`.`formValidation` (`Id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,  `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `cpassword` VARCHAR(100) NOT NULL , `mobile` VARCHAR(20) NOT NULL , `website` VARCHAR(100) NOT NULL , `gender` VARCHAR(30) NOT NULL , `comment` VARCHAR(500) NOT NULL ) ENGINE = InnoDB;";
// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// mysqli_close($conn);

// // Create connection
// $conn = mysqli_connect("localhost:3306", "root", "", "formDB");

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

// // Create database
// $sql = "CREATE DATABASE formDB";
// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// mysqli_close($conn);
?>
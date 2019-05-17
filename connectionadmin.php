<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "shondhan";
$table = "admin";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}else{
    //echo "Connection to PhpMyAdmin Successful!<br>";
}

// Create database

//$sql = "CREATE DATABASE $database";
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sql)) {
    //echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select database
$conn=mysqli_connect("localhost","root","","$database");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `admin` (
    `adminID` int(10) NOT NULL AUTO_INCREMENT,
    `adminName` varchar(20) NOT NULL,
    `aFirstName` varchar(20) NOT NULL,
    `aLastName` varchar(20) NOT NULL,
    `aPassword` varchar(30) NOT NULL,
    `aEmail` varchar(30) NOT NULL,
    `aMobileNo` varchar(15) NOT NULL,
    PRIMARY KEY (`adminID`)
   )";
    
//if (mysqli_query($conn, $sql))
//if ($results=mysqli_query($conn, $sql))
$results=mysqli_query($conn, $sql);
if ($results) {
    //echo "Table '$table' has been created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

//mysqli_close($conn);

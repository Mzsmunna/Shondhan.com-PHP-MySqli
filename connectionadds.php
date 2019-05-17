<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "shondhan";
$table = "advertises";

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
$sql = "CREATE TABLE IF NOT EXISTS `advertises` (
    `aid` int(10) NOT NULL AUTO_INCREMENT,
    `addOwner` varchar(20) NOT NULL,
    `addOwnerID` int(10) NOT NULL,
    `addFor` varchar(10) NOT NULL,
    `addType` varchar(15) DEFAULT NULL,
    `bed` int(4) NOT NULL,
    `masterBeed` int(4) NOT NULL,
    `belcony` int(4) NOT NULL,
    `attachedDD` varchar(5) NOT NULL,
    `squareFeet` int(5) DEFAULT NULL,
    `price` varchar(15) NOT NULL,
    `contactNo` varchar(15) NOT NULL,
    `floor` varchar(4) DEFAULT NULL,
    `division` varchar(20) NOT NULL,
    `district` varchar(20) NOT NULL,
    `location` varchar(50) DEFAULT NULL,
    `inDetail` varchar(200) DEFAULT NULL,
    `date` varchar(12) DEFAULT NULL,
    PRIMARY KEY (`aid`)
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

<?php
//include('dbconnect.php'); 
//require_once('connection.php');

$username = $_GET['usr'];
$conn=mysqli_connect("localhost","root","","shondhan");

session_start();

//$res=mysql_query("SELECT * FROM users WHERE username='$username' OR email='$username'");
$res=mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		
//$row=mysql_fetch_array($res);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

//$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
		
if( $count == 1 ) {
		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['userID'] = $row['uid'];
		header("Location: myprofile.php");
} else {
		echo "<br>Wrong Username Or Password, Try again...";
		$status="Error";
}

?>
<?php
session_start();
include 'db_connection.php';

if(!isset($_SESSION['student_id']))
{
	echo "Log in to view info";
	exit();
}
$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM students WHERE id='$student_id'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	echo "<h2>Welcome, " . $row['first_name'] . " " . $row['last_name'] . "</h2>";
    	echo "<p>Email: " . $row['email'] . "</p>";
	echo "<p>Date of Birth: " . $row['dob'] . "</p>";
	echo "<p>Gender: " . $row['gender'] . "</p>";
	echo "<p>Mobile Number: " . $row['mobile_number'] . "</p>";
} 
else 
{
	echo "No user found.";
}
$conn->close();
?>

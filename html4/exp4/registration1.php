<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$mobile_number = $_POST['mobile_number'];
	
	$email_check = "SELECT * FROM students WHERE email='$email'";
	$result = $conn->query($email_check);
	
	if($result->num_rows > 0)
	{
		echo "Email is already registered";
	}
	else
	{
		$sql = "INSERT INTO students (first_name, last_name, email, password, dob, gender, mobile_number) VALUES ('$first_name', '$last_name', '$email', '$pass', '$dob', '$gender', '$mobile_number')";
		if($conn->query($sql) === TRUE)
		{
			echo "Registration successful";
			header ('Location:login2.php');
			exit();
		}
		else
		{
			echo "Error:".$conn->error;
		}
	}
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
	<body>
		<h2>Register Student</h2>
		<form method="POST" action="">
			<label for="first_name">First Name:</label><br>
			<input type="text" id="first_name" name="first_name" required><br><br>

			<label for="last_name">Last Name:</label><br>
			<input type="text" id="last_name" name="last_name" required><br><br>

			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br><br>
			
			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" required><br><br>

			<label for="dob">Date of Birth:</label><br>
			<input type="date" id="dob" name="dob" required><br><br>

			<label>Gender:</label><br>
			<input type="radio" id="male" name="gender" value="Male" required>
			<label for="male">Male</label><br>
			<input type="radio" id="female" name="gender" value="Female" required>
			<label for="female">Female</label><br><br>

			<label for="mobile_number">Mobile Number:</label><br>
			<input type="text" id="mobile_number" name="mobile_number" required><br><br>

			<input type="submit" value="Register">
		</form>
	</body>
</html>

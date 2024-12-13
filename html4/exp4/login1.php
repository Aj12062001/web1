<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM students WHERE email='$email' AND password='$pass'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		setcookie('student_id', $row['id'], time()+(86400 * 30), "/");
		header("Location:dashboard.php");
		exit();
	}
	else
	{
		echo "User not found";
	}
	$conn->close();
}
?>

<!DOCTYPE html>
<html>
	<body>
		<h2>Login</h2>
		<form method="POST" action="login1.php">
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br><br>
			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" required><br><br>
			<input type="submit" value="Login">
		</form>
	</body>
</html>

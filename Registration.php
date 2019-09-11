<?php
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$uname = $_POST['uname'];
		$password = $_POST['pwrd'];
		$rePassword = $_POST['repwrd'];

		if ($rePassword != $password) {
			echo ' <script> alert("passwords doesnt match")</script>';
			echo "<script>setTimeout(\"location.href = 'CustomerSignup.php';\",10);</script>";
		}

		if (strlen($password) < 6) {
			echo ' <script> alert("passwords should have atleast 6 charecters")</script>';
			echo "<script>setTimeout(\"location.href = 'CustomerSignup.php';\",10);</script>";
		header("location:CustomerSignup.php");
		}


	$con=mysqli_connect("localhost","root","","carrental");
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$result = mysqli_query($con,"SELECT * FROM users where uname = '$uname'");

	if (mysqli_num_rows($result) == 1) {
		echo ' <script> alert("Username already used, Try another")</script>';
		//sleep(5);
		header("location:CustomerSignup.php");
	}

	$sql="INSERT INTO users(Name,email,Phone,uname,pw) VALUES('$name','$email','$phone','$uname', '$password')";

	if (!mysqli_query($con,$sql))
	{
	  die('Error: ' . mysqli_error($con));
	}

	echo ' <script> alert("Registration Successfull")</script>';

	if (mysqli_error($con))
	{
   		die(mysqli_error($con));
	}

	else {
		
	}
?>


<?php
	echo "<script>setTimeout(\"location.href = 'CustomerLogin.php';\",10);</script>";
?>
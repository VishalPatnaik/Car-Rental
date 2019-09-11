<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>

<?php

// Session is started and it is checked whether the user has logged in or not
session_start();

$name=$_POST['name'];
$model=$_POST['model'];
$price=$_POST['price'];

$con=mysqli_connect("localhost","root","","carrental");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (mysqli_error($con))
{
   die(mysqli_error($con));
}


	$sql="INSERT INTO carslist(name,model,price) VALUES('$name', '$model', '$price');";

	if (!mysqli_query($con,$sql))
	{
	  die('Error: ' . mysqli_error($con));
	}
	$_SESSION['done']=1;
	header("location:addcar.php");
mysqli_close($con);

?>

</body>

</html>
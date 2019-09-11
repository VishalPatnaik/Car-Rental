<html>

<head>
</head>

<body>

<?php

session_start();
$_SESSION['is_logged_in'] = 0;
$_SESSION['invalid']=0;
$username = $_POST['Aname'];
$password =$_POST['password'];

$con=mysqli_connect("localhost","root","","carrental");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = strtolower($username);
$result = mysqli_query($con,"SELECT * FROM admins WHERE Aname='$username' and password='$password'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}
$values=mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 1)
{
	$_SESSION['is_logged_in'] = 1;
	$_SESSION['Aid']=$values['Aid'];
		header("location:addcar.php");	
}
else
{
	$_SESSION['invalid']=1;
	header("location:adminLogin.php");
}
mysqli_close($con);
?>
</body>
</html>
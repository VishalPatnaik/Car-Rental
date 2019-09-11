<html>

<head>
</head>

<body>

<?php
session_start();
$_SESSION['is_logged_in'] = 0;
$_SESSION['invalid']=0;
$username = $_POST['uname'];
$password =$_POST['pwrd'];

$con=mysqli_connect("localhost","root","","carrental");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$username = strtolower($username);
$result = mysqli_query($con,"SELECT * FROM users WHERE uname='$username' and pw='$password'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}
$values=mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 1)
{
	$_SESSION['is_logged_in'] = 1;
	$_SESSION['uid']=$values['uid'];
		header("location:clientpage.php");	
}
else
{
	$_SESSION['invalid']=1;
	header("location:CustomerLogin.php");
}
mysqli_close($con);
?>
</body>
</html>
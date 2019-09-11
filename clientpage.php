<?php
// Session is started and it is checked whether the user has logged in or not
session_start();
$uid=$_SESSION['uid'];
$_SESSION['done']=0;
$uid=$_SESSION['carid']=0;
if ($_SESSION['is_logged_in'] == 0 )
{
		$_SESSION['invalid']=0;	
    header("Location:CustomerLogin.php");
    die();
}
echo '
<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
    font-family: helvetica;
}

.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-x: hidden;
    transition: 0.9s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover{
    color: #f1f1f1;
}
.linkingbuttons1 {
	padding:10px;
	text-decoration:none;
	color:#fffff;
    font-family:helvetica;
	background-color:#fff;
	border:3px solid #333;
    border-radius:10px;
	overflow:hidden;
    text-color:#333;4

	
}

.linkingbuttons1:hover {
    border-radius:5px solid #333;
}
	.linkingbuttons2 {
	padding:10px;
    text-decoration:none;
    color:#fffff;
    font-family:helvetica;
    background-color:#fff;
    border:3px solid #333;
    border-radius:10px;
    overflow:hidden;

    .linkingbuttons2:hover {
    border-radius:5px solid #333;
}

.overlay .closebtn {
    position: absolute;
    top: 10px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 600px) {
  .overlay a {font-size: 10px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}


</style>
</head>
<body background="image3.jpg" style="background-size:100%; background-repeat:no-repeat;">

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="clientpage.php">Home</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
<div style="background-color:#333; overflow:hidden;">
	<div style="color:#f1f1f1; font-size:30px; overflow:hidden; float:left; margin-left:41%; padding:20px; font-weight:bold;">CAR RENTAL</div>
	<span style="float:right; color:red; color:#f1f1f1; overflow:hidden; font-size:30px; margin-right:20px; padding:14px; cursor:pointer;" onclick="openNav()">&#9776; Menu</span>
	<br/>
</div>
<br/><br/><br/>
	<div style="margin-top:10%; margin-left:40%;">
		<a class="linkingbuttons1" href="viewbooked.php">View Bookings</a>
		<a class="linkingbuttons2" href="booknow.php">Book a Car</a>
	</div>
<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
     
</body>
</html>';?>

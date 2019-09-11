<?php
// Session is started and it is checked whether the user has logged in or not
session_start();
$uid=$_SESSION['uid'];
$submitted=$_SESSION['done'];

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
	color:#c3c3c3;
	background-color:red;
	border:1px solid black;
	overflow:hidden;
	
	}
	.linkingbuttons2 {
	padding:10px;
	text-decoration:none;
	color:#c3c3c3;
	background-color:red;
	border:1px solid black;
	overflow:hidden;
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


#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    padding-bottom:50px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #333;
    color: white;
}

</style>
</head>
<body background="image3.jpg" style="background-size:100%; background-repeat:no-repeat;">';
if($submitted==1) {
	echo '<script>alert("Booking successful");</script>';
}

echo' 
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
	<div style="width:50%; float: left; overflow:hidden;">
	';
	$con=mysqli_connect("localhost","root","","carrental");
	if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM carslist");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}
 
					echo '
					<font style="font-size:30px;">
						<center>
							<br/>
							<span style="font-size:30px; padding:10px; background-color:#c3c3c3;"><b>Carslist</b></span>
						
							<br/><br/>
							<div id = "customers">
							<table border=1; >
								<tr>
										<th style="padding:10px; width:50%;"><b>Car ID</b></th>
										<th style="padding:10px; width:50%;"><b>Name</b></th>
										<th style="padding:10px; width:50%;"><b>Model</b></th>
										<th style="padding:10px; width:50%;"><b>Price</b></th>
									</tr>';
							$i=1;
							
							while($i<=mysqli_num_rows($result))
							{$values[$i]=mysqli_fetch_array($result);
								$carid[$i]=$values[$i]['carid'];
								$carname[$i]=$values[$i]['name'];
								$carmodel[$i]=$values[$i]['model'];
								$amount[$i]=$values[$i]['price'];
								$i=$i+1;
							}
							$i=1;
							while($i<=mysqli_num_rows($result))
							{
							echo '
								<tr>
									<td style="padding:10px; width:50%;"><b>';echo $carid[$i]; echo'</b></td>
									<td style="padding:10px; width:45%;"><b>';echo $carname[$i]; echo'</b></td>
									<td style="padding:10px; width:45%;"><b>';echo $carmodel[$i]; echo'</b></td>
									<td style="padding:10px; width:45%;"><b>';echo $amount[$i]; echo'</b></td>
								</tr>';
								$i=$i+1;
							}
							echo '
						</table>
					</div>
					</center>
					</font>';

	echo'
	</div>
	<div style="width:50%; font-size:30px; float:left; margin-left:0px;">
		<div style="width:70%; border-radius:40px; background-color:#c3c3c3; margin-left:100px; border-top:30px solid black;">
		<center>
    <h1>Rent a Car</h1>
    <form method = "post" action = "bookcardb.php">
    <input type="text"  placeholder="Car ID" id="carId" name="carid" style="width:40%; height:50px; border:1px solid black;  font-size:20px; border-radius:10px; padding:0px 0px 0px 10px;"/><br/><br/>
    <input type="text"  value="Username"   placeholder="User ID" id="Username" name="userid"  style="width:40%; height:50px; border:1px solid black;  font-size:20px; border-radius:10px; color:black; padding:0px 0px 0px 10px;"/><br/><br/>
    <input type="date"  placeholder="Date" id="UserId" name="date"  style="width:40%; height:50px; border:1px solid black;  font-size:20px; border-radius:10px; padding:0px 0px 0px 10px;"/><br/><br/>
    <input id = "submit" type="submit" name = "submit" value = "submit" style="width:15%; height:50px; font-size:20px;"><br/><br/>
    </form>
    
    </center>
</div>
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

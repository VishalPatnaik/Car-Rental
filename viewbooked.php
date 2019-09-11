<?php
// Session is started and it is checked whether the user has logged in or not
session_start();
$uid=$_SESSION['uch.id'];
$cid=$_SESSION['carid'];
$_SESSION['done'];
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
    border: 1px solid #f2f2f2;
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
	<div style="width:90%; float: left; ">
	';
	$con=mysqli_connect("localhost","root","","carrental");
	if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM reserved WHERE uid='$uid'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}
 
					echo '
					<font style="font-size:30px;">
						<center>
							<br/>
							
						
							<br/><br/>
							<div id="customers">
							
															<table border="2">
								   <tr>
								      <th>RId&nbsp&nbsp&nbsp&nbsp</th>
								      <th>CarID&nbsp&nbsp</th>
								      <th>Date&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
								      <th>Amount&nbsp&nbsp</th>
								    </tr>
								     
							';
							$i=1;
							while($i<=mysqli_num_rows($result))
							{$values[$i]=mysqli_fetch_array($result);
								$Rid[$i]=$values[$i]['Rid'];
								$carid[$i]=$values[$i]['carid'];
								$date[$i]=$values[$i]['book'];
								$amount[$i]=$values[$i]['amount'];
								$i=$i+1;
							}
							$i=1;
							while($i<=mysqli_num_rows($result))
							{

							echo '
								<tr>
									<td>	<b>';echo $Rid[$i]; echo'</b>		</td>
									<td> 	<b>';echo $carid[$i]; echo'</b>		</td>
									<td>>	<b>';echo $date[$i]; echo'</b>		</td>
									<td >	<b>';echo $amount[$i]; echo'</b>	</td>
								</tr>';
								$i=$i+1;
							}
							echo '
						</table>
					</center>
					</font>';

	echo'
	</div>
<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
     

<form method = "post" action = "cancelbook.php">
    <input type="text"  placeholder="Enter Rid to cancel reservation" id="Rid" name="Rid" style="width:20%; margin-left:670px; height:50px; border:5px solid #333;  font-size:20px; border-radius:10px; padding:0px 0px 0px 10px;"/><br/><br/>
    <input id = "submit" type="submit" name = "submit" value = "Cancel" style= "margin-left:770px; width:10%; height:50px; font-size:20px;"><br/><br/>
    </form>
</body>
</html>';?>

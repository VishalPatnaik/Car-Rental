<!DOCTYPE html>
<html>

<head>
    <title> Car Rentals - Home</title>

    <style type = "text/css">

    .logo {
        width: 213px;
        height: 36px;

        margin: 30px auto;
    }

    .login-block {
        width: 420px;
        height: 400px;
        padding: 40px;
        background: #cccccc;
        border-radius: 5px;
        border-top: 5px solid #333;
        margin: 0 auto;
        margin-top:90px;
        top:-970px;
        left:-450px;
        position: relative;

    }

    .login-block h1 {
        text-align: center;
        color: #000;
        font-size: 40px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .login-block input {
        width: 100%;
        height: 60px;
        box-sizing: border-box;
        border-radius: 10px;
        margin-top: 30px;
        border: 5px solid #ccc;
        margin-bottom: 0px;
        font-size: 18px;
        font-family: helvetica;
        padding: 5px;
        outline: none;
    }


    .login-block input:active, .login-block input:focus {
        border: 5px solid #333;
    }

    .login-block #submit {
        width: 100%;
        height: 40px;
        background: #4d4d4d;
        box-sizing: border-box;
        border-radius: 5px;
        border: 3px solid #4d4d4d;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        padding:5px;
        width:100%;
        height:60px;
        font-size: 18px;
        font-family: helvetica;
        outline: none;
        cursor: pointer;
        margin-top: 20px;
    }

    .login-block #submit:hover {
        background: #333;
        border: 5px solid #333;
    }



    body {
        margin: 0;
        font-family: helvetica;
        overflow: hidden;

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

    img {
        background-size: 100%;
        width:100%;
        height: 100%;
        opacity: 0.9;

    }


</style>


</head>

<body>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="index.php">Home</a>
    <a href="#">List of cars</a>
    <a href="#">Rent a Car</a>
    <a href="booking.php">View bookings</a>
  </div>
</div>
<div style="background-color:#333; overflow:hidden;">
    <div style="color:#f1f1f1; font-size:30px; float:left; margin-left:44%; padding:20px; font-weight:bold;">CAR RENTAL</div>
    <span style="float:right; color:red; color:#f1f1f1; font-size:30px; margin-right:20px; padding:14px; cursor:pointer;" onclick="openNav()">&#9776; Menu</span>
    <br/>
</div>


<img src="image3.jpg">


    <div class="login-block">
    <h1>Rent a Car</h1>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="number" value="" placeholder="Car ID" id="carId" name="CarID"/>
    <input type="text" value="" placeholder="Username" id="Username" name="username" />
    <input type="date" value="" placeholder="date" id="UserId" name="userID" />
    <input id = "submit" type="submit" name = "submit" value = "submit">
    </form>
</div>


<?php
    session_start();
    $test = "dasdada";  
    $_SESSION['hello'] = $test;
?>




<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
</body>
</html>









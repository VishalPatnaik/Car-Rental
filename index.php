<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>




* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}







img {
    width: 100%;
    height: auto;
}


body {
    margin: 0;
    overflow-y: hidden;
    font-family: helvetica;
}

.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0px;
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
</style>
</head>
<body>



<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="index.php">Home</a>
    
    <a href="Customerlogin.php">User login</a>
    <a href="adminLogin.php">Admin Login</a>
  </div>
</div>
<div style="background-color:#333; overflow:hidden;">
    <div style="color:#f1f1f1; font-size:30px; float:left; margin-left:44%; padding:20px; font-weight:bold;">CAR RENTAL</div>
    <span style="float:right; color:red; color:#f1f1f1; font-size:30px; margin-right:20px; padding:14px; cursor:pointer;" onclick="openNav()">&#9776; Menu</span>
    <br/>
</div>


<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="image7.jpg" style="width:100%">
  <div class="text">Lamborghini Gallardo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="image4.jpg" style="width:100%">
  <div class="text">LAMBORGHINI AVENTADOR</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="image5.jpg" style="width:100%">
  <div class="text">AUDI R8</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}




var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}




</script>
     
</body>
</html>
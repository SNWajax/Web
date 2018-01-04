<!DOCTYPE html>
<html>
<style>
body { 
    width: auto;
    font-family: "Verdana", sans-serif;
    background-color: darkslategrey;
}
    
/* Slideshow container */
.slideshow-container {
    padding-top: 70px;
    margin: auto;
    position: relative;
    z-index: 1;
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

nav {
        font-size: 20px;
    padding-bottom: 10px;
    position: fixed;
    z-index: 2;
    opacity: 0.9;
} 
    
input[type=text] {
    width: 700px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 15px;
    font-size: 10px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 20px;
    margin: auto;
}


ul {
    list-style-type: none;
    margin: 0;
    padding-left: 50px;
    overflow: hidden;
    background-color: #333;
    border-radius: 10px;
}

li  {
    float: right;
}
    
#search {
    padding: 5px;
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    padding-right: 20px;
}

ul li:first-child {
    float: left;
    text-decoration: none;
    padding-right: 10px;
}

.active{
    background-color: deepskyblue;
}
    
h1{
    color: deepskyblue;
    text-align: center;
}
    
.container {
    position: relative;
    width: 500px;
    height: 500px;
}

.image {
  opacity: 1;
  display: block;
  width: inherit;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: deepskyblue;
  border-radius: 10px;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
    
div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}
    
.btn-link{
  border:none;
        display: block;
      padding: 14px 16px;

  outline:none;
  background:none;
  cursor:pointer;
  color: aliceblue;
  text-decoration:none;
  font-family:inherit;
  font-size:inherit;
}
    .btn-link:hover{
        text-decoration: none;
    }
    
.btn-search {
    background-color: orangered;
    color: white;
    padding: 5px 10px;
    margin: 5px 4px;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    width: 100%;
    box-shadow: 0 4px 8px 0 rgba(1,1,1,1);
}
    
li:hover {
    background-color: slategrey;
    text-decoration: none;
}
    

</style>
<body>
    
<?php
require_once('../dbProj_connect.php');
    
//include 'ps3_checkavailability.php';
if(isset($_POST['login'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $pw = $_POST['pw'];      
    
    $query1 = "select uname 
                from user
                where uname = '".$uname."' and pw = '".$pw."'";
    $response1 = @mysqli_query($dbc, $query1);
    echo '<h1>Welcome '.$uname.'</h1>';
     
    if($response1){
        
 echo '      
 
 <nav>
<ul>
  <li><b>SoundRule</b></a></li>
  <li><form action="profile.php" method="post">
  <button type="submit" name="profile" value="profile" class="btn-link">Profile</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
  <li><form action="artists.php" method="post">
  <button type="submit" name="artists" value="artists" class="btn-link">Artists</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
  <li><form action="albums.php" method="post">
  <button type="submit" name="albums" value="albums" class="btn-link">Albums</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
<div id="search">
 <form action = "choose.php" method = "post">
  <li><input type="text" name="key" placeholder="Search.." size = "100" value = "">
    <input type="hidden" name="uname" value="'.$uname.'"></li>
    <li><button class = "btn-search" type="submit" name = "search">Search</button></li>
</form>
</div>
</ul>
</nav>


<div class="slideshow-container">
    
<div class="mySlides fade">
  <img src="images/10.jpg" style="width:100%">
</div>
    
<div class="mySlides fade">
  <img src="images/1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/4.jpg" style="width:100%">
</div>
    
<div class="mySlides fade">
  <img src="images/5.png" style="width:100%">
</div>

</div>
<br>
    
    <p><h1>ARTISTS</h1></p>

<div class="scrollmenu">
  <a href="#home">
      <div class="container">
  <img src="images/ts.jpg" alt="Avatar" class="image" name="" style="width:100%">
  <div class="middle">
    <div class="text">Taylor Swift</div>
  </div>
</div>
  <a href="#contact">   <div class="container">
  <img src="images/ad.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Adele</div>
  </div>
</div></a>
  <a href="#about">   <div class="container">
  <img src="images/cb.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Chris Brown</div>
  </div>
</div></a>
  <a href="#support">   <div class="container">
  <img src="images/em.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Eminem</div>
  </div>
</div></a>
  <a href="#blog">   <div class="container">
  <img src="images/es.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Ed Sheeran</div>
  </div>
</div></a>
  <a href="#tools">   <div class="container">
  <img src="images/jb.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Justin Bieber</div>
  </div>
</div></a>  
  <a href="#base">   <div class="container">
  <img src="images/lp.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Linkin Park</div>
  </div>
</div></a>
  <a href="#custom">   <div class="container">
  <img src="images/ri.png" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Rihanna</div>
  </div>
</div></a>
</div> ';
    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}else if(isset($_POST['home'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    
    $query1 = "select uname 
                from user
                where uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
    echo '<h1>Welcome '.$uname.'</h1>';
     
    if($response1){
        
 echo '      
 
 <nav>
<ul>
  <li><a class="active" href="#home"><b>SoundRule</b></a></li>
  <li><form action="profile.php" method="post">
  <button type="submit" name="profile" value="profile" class="btn-link">Profile</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
  <li><form action="artists.php" method="post">
  <button type="submit" name="artists" value="artists" class="btn-link">Artists</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
  <li><form action="albums.php" method="post">
  <button type="submit" name="albums" value="albums" class="btn-link">Albums</button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
  <form action = "choose.php" method = "post">
<div id="search">
  <form action = "choose.php" method = "post">
  <li><input type="text" name="key" placeholder="Search.." size = "100" value = "">
    <input type="hidden" name="uname" value="'.$uname.'"></li>
    <li><button class = "btn-search" type="submit" name = "search">Search</button></li>
</form>
</div>
<form>
</ul>
</nav>


<div class="slideshow-container">
    
<div class="mySlides fade">
  <img src="images/10.jpg" style="width:100%">
</div>
    
<div class="mySlides fade">
  <img src="images/1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/4.jpg" style="width:100%">
</div>
    
<div class="mySlides fade">
  <img src="images/5.png" style="width:100%">
</div>

</div>
<br>
    
    <p><h1>ARTISTS</h1></p>

<div class="scrollmenu">
  <a href="#home">
      <div class="container">
  <img src="images/ts.jpg" alt="Avatar" class="image" name="" style="width:100%">
  <div class="middle">
    <div class="text">Taylor Swift</div>
  </div>
</div>
  <a href="#contact">   <div class="container">
  <img src="images/ad.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Adele</div>
  </div>
</div></a>
  <a href="#about">   <div class="container">
  <img src="images/cb.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Chris Brown</div>
  </div>
</div></a>
  <a href="#support">   <div class="container">
  <img src="images/em.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Eminem</div>
  </div>
</div></a>
  <a href="#blog">   <div class="container">
  <img src="images/es.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Ed Sheeran</div>
  </div>
</div></a>
  <a href="#tools">   <div class="container">
  <img src="images/jb.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Justin Bieber</div>
  </div>
</div></a>  
  <a href="#base">   <div class="container">
  <img src="images/lp.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Linkin Park</div>
  </div>
</div></a>
  <a href="#custom">   <div class="container">
  <img src="images/ri.png" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Rihanna</div>
  </div>
</div></a>
</div> ';
    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}
?>
    
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>
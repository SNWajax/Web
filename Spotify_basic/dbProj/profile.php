<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
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
    position: relative;
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
        padding: 7px;
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

li:hover {
    background-color: slategrey;
    text-decoration: none;
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

ul li:first-child {
    float: left;
    text-decoration: none;
    padding-right: 10px;
    
}
    
    table {
        padding-top: 50px;
    }

.active{
    background-color: deepskyblue;
}
    
h1{
    color: deepskyblue;
    text-align: center;
}
    
    h2.prof{
        text-align: center;
        color: aqua;
    }
    
    .btn-option{
            background-color: blueviolet;
        position: absolute;
        top: 25%;
  left: 25%;
    }

.text {
  background-color: deepskyblue;
  border-radius: 10px;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
    
    button.prof-but {
        color: white;
        background-color: darkslategray;
        display: block;
        margin-top: 5%;
        width: 100%;
        height: auto;
        padding: 10px;
    }
    
    button.prof-but:hover{
        opacity: .7;    
    }
    
    button.scroll-but {
        color: white;
        background-color: darkslategray;
        width: 200px;
        height: 200px;
    }
    
    button.scroll-but:hover{
        opacity: .7;    
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
    
.container {
    position: relative;
    width: 350px;
    height: 350px;
    background-color: darkslategray;
      transition: .5s ease;
  backface-visibility: hidden;
        display: inline-block;
}
    
.outer-but {
    position: relative;
    width: 350px;
    height: 350px;
    background-color: deepskyblue;
      transition: .5s ease;
  backface-visibility: hidden;
        display: inline-block;
}
    
    .btn-option{
            background-color: blueviolet;
        position: absolute;
        text-align: center;
        padding: 10px;
        color: aliceblue;
        top: 35%;
  left: 20%;
    }
    
    .btn-in-option{
        background-color: aqua;
        border: 15px;
    }

.image {
  opacity: 1;
  display: block;
  width: inherit;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.inner-but {
  transition: .5s ease;
  opacity: .6;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .btn-option {
  opacity: 0.3;
}

.container:hover .inner-but {
  opacity: 1;
}


</style>
<body>
    
<?php    
//include 'ps3_checkavailability.php';
if(isset($_POST['profile'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    
    $query5 = "select name, ucity, email
                from user
                where uname = '".$uname."'";
    $response5 = @mysqli_query($dbc, $query5);
    $row = mysqli_fetch_array($response5);
    $name = $row['name'];
    $ucity = $row['ucity'];
    $email = $row['email'];
    
    $query1 = "select pid, ptitle, pdate, ptype
            from playlist
            where uname like '".$uname."%'";
    $response1 = @mysqli_query($dbc, $query1);
        
 echo '      
 <nav>
<ul>
  <li><form action="home.php" method="post">
  <button type="submit" name="home"  class="btn-link"><b>SoundRule</b></button>
  <input type="hidden" name="uname" value="'.$uname.'">
</form></li>
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
            <div class="w3-sidebar w3-teal w3-bar-block" style="width:25%">
            <h1><b>My Profile</b></h1>
                <form action = "edit.php" method = "post">
                <img src = "images/lp.jpg" style= "width:70%; margin-left:15%; margin-top:5%; margin-bottom:5%; border-radius: 150px;">
            <h2 class = "prof"><b>'.$name.'</b></h2>
            <h2 class = "prof"><b>'.$ucity.'</b></h2>
            <h2 class = "prof"><b>'.$email.'</b></h2>
            <form action = "edit.php" method = "post">
                        <button class = "prof-but" name = "edit">Update Profile</button>
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "name" value = "'.$name.'">
                        <input type = "hidden" name = "ucity" value = "'.$ucity.'">
                        <input type = "hidden" name = "email" value = "'.$email.'">
            </form>
            </div>
            <div style = "margin-left: 26%; margin-right: 1%;">
             <p><h1><b>My Playlists</b></h1></p>
            
            <div class="scrollmenu">';
    
    
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $pid = $row['pid'];
            $ptitle = $row['ptitle'];
            $pdate = $row['pdate'];
            $ptype = $row['ptype'];

            echo'
                        <div class="container">
                        <img src="images/blue.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "playlistTrack.php" method = "post">
                        <button class = "btn-in-option" name = "playlistTrack" type = "submit">'.$ptitle.'</button>
                        <input type = "hidden" name = "ptitle" value = "'.$ptitle.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "pid" value = "'.$pid.'">
                    </form>
                    </div>
                </div>';
        } 
          echo '
          <div class="container">
                        <img src="images/black.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "addPlay.php" method = "post">
                        <button class = "btn-in-option" name = "addPlay" type = "submit">Add Playlist</button>
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
          
     $query2 = "select a.aname, a.aid
            from likes l join artists a on l.aid = a.aid
            where l.uname = '".$uname."'";
    $response2 = @mysqli_query($dbc, $query2);
          
          echo ' 
          <p><h1><b>Favourite Artists</b></h1></p>
            <div class="scrollmenu">';
          
      if($response2){
        while($row = mysqli_fetch_array($response2)){

            $aname = $row['aname'];
            $aid = $row['aid'];
             echo'
            <div class="container">
                        <img src="images/c.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn-in-option" name = "playArt" type = "submit">'.$aname.'</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                    </div>
                </div>';
            
        }}
          echo '</div>';

           $query3 = "select user
                    from follow
                    where followedby = '".$uname."'";
    $response3 = @mysqli_query($dbc, $query3);
          echo '<p><h1><b>Favourite Users</b></h1></p>
            <div class="scrollmenu">';
          
      if($response3){
        while($row = mysqli_fetch_array($response3)){

            $user = $row['user'];
             echo'
             <div class="container">
                        <img src="images/b.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "users.php" method = "post">
                        <button class = "btn-in-option" name = "users" type = "submit">'.$user.'</button>
                        <input type = "hidden" name = "user" value = "'.$user.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
            
        }}
          echo '
            </div>';
          
    echo '
        <p>
            <form action="history.php" method="post">
                <button type="submit" name="history" class="btn-link">Check History</button>
                <input type="hidden" name="uname" value="'.$uname.'">
            </form>
        <p>
        </div>
    ';

          
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
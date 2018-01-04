<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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
if(isset($_POST['users'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $user = $_POST['user'];
        
    $query1 = "select uname as user, name
            from user 
            where uname like '%".$user."%';";
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
<table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
        <thead>
        <tr>
            <td align="left"><b>Username</b></td>
            <td align="left"><b>Name</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $user = $row['user'];
            $name = $row['name'];

            echo '<td align="left">' . 
                    $user. 
                '</td>
                <td align="left">' . 
                    $name . 
                '</td>
                <td align = "left">
                <form action = "users.php" method = "post">
                    <input type="submit" name="follow" value = "Follow" class="btn btn-primary">
                    <input type = "hidden" name = "user" value = "'.$user.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                </form>
                </td>';
            echo '</tr>';
            
            $query2 = "select pid, ptitle, pdate, ptype
            from playlist
            where uname like '".$user."%' and ptype != 'private'";
    $response2 = @mysqli_query($dbc, $query2);
            echo '<p><h1>'.$user.'\'s Playlists</h1></p>
            
            <div class="scrollmenu">';
          while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $pid = $row['pid'];
            $ptitle = $row['ptitle'];
            $pdate = $row['pdate'];
            $ptype = $row['ptype'];

            echo'
                <div class="container">
                        <img src="images/jb.jpg" alt="Avatar" class="image" name="" style="width:100%">
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
            echo '</div>';
        }           

    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}
    else if(isset($_POST['follow'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = mysqli_real_escape_string($dbc, $_POST['uname']);
    $user = mysqli_real_escape_string($dbc, $_POST['user']);
        
    $query1 = "select uname as user, name
            from user 
            where uname like '%".$user."%';";
    $response1 = @mysqli_query($dbc, $query1);
        
      $query2 = "insert into follow (`user`, followedby)
                values ('".$user."', '".$uname."')";
    $response2 = @mysqli_query($dbc, $query2);
        
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
<table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
        <thead>
        <tr>
            <td align="left"><b>Username</b></td>
            <td align="left"><b>Name</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $user = $row['user'];
            $name = $row['name'];

            echo '<td align="left">' . 
                    $user. 
                '</td>
                <td align="left">' . 
                    $name . 
                '</td>
                <td align = "left">
                <form action = "users.php" method = "post">
                    <input type="submit" name="users" value = "UnFollow" class="btn btn-primary">
                    <input type = "hidden" name = "user" value = "'.$user.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                </form>
                </td>';
            echo '</tr>';
            
            $query2 = "select pid, ptitle, pdate, ptype
            from playlist
            where uname like '".$user."%' and ptype != 'private'";
    $response2 = @mysqli_query($dbc, $query2);
          while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $pid = $row['pid'];
            $ptitle = $row['ptitle'];
            $pdate = $row['pdate'];
            $ptype = $row['ptype'];

            echo'
            <p><h1>'.$user.'\'s Playlists</h1></p>
            
            <div class="scrollmenu">
                <div class = outer-but>
                    <button class = "btn-option" style = "background-color: darkslategray">'.$ptitle.'</button>
                    <div class = inner-but>
                        <button class = "btn-in-option">'.$ptype.'</button>
                    </div>
                </div>
            </div>';
        }
        }           

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
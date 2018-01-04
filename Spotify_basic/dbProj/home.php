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
    color: aqua;
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
   ''' overflow-x: hidden;  '''
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
    background-color: deepskyblue;
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
  opacity: 0.7;
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
    
.outer-but:hover .btn-option {
  opacity: 0.3;
}

.outer-but:hover .inner-but {
  opacity: 1;
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
    
    div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu form button {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu button:hover {
    background-color: #777;
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
        display: inline-block;
        background-color: darkslategray;
        width: 200px;
        height: 200px;
    }
    
    button.scroll-but:hover{
        opacity: .7;    
    }
    

</style>
<body>
    
<?php
require_once('../dbProj_connect.php');
    
//include 'ps3_checkavailability.php';
if(isset($_POST['login'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    
    $uname = mysqli_real_escape_string($dbc, $_POST['uname']);
    $pw = mysqli_real_escape_string($dbc, $_POST['pw']);      
    
    $query1 = "select uname 
                from user
                where uname = '".$uname."' and pw = '".$pw."'";
    $response1 = @mysqli_query($dbc, $query1);
    
    while($row = mysqli_fetch_array($response1)){
    $user_name = $row['uname'];
    }
    
    $query2 = "select aid, aname, adesc
                from artists
                where aid like '10_'";
    $response2 = @mysqli_query($dbc, $query2);
    
    $query3 = "select abid, abtitle, abdate
                from albums";
    $response3 = @mysqli_query($dbc, $query3);
    
    $query4 = "select uname as user, name
                from user
                where uname != '".$uname."'";
    $response4 = @mysqli_query($dbc, $query4);
    
    $query5 = "select name
                from user
                where uname = '".$uname."'";
    $response5 = @mysqli_query($dbc, $query5);
    while($row = mysqli_fetch_array($response5)){
        $name = $row['name'];
    }
    
    
    echo '<h1>Welcome '.$name.'</h1>';
     
    if($user_name == $uname){
        
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
<br>';
        
        if($response2){
     echo'       
            <p><h1>Artists</h1></p>
            
            <div class="scrollmenu">
            <div class="container">
                        <img src="images/lp.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ad.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park and JayZ</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park and JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
         <div class="container">
                        <img src="images/em.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Eminem</button>
                        <input type = "hidden" name = "aname" value = "Eminem">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/se.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Katy Perry</button>
                        <input type = "hidden" name = "aname" value = "Katy Perry">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ts.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">JayZ</button>
                        <input type = "hidden" name = "aname" value = "JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/jb.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Justin Timerlake</button>
                        <input type = "hidden" name = "aname" value = "Justin Timerlake">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/FOB.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Fall Out Boys</button>
                        <input type = "hidden" name = "aname" value = "Fall Out Boys">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/PinkFloyd.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Pink Floyd</button>
                        <input type = "hidden" name = "aname" value = "Pink Floyd">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                </div>';
    /*         while($row = mysqli_fetch_array($response2)){
             $aid = $row['aid'];
             $aname = $row['aname'];
             $adesc = $row['adesc'];
             
    echo'   
              
                    <div class="container">
                        <img src="images/10.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">'.$aname.'</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
              ';
             }      */
     echo '       </div>
<br>';
           }
        
         if($response3){
     echo'       
            <p><h1>Albums</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response3)){
             $abid = $row['abid'];
             $abtitle = $row['abtitle'];
             $abdate = $row['abdate'];
             
    echo'        <div class="container">
                        <img src="images/a.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn-in-option" name = "playAlb" type = "submit">'.$abtitle.'</button>
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
             }
     echo '       </div>
<br>';
           }
        
        if($response4){
     echo'       
            <p><h1>Users</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response4)){
             $user = $row['user'];
             $name = $row['name'];
             
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
             }
     echo '       </div>
<br>';}
        
        
    } else {

        echo "<h1>Incorrect password!</h1><br />Please go back and input correct password.";
    }
    
    
mysqli_close($dbc);
}
    else if(isset($_POST['home'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = mysqli_real_escape_string($dbc, $_POST['uname']);
    
    $query1 = "select uname 
                from user
                where uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
    
     $query2 = "select aid, aname, adesc
                from artists";
    $response2 = @mysqli_query($dbc, $query2);
    
    $query3 = "select abid, abtitle, abdate
                from albums";
    $response3 = @mysqli_query($dbc, $query3);
    
    $query4 = "select uname as user, name
                from user
                where uname != '".$uname."'";
    $response4 = @mysqli_query($dbc, $query4);
     
    if($response1){
        
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
<br>';
        
        if($response2){
     echo'       
            <p><h1>Artists</h1></p>
            
            <div class="scrollmenu">
            <div class="container">
                        <img src="images/lp.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ad.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park and JayZ</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park and JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
         <div class="container">
                        <img src="images/em.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Eminem</button>
                        <input type = "hidden" name = "aname" value = "Eminem">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/se.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Katy Perry</button>
                        <input type = "hidden" name = "aname" value = "Katy Perry">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ts.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">JayZ</button>
                        <input type = "hidden" name = "aname" value = "JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/jb.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Justin Timerlake</button>
                        <input type = "hidden" name = "aname" value = "Justin Timerlake">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/FOB.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Fall Out Boys</button>
                        <input type = "hidden" name = "aname" value = "Fall Out Boys">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/PinkFloyd.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Pink Floyd</button>
                        <input type = "hidden" name = "aname" value = "Pink Floyd">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                </div>';
           }
        
        if($response3){
     echo'       
            <p><h1>Albums</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response3)){
             $abid = $row['abid'];
             $abtitle = $row['abtitle'];
             $abdate = $row['abdate'];
             
    echo'        <div class="container">
                        <img src="images/a.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "albums.php" method = "post">
                        <button class = "btn-in-option" name = "album" type = "submit">'.$abtitle.'</button>
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
             }
     echo '       </div>
<br>';
           }
        
        if($response4){
     echo'       
            <p><h1>Users</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response4)){
             $user = $row['user'];
             $name = $row['name'];
             
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
             }
     echo '       </div>
<br>';}
        
    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}
      /* else if(isset($_POST['addTo'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $tid = $_POST['tid'];
    $pid = $_POST['pid'];
    
    $query1 = "select uname 
                from user
                where uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
    
     $query2 = "select aid, aname, adesc
                from artists";
    $response2 = @mysqli_query($dbc, $query2);
    
    $query3 = "select abid, abtitle, abdate
                from albums";
    $response3 = @mysqli_query($dbc, $query3);
    
    $query4 = "select uname as user, name
                from user
                where uname != '".$uname."'";
    $response4 = @mysqli_query($dbc, $query4);
        
    $query5 = "insert into `playlist track` (pid, tid)
            values (".$pid.", ".$tid.")";
    $response5 = @mysqli_query($dbc, $query5);   
     
    if($response1){
        
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
<br>';
        
        if($response2){
     echo'       
            <p><h1>Artists</h1></p>
            
            <div class="scrollmenu">
            <div class="container">
                        <img src="images/lp.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ad.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Linkin Park and JayZ</button>
                        <input type = "hidden" name = "aname" value = "Linkin Park and JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
         <div class="container">
                        <img src="images/em.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Eminem</button>
                        <input type = "hidden" name = "aname" value = "Eminem">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/se.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Katy Perry</button>
                        <input type = "hidden" name = "aname" value = "Katy Perry">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/ts.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">JayZ</button>
                        <input type = "hidden" name = "aname" value = "JayZ">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/jb.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Justin Timerlake</button>
                        <input type = "hidden" name = "aname" value = "Justin Timerlake">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/FOB.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Fall Out Boys</button>
                        <input type = "hidden" name = "aname" value = "Fall Out Boys">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>
                <div class="container">
                        <img src="images/PinkFloyd.jpg" alt="Avatar" class="image" name="" style="width:100%">
                        <div class = inner-but>
                    <form action = "artists.php" method = "post">
                        <button class = "btn-in-option" name = "artist" value = "artist" type = "submit">Pink Floyd</button>
                        <input type = "hidden" name = "aname" value = "Pink Floyd">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
           }
        
        if($response3){
     echo'       
            <p><h1>Albums</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response3)){
             $abid = $row['abid'];
             $abtitle = $row['abtitle'];
             $abdate = $row['abdate'];
             
    echo'        <div class = outer-but>
                    <button class = "btn-option" style = "background-color: darkslategray">'.$abtitle.'</button>
                    <div class = inner-but>
                        <form action = "albums.php" method = "post">
                        <button class = "btn-in-option" name = "album" type = "submit">'.$abdate.'</button>
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                    </div>
                </div>';
             }
     echo '       </div>
<br>';
           }
        
        if($response4){
     echo'       
            <p><h1>Users</h1></p>
            
            <div class="scrollmenu">';
             while($row = mysqli_fetch_array($response4)){
             $user = $row['user'];
             $name = $row['name'];
             
    echo'        <form action = "users.php" method = "post">
                        <button class = "scroll-but" name = "users">'.$user.'</button>
                        <input type = "hidden" name = "user" value = "'.$user.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>';
             }
     echo '       </div>
<br>';}
        
    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}*/
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
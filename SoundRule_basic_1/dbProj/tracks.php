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

</style>
<body>
    
<?php    
    if(isset($_POST['playArt'])){
    require_once('../dbProj_connect.php');
   
    $uname = $_POST['uname'];
    $aname = $_POST['aname'];
    
    $query1 = "select t.tid, t.tname, b.abtitle, t.tdur, t.abid
from tracks as t join albums as b on t.abid = b.abid
where t.aname like '%".$aname."%'
order by tid";
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
            <td align="left"><b>Track</b></td>
            <td align="left"><b>Duration</b></td>
            <td align="left"><b>Album</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $tname = $row['tname'];
            $tdur = $row['tdur'];
            $abtitle = $row['abtitle'];
            $tid = $row['tid'];
            $abid = $row['abid'];

            echo '<td align="left">' . 
                    $tname . 
                '</td>
                <td align="left">' . 
                    $tdur . 
                '</td>
                <td align="left">'.
                    $abtitle.
                '</td>
                <td align = "left">
                    <form action = "add.php" method = "post">
                        <input type="submit" name="add" value="Add to Playlist" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">
                    <form action = "tracks.php" method = "post">
                        <input type="submit" name="playArtHist" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<form action = "rate.php" method = "post">
                        <input type="submit" name="rateArt" value="Rate" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    echo mysqli_error($dbc);
}
    else if(isset($_POST['playAlb'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $abid = $_POST['abid'];
    
    $query1 = "select t.tid, t.tname, t.aname, t.tdur
from tracks as t join albums as b on t.abid = b.abid
where t.abid like '%".$abid."%'
order by t.abid";
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
            <td align="left"><b>Track</b></td>
            <td align="left"><b>Duration</b></td>
            <td align="left"><b>Album</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $tname = $row['tname'];
            $tdur = $row['tdur'];
            $aname = $row['aname'];
            $tid = $row['tid'];

            echo '<td align="left">' . 
                    $tname . 
                '</td>
                <td align="left">' . 
                    $tdur . 
                '</td>
                <td align="left">'.
                    $aname.
                '</td>
                <td align = "left">
                    <form action = "add.php" method = "post">
                        <input type="submit" name="add" value="Add to Playlist" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">
                    <form action = "tracks.php" method = "post">
                        <input type="submit" name="playAlbHist" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<form action = "rate.php" method = "post">
                        <input type="submit" name="rateAlb" value="Rate" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    mysqli_close($dbc);
}
else if(isset($_POST['playAlbHist'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $abid = $_POST['abid'];
    $tid = $_POST['tid'];
    
    $query1 = "select t.tid, t.tname, t.aname, t.tdur
from tracks as t join albums as b on t.abid = b.abid
where t.abid like '%".$abid."%'";
    $response1 = @mysqli_query($dbc, $query1);
        
    $query2 = "INSERT INTO `history` (`uname`, `tid`, `htime`) VALUES ('".$uname."', '".$tid."',now());";
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
            <td align="left"><b>Track</b></td>
            <td align="left"><b>Duration</b></td>
            <td align="left"><b>Album</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $tname = $row['tname'];
            $tdur = $row['tdur'];
            $aname = $row['aname'];
            $tid = $row['tid'];

            echo '<td align="left">' . 
                    $tname . 
                '</td>
                <td align="left">' . 
                    $tdur . 
                '</td>
                <td align="left">'.
                    $aname.
                '</td>
                <td align = "left">'.
                    '<form action = "add.php" method = "post">
                        <input type="submit" name="add" value="Add to Playlist" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<form action = "tracks.php" method = "post">
                        <input type="submit" name="playAlbHist" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<form action = "rate.php" method = "post">
                        <input type="submit" name="rateAlb" value="Rate" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
        mysqli_close($dbc);
}
     else if(isset($_POST['playArtHist'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $aname = $_POST['aname'];
    $tid = $_POST['tid'];
    
    $query1 = "select t.tid, t.tname, b.abtitle, t.tdur
from tracks as t join albums as b on t.abid = b.abid
where t.aname like '%".$aname."%'
order by pid";
    $response1 = @mysqli_query($dbc, $query1);
        
     $query2 = "INSERT INTO `history` (`uname`, `tid`, `htime`) VALUES ('".$uname."', '".$tid."',now());";
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
            <td align="left"><b>Track</b></td>
            <td align="left"><b>Duration</b></td>
            <td align="left"><b>Album</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $tname = $row['tname'];
            $tdur = $row['tdur'];
            $abtitle = $row['abtitle'];
            $tid = $row['tid'];

            echo '<td align="left">' . 
                    $tname . 
                '</td>
                <td align="left">' . 
                    $tdur . 
                '</td>
                <td align="left">'.
                    $abtitle.
                '</td>
                <form action = "add.php" method = "post">
                        <input type="submit" name="add" value="Add to Playlist" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                <td align = "left">
                    <form action = "tracks.php" method = "post">
                        <input type="submit" name="playArtHist" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                
                <td align = "left">'.
                    '<form action = "rate.php" method = "post">
                        <input type="submit" name="rateArt" value="Rate" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    echo mysqli_error($dbc);
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
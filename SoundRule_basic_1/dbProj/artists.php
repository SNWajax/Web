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
//include 'ps3_checkavailability.php';
if(isset($_POST['artists'])){
    require_once('../dbProj_connect.php');
   
     $uname = $_POST['uname'];
    
    $query1 = "select a.aid, a.aname, a.adesc
            from likes l join artists a on l.aid = a.aid
            where l.uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
        
     $query2 = "select a.aid, a.aname, a.adesc
            from artists a
            where a.aid not in (select a.aid
					from likes l join artists a on l.aid = a.aid
					where uname = '".$uname."' )";
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
            <td align="left"><b>Artist</b></td>
            <td align="left"><b>Description</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="unlike" value="Unlike" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
        if($response2){
        while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="like" value="Like" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';
        }else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
} }
    else if(isset($_POST['like'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $aid = $_POST['aid'];
        echo $aid;
        
    $query3 = "insert into likes (uname, aid, ltime)
                values ('".$uname."', ".$aid.", now());";
    $response3 = @mysqli_query($dbc,$query3);
    
    $query1 = "select a.aid, a.aname, a.adesc
            from likes l join artists a on l.aid = a.aid
            where l.uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
        
     $query2 = "select a.aid, a.aname, a.adesc
            from artists a
            where a.aid not in (select a.aid
					from likes l join artists a on l.aid = a.aid
					where uname = '".$uname."' )";
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
            <td align="left"><b>Artist</b></td>
            <td align="left"><b>Description</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="unlike" value="Unlike" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
        if($response2){
        while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="like" value="Like" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    
    else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
} }
    
     else if(isset($_POST['unlike'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $aid = $_POST['aid'];
        
    $query3 = "delete from likes
            where uname = '".$uname."' and aid = '".$aid."';";
    $response3 = @mysqli_query($dbc, $query3);
    
    $query1 = "select a.aid, a.aname, a.adesc
            from likes l join artists a on l.aid = a.aid
            where l.uname = '".$uname."'";
    $response1 = @mysqli_query($dbc, $query1);
        
     $query2 = "select a.aid, a.aname, a.adesc
            from artists a 
            where a.aid not in (select a.aid
					from likes l join artists a on l.aid = a.aid
					where uname = '".$uname."' )";
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
            <td align="left"><b>Artist</b></td>
            <td align="left"><b>Description</b></td>
        </tr>
        </thead>
        <tbody>';
      if($response1){
        while($row = mysqli_fetch_array($response1)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="unlike" value="Unlike" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
        if($response2){
        while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $aid = $row['aid'];
            $aname = $row['aname'];
            $adesc = $row['adesc'];

            echo '
                <td align="left">' . 
                    $aname . 
                '</td>
                <td align="left">'.
                    $adesc.
                '</td>
                <td align = "left">
                    <form action = "artists.php" method = "post">
                        <input type="submit" name="like" value="Like" class="btn btn-primary">
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                        <input type = "hidden" name = "aid" value = "'.$aid.'">
                    </form>
                </td>
                <td>
                    <form action = "tracks.php" method = "post">
                        <button class = "btn btn-primary" name = "playArt" type = "submit">Tracks</button>
                        <input type = "hidden" name = "aname" value = "'.$aname.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    
    else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
} }
 /*   else if(isset($_POST['artist'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $aname = $_POST['aname'];
    
    $query1 = "select t.tid, t.tname, b.abtitle, t.tdur
from tracks as t join albums as b on t.abid = b.abid
where t.aname like '%".$aname."%'";
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

            echo '<td align="left">' . 
                    $tname . 
                '</td>
                <td align="left">' . 
                    $tdur . 
                '</td>
                <td align="left">'.
                    $abtitle.
                '</td>
                <td align = "left">'.
                    '<form action = "tracks.php" method = "post">
                        <input type="submit" name="playArt" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<input type="submit" name="like" value="Add to Playlist" class="btn btn-primary">
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    echo mysqli_error($dbc);
}   */
 /*   else if(isset($_POST['play'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $aname = $_POST['aname'];
    $tid
    
    $query1 = "select t.tid, t.tname, b.abtitle, t.tdur
from tracks as t join albums as b on t.abid = b.abid
where t.aname like '%".$aname."%'";
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
                <td align = "left">'.
                    '<form action = "albums.php" method = "post">
                        <input type="submit" name="play" value="Play" class="btn btn-primary">
                        <input type = "hidden" name = "tid" value = "'.$tid.'">
                        <input type = "hidden" name = "abid" value = "'.$abid.'">
                        <input type = "hidden" name = "uname" value = "'.$uname.'">
                    </form>
                </td>
                <td align = "left">'.
                    '<input type="submit" name="like" value="Add to Playlist" class="btn btn-primary">
                </td>';
            echo '</tr>';
        } 
    echo '</table>';

    }
    echo mysqli_error($dbc);
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
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
    
.center {
    margin: auto;
    width: 40%;
    border-radius: 10px;
    padding: 10px;
    background-color: deepskyblue;
    box-shadow: 0 4px 8px 0 rgba(2,2,2,2);
}

input[type=text], input[type=password] {
    width: 120%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background-color: orangered;
    color: white;
    padding: 14px 20px;
    margin: 10px 8px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    box-shadow: 0 4px 8px 0 rgba(1,1,1,1);
}
    
button:last-child{
    background-color: aliceblue;
    color: darkslategrey;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 10px;
    align-content: center;
}
    
ul {
    list-style-type: none;
    margin: 0;
}

a {
    text-decoration: none;
    color: aliceblue;
}

.jump{
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    padding-right: 20px; 
}

li  {
    float: left;
    padding-left: 5px;
}
</style>
<body background = "images/7.jpg">
    
<?php    
//include 'ps3_checkavailability.php';

if(isset($_POST['rateAlb'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname']; 
    $abid = $_POST['abid'];
    $tid = $_POST['tid'];
    
    $query1 = "select tname from tracks where tid = '".$tid."'";
    $response1 = @mysqli_query($dbc,$query1);
    while($row = mysqli_fetch_array($response1)){
        $tname = $row['tname'];
    }
        
 echo '      

<div class="center">
  <div class="container">
          <form action="rate.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <h1>Track: '.$tname.'</h1>
          </li>
      </ul>
      
      <ul>
          <li>
                        <input type = "number" name = "score" value = "" size = 1 min=1 max=5>         
          </li>
      </ul>
    <button type="submit" name = "rateTrackAlb"><b>Rate Your Jam!</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "abid" value = "'.$abid.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
    </form>
     <form action="tracks.php" method="post">
        <button type="submit" name = "playAlb"><b>Continue Rocking</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "abid" value = "'.$abid.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
     </form>
  </div>
</div>';

    }
    else if(isset($_POST['rateTrackAlb'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname']; 
    $abid = $_POST['abid'];
    $tid = $_POST['tid'];
    $score = $_POST['score'];
    echo $score;
    
    $query1 = "select tname from tracks where tid = '".$tid."'";
    $response1 = @mysqli_query($dbc,$query1);
    while($row = mysqli_fetch_array($response1)){
        $tname = $row['tname'];
    }
        
    $query2 = "INSERT INTO rating (uname, tid, score, rtime) 
                VALUES('".$uname."', '".$tid."', '".$score."', now()) 
                ON DUPLICATE KEY UPDATE    
                score = '".$score."';";
    $response2 = @mysqli_query($dbc,$query2);
        
 echo '      

<div class="center">
  <div class="container">
          <form action="rate.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <h1>Track: '.$tname.'</h1>
          </li>
      </ul>
      
      <ul>
          <li>
                        <input type = "number" name = "score" value = "'.$score.'" size = 1 min=1 max=5>         
          </li>
      </ul>
    <button type="submit" name = "rateTrackAlb"><b>Rate Your Jam!</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "abid" value = "'.$abid.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
    </form>
     <form action="tracks.php" method="post">
        <button type="submit" name = "playAlb"><b>Continue Rocking</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "abid" value = "'.$abid.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
     </form>
  </div>
</div>';

    }
    else if(isset($_POST['rateArt'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname']; 
    $aname = $_POST['aname'];
    $tid = $_POST['tid'];
    
    $query1 = "select tname from tracks where tid = '".$tid."'";
    $response1 = @mysqli_query($dbc,$query1);
    while($row = mysqli_fetch_array($response1)){
        $tname = $row['tname'];
    }
        
 echo '      

<div class="center">
  <div class="container">
          <form action="rate.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <h1>Track: '.$tname.'</h1>
          </li>
      </ul>
      
      <ul>
          <li>
                        <input type = "number" name = "score" value = "" size = 1 min=1 max=5>         
          </li>
      </ul>
    <button type="submit" name = "rateTrackArt"><b>Rate Your Jam!</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "aname" value = "'.$aname.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
    </form>
     <form action="tracks.php" method="post">
        <button type="submit" name = "playArt"><b>Continue Rocking</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "aname" value = "'.$aname.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
     </form>
  </div>
</div>';

    }
    else if(isset($_POST['rateTrackArt'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname']; 
    $aname = $_POST['aname'];
    $tid = $_POST['tid'];
    $score = $_POST['score'];
    echo $score;
    
    $query1 = "select tname from tracks where tid = '".$tid."'";
    $response1 = @mysqli_query($dbc,$query1);
    while($row = mysqli_fetch_array($response1)){
        $tname = $row['tname'];
    }
        
    $query2 = "INSERT INTO rating (uname, tid, score, rtime) 
                VALUES('".$uname."', '".$tid."', '".$score."', now()) 
                ON DUPLICATE KEY UPDATE    
                score = '".$score."';";
    $response2 = @mysqli_query($dbc,$query2);
        
 echo '      

<div class="center">
  <div class="container">
          <form action="rate.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <h1>Track: '.$tname.'</h1>
          </li>
      </ul>
      
      <ul>
          <li>
                        <input type = "number" name = "score" value = "'.$score.'" size = 1 min=1 max=5>         
          </li>
      </ul>
    <button type="submit" name = "rateTrackArt"><b>Rate Your Jam!</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "aname" value = "'.$aname.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
    </form>
     <form action="tracks.php" method="post">
        <button type="submit" name = "playArt"><b>Continue Rocking</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    <input type = "hidden" name = "aname" value = "'.$aname.'">
    <input type = "hidden" name = "tid" value = "'.$tid.'">
     </form>
  </div>
</div>';

    }
    
    else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
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
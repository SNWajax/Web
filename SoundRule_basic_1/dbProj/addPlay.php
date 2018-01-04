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

if(isset($_POST['addPlay'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];   
        
 echo '      

<div class="center">
  <div class="container">
          <form action="addPlay.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <input type="text" placeholder="PlaylistTitle" name="ptitle" size = "30" value = "" required>
          </li>
      </ul>
      
      <ul>
            <li>
              <input type="text" placeholder="Playlist ID" name="pid" size = "30" value = "" required>          
          </li>
          <li>
              <input type="text" placeholder="Playlist Type" name="ptype" size = "30" value = "" required>          
          </li>
      </ul>
    <button type="submit" name = "addPlayEdit"><b>Create Your Jam!</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    </form>
     <form action="profile.php" method="post">
        <button type="submit" name = "profile"><b>Fallback</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
     </form>
  </div>
</div>';

    }
    
    else if(isset($_POST['addPlayEdit'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $uname = $_POST['uname'];
    $ptitle = $_POST['ptitle'];
    $ptype = $_POST['ptype'];
    $pid = $_POST['pid'];
        
        echo $pid, $ptitle, $ptype, $uname;
    
    $query1 = "insert into playlist (pid, ptitle, pdate, ptype, uname)
            values ('".$pid."', '".$ptitle."', now(), '".$ptype."', '".$uname."')";
    $response1 = @mysqli_query($dbc, $query1);
        
 echo '      

<div class="center">
  <div class="container">
          <form action="edit.php" method="post">  
      <ul>
          <li>
              <h1>Username: '.$uname.'</h1>
          </li>
          <li>
              <input type="text" placeholder="PlaylistTitle" name="ptitle" size = "30" value = "" required>
          </li>
      </ul>
      
      <ul>
            <li>
              <input type="text" placeholder="Playlist ID" name="pid" size = "30" value = "" required>          
          </li>
          <li>
              <input type="text" placeholder="Playlist Type" name="ptype" size = "30" value = "" required>          
          </li>
      </ul>
    <button type="submit" name = "edit"><b>Update</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
    </form>
     <form action="profile.php" method="post">
        <button type="submit" name = "profile"><b>Fallback</b></button>
    <input type = "hidden" name = "uname" value = "'.$uname.'">
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
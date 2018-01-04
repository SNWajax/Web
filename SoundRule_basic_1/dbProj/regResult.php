<!DOCTYPE html>
<html>
<style>

#logo{
    text-align: center;
    padding-bottom: 20px;
    font-size: 35px;
    color: aliceblue;
}
    
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
    width: 150%;
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

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body background = "images/7.jpg">
    <div id="logo">
        <b>SoundRule</b>
    </div>
<?php
if(isset($_POST['reg'])){
    require_once('../dbProj_connect.php');

//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $psw = $_POST['psw'];
    $psw2 = $_POST['psw2'];        

      if($psw == $psw2){
          
          $uname = $_POST['uname'];
          $name = $_POST['name'];
          $email = $_POST['email'];
          $city = $_POST['city'];
                    
          $query1 = "insert into user (uname, pw, `name`, email, ucity)
                values ('".$uname."', '".$psw."', '".$name."', '".$email."', '".$city."');";
          $response1 = @mysqli_query($dbc, $query1);
          
          echo 'Welcome to the Culb Homie!
          <h1><a href = "http://localhost/dbProj/index.php">Click here to Login</a></h1>';
          
    } else {

        echo 'Passwords entered do not match!<br />
        <h1><a href = "http://localhost/dbProj/register.php">Click here to go back to Register</a></h1>';      

        echo mysqli_error($dbc);

    }
mysqli_close($dbc);
}
?>
</body>
</html>

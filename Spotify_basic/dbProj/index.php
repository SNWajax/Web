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
    width: 100%;
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
    overflow: hidden;
}

li  {
    float: left;
    padding-left: 10px;
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
<body background = "images/3.jpg">
    <div id="logo">
        <b>SoundRule</b>
    </div>

<div class="center">

<form action="home.php" method="post">
  <div class="imgcontainer">
    <img src="music.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
  <!--  <label><b>Username</b></label> -->     
    <input type="text" placeholder="Enter Username" name="uname" size = "100" value = "" required>
    <input type="password" placeholder="Enter Password" name="pw" size = "100" value = "" required>
      
      <button type="submit" name="login"><b>Let's Roll</b></button>
    <a class="jump" href="http://localhost/dbProj/register.php"><b>REGISTER</b></a>
  </div>
    
</form>
</div>
</body>
</html>

<?php
	include_once("./assets/php/db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "coursework"); // use parameters given in db_connect.php
	if($con === false) { // if the connection is unsuccessful
        die("ERROR: Could not connect to MySQL database. "); // end attempt to connect
    } else {
        echo '<p style="color: white;">Connected to MySQL database</p>'.$_SERVER["SERVER_PROTOCOL"]; // print out message if connected
    }
?>
<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title>Interactive login form</title><!-- title of login form-->
    <link rel = "stylesheet" href = "./assets/css/welcome_style.css">
    <script src = "./assets/js/loginValidate.js"></script>
</head>
<div>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>

<div class="text">
    <span>WE</span>
    <span>LC</span>
    <span>OM</span>
    <span>E</span>
    <span>!</span>
</div>

<div class = "guidance">
    <p>This is Zayaan's accommodation system!</p>
    
</div>

<div class = "guidance2">
    <p>LOGIN to gain access -></p>
</div>

<div class = "guidance3">
    <p>Student?</p>
</div>

<div class = "studentRegister">
    <p><a href="./assets/php/studentRegister.php">Register</a></p>
</div>

<div class = "studentLogin">
    <p><a href="./assets/php/studentLogin.php">Login</a></p>
</div>


<body>
    <p style = "color: white" > For viewing purposes, use admin login: user: admin, pass: 123</p>
    <form class="loginBox" action = "index.php" method = "POST">
        <h1>
            Staff login
        </h1>
        <input type = "text" name = "" placeholder="Enter Username" id = "username">
        <input type = "text" name = "" placeholder="Enter Password" id = "password" autocomplete = "off">
        <input type = "submit" name = "" value = "Login" onclick="validate()"> <!-- for js script -->
    </form>

</body>
    <img class = "image1" src = "./images/giphy.gif" alt="arrow.gif">


</html>
 

<?php
	include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "coursework"); // use parameters given in db_connect.php
	if($con === false){
        die("ERROR: Could not connect. ");
    }	
?>

<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title>User Form</title><!-- title of login form-->
    <link rel = "stylesheet" href = "../css/studentLogin_style.css">
    <script src = "loginValidate.php"></script>
</head>

<div class = x>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>

<body>
    <form class="loginBox" action = "./loginValidate.php" method = "POST">
        <h1><label for = "studentURN">
            Student Login
        </label></h1>
        <input type = "text" id = "studentURN" name = "studentURN" placeholder="Enter URN" autocomplete = "off"> 
        <input type = "submit" name = "urn" value = "Login">
    </form>


</body>
    <img class = "image1" src = "../../images/giphy.gif" alt="arrow.gif">

</html>
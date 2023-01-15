<?php 
	include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "coursework"); // use parameters given in db_connect.php
	if($con === false){
        die("ERROR: Could not connect. ");
    }	

	$query = "SELECT CONCAT(Forename, SPACE(1), Surname) AS Students, se.URN, se.Course, se.Accomodation_Status
 FROM Tenant INNER JOIN Student_Enrolled AS se ON Tenant.URN = se.URN;"; // first query to run (display students enrolled)
	$result = mysqli_query($con, $query); // store the query and connection as a query object
	$query2 = "SELECT CONCAT(Forename, SPACE(1), Surname) AS Staff, URN FROM Tenant WHERE URN NOT IN (SELECT URN FROM Student_Enrolled);"; // second query to run (display staff)
	$result2 = mysqli_query($con, $query2); // store the query and connection as a query object
?>



<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title style = "color: #00b8ff;">User Form</title><!-- title of login form-->
	<link rel = "stylesheet" href = "../css/dataView.css">
    <script src = "NULL.js"></script>
</head>


<div class = x>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>

<body>

<h1 style = "color: white; font-family: Roboto Mono, monospace">You have registered successfully . User has chosen their accommodation -> Information has been stored on database</h1>

<p style = "color: white; font-family: Roboto Mono, monospace"> You can now log in and view your accommodation_details by clicking "Login" on the homepage! </p>
<p style = "color: white; font-family: Roboto Mono, monospace"> Click here to go back to the home page:</p>
<div class = "welcomeReturn">
    <p><a href="../index.php">Home</a></p>
</div>

</body>



</html>
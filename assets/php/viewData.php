<?php 
	include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "accommodation"); // use parameters given in db_connect.php
	if($con === false){
        die("ERROR: Could not connect. ");
    }	

	$query = "SELECT CONCAT(Forename, SPACE(1), Surname) AS Students, se.URN, se.Course, se.Accomodation_Status
 FROM Tenant INNER JOIN Student_Enrolled AS se ON Tenant.URN = se.URN;"; // first query to run (display students enrolled)
	$result = mysqli_query($con, $query); // store the query and connection as a query object
	
	$query2 = "SELECT CONCAT(Forename, SPACE(1), Surname) AS Staff, URN FROM Tenant WHERE URN NOT IN (SELECT URN FROM Student_Enrolled);"; // second query to run (display staff)
	$result2 = mysqli_query($con, $query2); // store the query and connection as a query object
	
	$query3 = "SELECT acc.Band, Count(acc.Room_No) AS total_rooms
	FROM accommodation_details as acc
	WHERE acc.Availability = 'Y'
	GROUP BY acc.Band;"; // third query to run (display total rooms per band)
	$result3 = mysqli_query($con, $query3); // store the query and connection as a query object

	$query4 = "SELECT Street, COUNT(addr.Address_ID) AS total_tenants
	FROM address AS addr
	INNER JOIN accommodation_details AS acc ON addr.Address_ID = acc.Address_ID
	GROUP BY addr.Street;";  // fourth query to run (display total rooms per band)
	$result4 = mysqli_query($con, $query4); // store the query and connection as a query object

	$query5 = "SELECT COUNT(acc.Address_ID) AS total_tenants
	FROM accommodation_details as acc;";  // fourth query to run (display total rooms per band)
	$result5 = mysqli_query($con, $query5); // store the query and connection as a query object
?>



<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title style = "color: #00b8ff;">User Form</title><!-- title of login form-->
	<link rel = "stylesheet" href = "../css/dataView.css">
    <script src = "NULL.js"></script>
</head>

<h1 style = "color : white"> fetching data from database: </h1>

<div class = x>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>

<body>
	<table class = "studentTable", align="center" border="1px" style="width: 300px; line-height: 30px; margin-top:25px; margin-left:20px; font-family: Roboto Mono, monospace">
	<tr>
		<th><h2 style = "color: white">Students Enrolled</h2></th>
	</tr>
	<t>
		<th style = "color: white">Students</th>
		<th style = "color: white">URN</th>
		<th style = "color: white">Course </th>
		<th style = "color: white">Accommodation_Status</th>
	</t>
	<?php
		while ($row = mysqli_fetch_assoc($result)) { // check  if a row exists to go over, if true continue
	?>
			<tr>
				<td style = "color: white"><?php echo $row["Students"]; ?></td> <!--print the data of columns Students from query-->
				<td style = "color: white"><?php echo $row["URN"]; ?></td> <!--print the data of columns URN from query-->
				<td style = "color: white"><?php echo $row["Course"]; ?></td> <!--print the data of columns Course from query-->
				<td style = "color: white"><?php echo $row["Accomodation_Status"]; ?></td> <!--print the data of columns Accommodation_Status from query-->
			</tr>
	<?php			
		}
		// free $result from $query1
		if (empty($result)) { // check if the result is null -> empty 
			mysqli_free_result($result); // and if so, free the result (query data) to not use up memory for a null result
		}
	?>
	</table>
	
<table class = "staffTable", align="center" border="1px" style="width: 300px; line-height: 30px; margin-top:-400px; margin-left:550px; font-family: Roboto Mono, monospace">
	<tr>
		<th><h2 style = "color: white">Current Staff</h2></th>
	</tr>
	<t>
		<th style = "color: white"> Staff </th>
		<th style = "color: white">URN</th>
	</t>
	<?php
		while ($row = mysqli_fetch_assoc($result2)) { // check  if a row exists to go over, if true continue
	?>
			<tr>
				<td style = "color: white"><?php echo $row["Staff"]; ?></td> <!--print the data of columns Staff from query-->
				<td style = "color: white"><?php echo $row["URN"]; ?></td> <!--print the data of columns URN from query-->
			</tr>
	<?php			
		}
		// free result for $result2 from $query2
		if (empty($result2)) { // check if the result is null -> empty 
			mysqli_free_result($result2); // and if so, free the result (query data) to not use up memory for a null result
		}
	?>
	</table>

<table class = "roomsPerBand", align="center" border="1px" style="width: 300px; line-height: 30px; margin-top: -250px; margin-left:900px; font-family: Roboto Mono, monospace">
	<tr>
		<th><h2 style = "color: white">Rooms Per Band</h2></th>
	</tr>
	<t>
		<th style = "color: white">Band</th>
		<th style = "color: white">Total Rooms</th>
	</t>
	<?php
		while ($row = mysqli_fetch_assoc($result3)) { // check  if a row exists to go over, if true continue
	?>
			<tr>
				<td style = "color: white"><?php echo $row["Band"]; ?></td> <!--print the data of columns Staff from query-->
				<td style = "color: white"><?php echo $row["total_rooms"]; ?></td> <!--print the data of columns URN from query-->
			</tr>
	<?php			
		}
		// free result for $result2 from $query3
		if (empty($result3)) { // check if the result is null -> empty 
			mysqli_free_result($result3); // and if so, free the result (query data) to not use up memory for a null result
		}
	?>
	</table>

<table class = "tenantsPerStreet", align="center" border="1px" style="width: 300px; line-height: 30px; margin-top: -250px; margin-left:1220px; font-family: Roboto Mono, monospace">
	<tr>
		<th><h2 style = "color: white">No. Of Tenants</h2></th>
	</tr>
	<t>
		<th style = "color: white">Street</th>
		<th style = "color: white">Tenants</th>
	</t>
	<?php
		while ($row = mysqli_fetch_assoc($result4)) { // check  if a row exists to go over, if true continue
	?>
			<tr>
				<td style = "color: white"><?php echo $row["Street"]; ?></td> <!--print the data of columns Staff from query-->
				<td style = "color: white"><?php echo $row["total_tenants"]; ?></td> <!--print the data of columns URN from query-->
			</tr>
	<?php			
		}
		// free result for $result2 from $query4
		if (empty($result4)) { // check if the result is null -> empty 
			mysqli_free_result($result4); // and if so, free the result (query data) to not use up memory for a null result
		}
	?>
	</table>

<table class = "totalTenants", align="center" border="1px" style="width: 100px; line-height: 30px; margin-top: 30px; margin-left:1300px; font-family: Roboto Mono, monospace">
	<t>
		<th style = "color: white">total_tenants</th>
	</t>
	<?php
		while ($row = mysqli_fetch_assoc($result5)) { // check  if a row exists to go over, if true continue
	?>
			<tr>
				<td style = "color: white"><?php echo $row["total_tenants"]; ?></td> <!--print the data of columns total_tenants from query-->
			</tr>
	<?php			
		}
		// free result for $result2 from $query4
		if (empty($result5)) { // check if the result is null -> empty 
			mysqli_free_result($result5); // and if so, free the result (query data) to not use up memory for a null result
		}
	?>
	</table>


<div class = "welcomeReturn">
	<p style = "color: white; font-family: Roboto Mono, monospace"> Click here to go back to the home page:</p>
    <p><a href="../../index.php">Home</a></p>
</div>

</body>



</html>
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
    <script src = "NULL.js"></script>
</head>

<div class = x>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>


<body>
    <p class = "loggedInText" style = "font-size: 30px;"> You have succesfully logged in! </p>
    <p style= "color: white; font-family; Roboto Mono, monospace, font-size: 30px;"> Your accommodation details: </p>

<?php

   session_start(); // starting session to use the variable from previous login page which stores the urn the user logs in with

   $urnBuffer = null;
   if (!empty($urnBuffer = $_SESSION["urnID"])) {
        $urnBuffer = $_SESSION["urnID"];  // using urn from student login
    } else {
        die('$'."_SESSION['urnID'] isn't set. Please reload the website");
    }

    $query = "SELECT accd.AccomDetails_ID, accd.Room_No, accd.Band, accd.Total_Cost
    FROM accommodation_details as accd
    INNER JOIN tenant 
    WHERE tenant.AccomDetails_ID = accd.AccomDetails_ID AND tenant.URN = '$urnBuffer'";
    $result = mysqli_query($con, $query);
?>




        <table class = "studentAccom", align="center" border="1px" style="width: 600px; line-height: 30px; margin-top: 250px; margin-left:500px; font-family: Roboto Mono, monospace">
        <div>
        <span>
        <p style= "color: white; margin-top: 100px; margin-left: 680px; font-size:28px;">URN: <?php echo $urnBuffer; ?></p>
        </div>  
        <div>
        <tr>
            <th><h2 style = "color: white">Accommodation Details</h2></th>
        </tr>
        <t>
            <th style = "color: white">AccomDetails_ID</th>
            <th style = "color: white">Room No</th>
            <th style = "color: white">Band</th>
            <th style = "color: white">Total Cost</th>
        </t>
        <?php
            while ($row = mysqli_fetch_assoc($result)) { // check  if a row exists to go over, if true continue
        ?>
                <tr>
                    <td style = "color: white"><?php echo $row["AccomDetails_ID"]; ?></td> <!--print the data of columns AccomDetailsID from query-->
                    <td style = "color: white"><?php echo $row["Room_No"]; ?></td> <!--print the data of columns RoomNo from query-->
                    <td style = "color: white"><?php echo $row["Band"]; ?></td> <!--print the data of columns Band from query-->
                    <td style = "color: white"><?php echo "£".$row["Total_Cost"]; ?></td> <!--print the data of TotalCost URN from query-->
                </tr>
        <?php			
            }
            // free result for $result from $query
            if (empty($result)) { // check if the result is null -> empty 
                mysqli_free_result($result); // and if so, free the result (query data) to not use up memory for a null result
            }
        ?>
        </table>
        </div>
        </span>


    
</body>

</html>
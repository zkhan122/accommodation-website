<?php
	include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "accommodation"); // use parameters given in db_connect.php

    if($con === false){
        die("ERROR: Could not connect. ");
    }
?>


<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title>User Form</title><!-- title of login form-->
    <link rel = "stylesheet" href = "../css/form_style.css">
    <script src = "NULL.js"></script>
</head>

<head>

    <title>My first website</title>

</head>

<body>

    <form  class = "registerForm" action = "./postFormData.php" method="POST">
        <div>
        <label for = "urnID">URN: </label>
        <input type = "text" id="urnID" name="urnID" placeholder="starts with 6 & len=7" maxlength="7" required>
        </div>

        <br>
        <div>
        
        <label for = "preference">Preference: </label>
        <select name = "preference" id = "preference" style="width: 300px;">
            <option>Select</option>
            <?php
                 $query = 'SELECT CONCAT(acp.AccomPreference_ID, SPACE(1), acp.BandType, SPACE(1), acp.Gender) 
                 as preference FROM accommodation_preference as acp;'; // query for data to populate drop down for accomPreference
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row["preference"].'</option>'; 
                }
                ?>
        </select>
        </div>

        <br>
        <div>
            <div>
        <p class = "accomDropDown" style="font-size: 15px; margin-left: -250px; margin-top: 100px;">Room info in order: AccomID, RoomNo, Band, Cost, Street</p>
            </div>
        <label for = "rooms_avail">Select a room: </label>
        <select name = "rooms_avail" id = "rooms_avail" style="width: 300px;">
            <option>Select</option>
            <?php
                 $query = '	SELECT CONCAT(acd.AccomDetails_ID, SPACE(1), acd.Room_No, SPACE(1), acd.Band, SPACE(1), acd.Total_Cost, SPACE(1), ad.Street) as info FROM accommodation_details as acd 
                 INNER JOIN Address as ad
                 WHERE ad.Address_ID = acd.Address_ID AND acd.Availability = "Y";'; // query for data to populate drop down for accomDetails
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row["info"].'</option>'; 
                }
                ?>
        </select>

        <br>
        <br>
        <div>
        <label for="title">Title:</label>
            
            <label for="mr">Mr</label>
            <input type="radio" id="mr" name="title" value="mr">

            <label for="ms">Ms</label>
            <input type="radio" id="ms" name="title" value="ms">

            <label for="mrs">Mrs</label>
            <input type="radio" id="mrs" name="title" value="mrs">
        </div>
        
        <br>
        <div>
        <label for = "fName">First Name: </label>
        <input type = "text" id="fName" name="fName" placeholder="e.g. Bob" required>
        </div>
        
        <br>
        <div>
        <label for = "lName">Surname: </label>
        <input type = "text" id="lName" name="lName" placeholder="e.g. Jones" required>
        </div>

        <br>
        <div>
        <label for = "course">Course:</label>
        <input type = "text" id="course" name="course" placeholder="e.g. Computer Science" required>
        </div>

        <br>
        <div>
        <label for = "course_level">Course Level: </label>
        <select name = "course_level" id = "course_level" style="width: 100px;">
            <option>Select</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        </div>

        <br>
        <div>
            <label for="studentType">Student Type:</label>
            
            <label for="undergraduate">Undergraduate</label>
            <input type="radio" id="undergraduate" name="studentType" value="undergraduate">

            <label for="postgraduate">Postgraduate</label>
            <input type="radio" id="postgraduate" name="studentType" value="postgraduate">
        </div>

        <div>
            <label for = "email">Email</label>
            <input type="email" name = "email" id="email" placeholder="e.g. bobjones@gmail.com">
        </div>

        
        <div>
            <label for="phone">phone #:</label>
            <input type="tel" id="phone" name="phone" placeholder="(077)-456-7890">
        </div>

        
        <div>
        <label for = "nationality">Nationality: </label>
        <input type = "text" id="nationality" name="nationality" placeholder="e.g. British" required>
        </div>

        
        <div>
        <label for = "ethnicity">Ethnicity: </label>
        <input type = "text" id="ethnicity" name="ethnicity" placeholder="e.g. Pakistani" required>
        </div>

        
        <div>
        <label for = "religion">Religion: </label>
        <input type = "text" id="religion" name="religion" placeholder="e.g. Muslim" required>
        </div>

        <div>
        <label for = "passportNumber">Passport Number: </label>
        <input type = "text" id="passportNumber" name="passportNumber" placeholder="" required>
        </div>

        <br>
        <div>
            <input type = "reset">
            <input type = "submit">
        </div>
    </form>

</body>


<div class = x>
    <div class="stars-01"></div>
    <div class="stars-02"></div>
    <div class="stars-03"></div>
    <div class="stars-04"></div>
</div>



  
</html>
 

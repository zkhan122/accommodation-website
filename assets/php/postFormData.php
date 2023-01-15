<?php
	include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
	$con = mysqli_connect("localhost", "root", "", "coursework"); // use parameters given in db_connect.php

    if($con === false){ // if connection fails 
        die("ERROR: Could not connect. "); // end attempt to connect
    }

    // inserting data 
    $urn = $_POST["urnID"]; // assign urn field to variable
    $preference = $_POST["preference"][0]; // assign AccomPreference_ID field to variable and access the field in drop down (first element at index 0)
    $roomPicked = $_POST["rooms_avail"][0]; // assign AccomDetails_ID field to variable and access the field in drop down (first element at index 0)
    $title = $_POST["title"]; // assign title field to variable
    $fName = $_POST["fName"]; // assign fName field to variable
    $lName = $_POST["lName"]; // assign lName field to variable
    $course = $_POST["course"]; // assign course field to variable
    $course_level = $_POST["course_level"]; // assign courseLevel field to variable
    $student_type = $_POST["studentType"]; // assign studentType field to variable
    $email = $_POST["email"]; // assign email field to variable
    $phone = $_POST["phone"]; // assign phonr field to variable
    $nationality = $_POST["nationality"]; // assign nationality field to variable
    $ethnicity = $_POST["ethnicity"]; // assign ethnicity field to variable
    $religion = $_POST["religion"]; // assign religion field to variable
    $passportNumber = $_POST["passportNumber"]; // assign passportNumber field to variable

    $query1 = "INSERT INTO student_enrolled(URN, Course, Course_Level, Accomodation_Status, Email, PhoneNo, Nationality, 
                Ethnicity, Religion, PassportNumber) 
    VALUES ('$urn', '$course', '$course_level', 'FOUND', '$email', '$phone', '$nationality', '$ethnicity', '$religion', '$passportNumber');";
    mysqli_query($con, $query1); // inserting data into student_enrolled table from input form

    $query2 = "INSERT INTO tenant(URN, Title, Forename, Surname, AccomDetails_ID, AccomPreference_ID)
    VALUES ('$urn', '$title', '$fName', '$lName', '$roomPicked', '$preference');"; // inserting data into tenant table from input form

    mysqli_query($con, $query2);

    $query3 = "INSERT INTO account(URN)
    VALUES ('$urn');"; // inserting data into account from input form

    mysqli_query($con, $query3);

    $query4 = "UPDATE accommodation_details
                SET Availability='N'
                WHERE AccomDetails_ID = '$roomPicked';";

    mysqli_query($con, $query4); // updating accommodation_details table to set availability for room picked to "N" (No), this 
                                    // will not be shown in drop down list
    


    header("Location: ./registerSuccess.php?signup=success"); // redirect

?>
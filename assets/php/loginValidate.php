<?php
    include_once("./db_connect.php"); // attempt to use the db_connect.php file to connect to sql db
    $con = mysqli_connect("localhost", "root", "", "coursework"); // use parameters given in db_connect.php
    if($con === false){
        die("ERROR: Could not connect. ");
    }	

    $urnID = $_POST["studentURN"];

    $urnStore = array();

    $query = "SELECT * FROM student_enrolled WHERE URN ='$urnID';";

    $result = mysqli_query($con, $query);
    
    $row = mysqli_fetch_array($result);

    if ($row != 0) {
        echo "URN FOUND";
        header("Location: ../php/studentValidated.php");
    } else {
        header("Location: ../../index.php");
    }
    
?>
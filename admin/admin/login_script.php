<?php

include "includes/conn.php";
include "includes/enctp.php";
session_start();
$tbl_name = "l_users"; // Table name


$username = $_POST['username']; // username sent from form
$password = $_POST['password']; // password sent from form


// To protect mysqli injection
$username = stripslashes($username);
$password = stripslashes($password);

//Query
$sql = sprintf("SELECT * FROM $tbl_name WHERE username='$username' and password='$password'");
$result = mysqli_query($allo, $sql);
// mysqli_num_row is counting table row
$rows = mysqli_fetch_assoc($result);


//Direct pages with different user levels
if ($rows > 0) {
    if ($rows['access_level'] == 0) {
        //User1
        //session_register("username");
        //session_register("password");
        $_SESSION['userNID'] = enctp($rows['username']);
        $_SESSION['userIID'] = enctp($rows['l_id']);
        $_SESSION['userLID'] = enctp($rows['access_level']);
        $_SESSION['userCID'] = enctp($rows['assigned_centers']);
        $_SESSION['userNAME'] = enctp($rows['fullname']);

        header('location: dashboard_sa.php');


    } elseif ($rows['access_level'] == 1) {
        $_SESSION['userNID'] = enctp($rows['username']);
        $_SESSION['userIID'] = enctp($rows['l_id']);
        $_SESSION['userLID'] = enctp($rows['access_level']);
        $_SESSION['userCID'] = enctp($rows['assigned_centers']);
        $_SESSION['userNAME'] = enctp($rows['fullname']);
        

        header('location: admin/dashboard_sa.php');

        // print_r($_SESSION);


    } else {
        // Error login
        echo "<script>alert('Invalid Username and/or Password!');
							window.location='./';
							</script>";
    }

} else {
//    echo "<script>alert('Not a user!');
//						window.location='./';
//						</script>";
}


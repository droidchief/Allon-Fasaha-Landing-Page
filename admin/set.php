<?php
  session_start();
   if (!isset($_SESSION['userNID'])) {
    
    header("location:./");
  }
  ?>
<?php
include"includes/conn.php";
include "includes/enctp.php";

// $stID = $_GET['st'];
// $sqll = $allo->query("SELECT * FROM access_students WHERE s_trackId='$stID'");
// $countR1 = mysqli_fetch_assoc($sqll);


// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if (isset($_POST['addC'])){
//         $c_name = $_POST['class_name'];
//         $insert0 = $sms->query("INSERT INTO class_srms(`class_name`, `class_status`) VALUES ('$c_name',1)") or die(mysqli_error($sms));
//         if ($insert0){
//             $showPop = '<div class="alert alert-success" role="alert">
//                             Class Added Successfully!
//                             </div>';

//         }
//     }
// }
?>
<?php

if(isset($_POST['updateS'])){
	if (isset($_POST['st_id'])) {
			$stID = $_POST['st_id'];
			$fname = $_POST['fname'];
			$password = $_POST['password'];
			$home = $_POST['home'];
			if (!empty($_POST['password'])) {
				$sqll = $allo->query("UPDATE `access_students` SET `fullname`='{$fname}', `s_password`='{$password}', `homeTown`='{$home}' WHERE s_trackId='$stID'");
				if ($sqll) {
					   $showPop = "<script>alert('Updated Successfully!');

                            window.location='students_details_a.php?st=".$stID."&center=".$_POST['centers']."';

                            </script>";

                		echo $showPop;
				}
			}else{
				$sqll = $allo->query("UPDATE `access_students` SET `fullname`='{$fname}',  `homeTown`='{$home}' WHERE s_trackId='$stID'");
				if ($sqll) {
					   $showPop = "<script>alert('Updated Successfully!');

                            window.location='students_details_a.php?st=".$stID."&center=".$_POST['centers']."';

                            </script>";

                		echo $showPop;
				}
			}
		}	
}
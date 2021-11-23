<?php

include "conn.php";

include "enctp.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['hidden_action'])){

        $s_name = ", ".$_POST['subject_name'];

        $ss_name = $_POST['subject_name'];

        $sss_name = $_POST['module'];

        $ss1_name = ", ".$_POST['module'];

        $c_id = $_POST['class_id'];

        $insert01 = $sms->query("SELECT class_id FROM subject_srms WHERE class_id='$c_id'") or die(mysqli_error($sms));

        $countR = mysqli_fetch_assoc($insert01);

        if ($countR>0){

            $update = $sms->query("

                            UPDATE `subject_srms` SET 

                                    `subject_name`= CONCAT(subject_name, '".$s_name."'),

                                    `module`= CONCAT(module, '".$ss1_name."') 

                            WHERE `class_id`=$c_id") or die(mysqli_error($sms));

            $showPop = "<script>alert('Subject Added!');

                            window.location='../classes.php';

                            </script>";

            echo $showPop;

        }else{

            $insert0 = $sms->query("INSERT INTO subject_srms(`class_id`, `subject_name`, `module`, `subject_status`) VALUES ('$c_id','$ss_name','$sss_name', 1)") or die(mysqli_error($sms));

            if ($insert0){

                $showPop = "<script>alert('Subject Added!');

                            window.location='../classes.php';

                            </script>";

                echo $showPop;

            }

        }

    }elseif (isset($_POST['updatei'])) {

        session_start();

         $username = decrtp($_SESSION['userIID']);

      

        $userN = $_POST['user_name'];

        $userC = $_POST['user_contact_no'];

        $userE = $_POST['user_email'];

        $userP = $_POST['user_password'];

        // $userI = $_POST['user_image'];

        

        $update = $sms->query("

                            UPDATE `user_srms` SET 

                                    `user_name`= '$userN',

                                    `user_email`= '$userE',

                                    `user_password`= '$userP',

                                    `user_contact_no`= '$userC'

                            WHERE `user_id`=$username") or die(mysqli_error($sms));

            if ($update){

              $_SESSION['userNID'] = enctp($userN);

              header("Location:../profile.php?success");

          }

    }elseif (isset($_POST['center'])) {

        $centerName = $_POST['centerN'];

        $lName = $_POST['loname'];

        $centerAbbr = $_POST['centerAbbr'];

        $insert01 = $allo->query("SELECT * FROM admin_center ORDER BY id DESC") or die(mysqli_error($allo));

        $countR = mysqli_num_rows($insert01);

       $countR1 = mysqli_fetch_assoc($insert01);

        if ($countR > 0) {

            $sp = explode("-", $countR1['center_id']);

            $r_c = $sp[1] + 1;

            $r_a = 'CENTER-'.$r_c;

            $insert012a = $allo->query("SELECT * FROM admin_center WHERE center_location='$lName' AND center_name='$centerName'") or die(mysqli_error($allo));

            $countRin = mysqli_num_rows($insert012a);





            if ($countRin > 0) {

               $showPop = "<div class='alert alert-danger' role='alert'>

                                Center already exists!

                                </div>";

                    echo $showPop;

            }else{

                $insert0 = $allo->query("INSERT INTO admin_center(`center_name`, `center_location`, `center_id`,`center_abbr`) VALUES ('{$centerName}','{$lName}','{$r_a}','{$centerAbbr}')") or die(mysqli_error($allo));

                if ($insert0){

                    $showPop = "<div class='alert alert-success' role='alert'>

                                Center added successfully!

                                <script>

                                location.reload();

                            </script>

                            ";

                    echo $showPop;

                   

                }

            }

        }else{

            $insert0 = $allo->query("INSERT INTO admin_center(`center_name`, `center_location`, `center_id`,`center_abbr`) VALUES ('{$centerName}','{$lName}','CENTER-1',{$centerAbbr})") or die(mysqli_error($allo));

            if ($insert0){

                $showPop = "<div class='alert alert-success' role='alert'>

                            Center added successfully!

                            </div>

                            <script>

                                location.reload();

                            </script>

                            ";

                echo $showPop;

               



            }

        }









    }elseif (isset($_POST['admin'])) {

        $fname = $_POST['fullname'];

        $password = $_POST['password'];

        $phone = $_POST['phone'];

        $user = $_POST['username'];

        $center = $_POST['centerID'];

        
        $insert01 = $allo->query("SELECT * FROM l_users WHERE username='$user'") or die(mysqli_error($allo));

        $countR = mysqli_num_rows($insert01);

       $countR1 = mysqli_fetch_assoc($insert01);

        if ($countR > 0) {

            

                $showPop = "<div class='alert alert-danger' role='alert'>

                            User already exists!

                            </div>";

                echo $showPop;

        }else{

            $insert0 = $allo->query("INSERT INTO l_users(`fullname`, `username`, `password`, `assigned_centers`, `phone`, `img`, `access_level`) VALUES ('$fname','$user','$password','$center','$phone','',1)") or die(mysqli_error($allo));

            if ($insert0){

                $showPop = "<div class='alert alert-success' role='alert'>

                            Admin Registered successfully!

                            </div>";

                echo $showPop;

            }

        }









    }elseif (isset($_POST['student'])) {

        $fname = $_POST['fname'];

        $password = $_POST['password'];

        $town = $_POST['town'];

        $user = $_POST['username'];

        $center = $_POST['centerID'];
        // $centerN = $_POST['centerN'];

        $age = $_POST['age'];





        $insert01 = $allo->query("SELECT * FROM access_students WHERE center_id='$center' ORDER BY s_id DESC") or die(mysqli_error($allo));

        $countR = mysqli_num_rows($insert01);

       $countR1 = mysqli_fetch_assoc($insert01);
       $insert0A1 = $allo->query("SELECT * FROM admin_center WHERE center_id='$center'") or die(mysqli_error($allo));
        $countRAA1 = mysqli_fetch_assoc($insert0A1);
        if ($countR > 0) {

            $sp = explode("-", $countR1['s_trackId']);

            $r_c = $sp[2] + 1;

            $r_a = 'AFH-'.$countRAA1['center_name'].'-'.$r_c;

            // echo $r_a;
            // echo $sp[2];
            $insert0 = $allo->query("INSERT INTO access_students(`fullname`, `s_trackId`, `s_lastSeen`, `s_password`, `homeTown`, `img`, `center_id`) VALUES ('{$fname}','{$r_a}', '','{$password}','{$town}','','$center')") or die(mysqli_error($allo));

            if ($insert0){

                $showPop = "<script>alert('Student registered successfully!');

                            window.location='dashboard_sa.php';

                            </script>";

                echo $showPop;

            }

        }else{
            $idd = 'AFH-'.$countRAA1['center_name'].'-1';

            $insert0 = $allo->query("INSERT INTO access_students(`fullname`, `s_trackId`, `s_lastSeen`, `s_password`, `homeTown`, `img`, `center_id`) VALUES ('{$fname}','{$idd}', '','{$password}','{$town}','','{$center}')") or die(mysqli_error($allo));

            if ($insert0){

                $showPop = "<script>alert('Student registered successfully!');

                            window.location='dashboard_sa.php';

                            </script>";

                echo $showPop;

            }

        }











    }elseif (isset($_POST['hidden_staff'])) {

        $role = $_POST['user_type'];

        $usern = $_POST['user_name'];

        $userC = $_POST['user_contact_no'];

        $email = $_POST['user_email'];

        $pass = $_POST['user_password'];

        $ch = "INSERT INTO user_srms(`user_name`, `user_contact_no`, `user_email`, `user_password`, `user_type`, `user_status`) VALUES ('$usern','$userC','$email','$pass','$role',1)";

        $insert0 = $sms->query("{$ch}") or die(mysqli_error($sms));

        if ($insert0){

              header("Location:../user.php?stfAdd");

          }





    }elseif (isset($_POST['updateStfSub'])) {

        $user_id = decrtp($_POST['stfID']);

        $usern = decrtp($_POST['stfN']);

        $userC = decrtp($_POST['class_id']);

        $insert01 = $sms->query("SELECT * FROM assigned_class_srms WHERE staff_id='$user_id' AND class_assigned='$userC'") or die(mysqli_error($sms));

        $countR = mysqli_fetch_assoc($insert01);

        if ($countR>0) {

             $showPop = "<script>alert('Class already assigned!');

                            window.location='../user.php';

                            </script>";

                echo $showPop;

            

        }else{

        $ch = "INSERT INTO assigned_class_srms(`staff_id`, `staff_name`, `class_assigned`) VALUES ('$user_id','$usern','$userC')";

        $insert0 = $sms->query("{$ch}") or die(mysqli_error($sms));

        if ($insert0){

              header("Location:../user.php?stfAssign");

          }

        }



    }elseif (isset($_POST['updateStfSubjects'])) {

        $user_id = decrtp($_POST['stfID']);

        $subject = decrtp($_POST['assign_sub']);

        $userC = decrtp($_POST['class_id']);

        $insert01 = $sms->query("SELECT * FROM assigned_class_srms WHERE staff_id='$user_id' AND class_assigned='$userC'") or die(mysqli_error($sms));

        $countR = mysqli_fetch_assoc($insert01);

        $splitSub = explode('"', $countR['subject_assigned']);

        if (in_array($subject, $splitSub)) {

             $showPop = "<script>alert('Subject already assigned for teacher on the selected class!');

                            window.location='../user.php';

                            </script>";

                echo $showPop;

        }else{

            $s_name = $subject.'"';

            $update = $sms->query("

                            UPDATE `assigned_class_srms` SET 

                                    `subject_assigned`= CONCAT(subject_assigned, '".$s_name."') 

                            WHERE `class_assigned`=$userC AND staff_id=$user_id") or die(mysqli_error($sms));

            if ($update){

              header("Location:../user.php?subAssign");

          }

        }



    }elseif (isset($_POST['updateSt'])) {

        $stID = decrtp($_POST['stID']);

        // print_r($_POST);

        $allPostedItems = $_POST['form'];

        $allPostedItemsKey = "";

        $allPostedItemsValue = "";

        foreach ($allPostedItems as $allPostedItemKeys => $allPostedItemValues) {

                $allPostedItemsValue .= "`".$allPostedItemKeys."`= '".$allPostedItemValues."',";

        }

        $allPostedItemsValue = rtrim($allPostedItemsValue, ",");

        $upt = "UPDATE `student_srms` SET ".$allPostedItemsValue." WHERE `student_id`=".$stID;

        $insert01 = $sms->query("SELECT * FROM student_srms WHERE student_id='$stID'") or die(mysqli_error($sms));

        $countR = mysqli_fetch_assoc($insert01);

        if ($countR>0){

            $update = $sms->query("{$upt}") or die(mysqli_error($sms));

        if ($update){

              header("Location:../student.php?stUp");

          }

        }





    }elseif (isset($_POST['Ssubmit'])) {

        if (!empty($_POST['student_name']) || !empty($_POST['student_id']) || !empty($_POST['class_id']) || !empty($_POST['subject_name']) || !empty($_POST['term']) || !empty($_POST['year']) || !empty($_POST['ca1']) || !empty($_POST['ca2']) || !empty($_POST['exam']) || !empty($_POST['total'])){

        // print_r($_POST);

            $singleIndexValue = $_POST['class_id'][0];

            $singleIndexValue1 = $_POST['term'][0];

            $singleIndexValue2 = $_POST['year'][0];

            $singleIndexValue3 = $_POST['subject_name'][0];

            if ($singleIndexValue1 == 1) {

                $singleIndexValue1 = "First Term";

            }elseif ($singleIndexValue1 == 2) {

                $singleIndexValue1 = "Second Term";

            }elseif ($singleIndexValue1 == 3) {

                $singleIndexValue1 = "Third Term";

            }

            $insert01 = $sms->query("SELECT * FROM result_srms WHERE class_id='$singleIndexValue' AND term='$singleIndexValue1' AND year='$singleIndexValue2' AND subject_name='$singleIndexValue3'") or die(mysqli_error($sms));

            $countR = mysqli_fetch_assoc($insert01);

             if ($countR>0){

                $showPop = "<div class='alert alert-danger' role='alert'>

                            The <b>".$singleIndexValue3."</b> result for the <b>".$singleIndexValue1."-".$singleIndexValue2."</b> for the class select  already exists!

                            </div>";

                        echo $showPop;

             }else{

                $ccount= count($_POST['exam']);

                for ($in=0; $in<$ccount; $in++) { 

                $lc1= $_POST['student_name'][$in];

                $lc2= trim($_POST['student_id'][$in], " ");

                $lc4= trim($_POST['year'][$in], " ");

                $lc5= trim($_POST['ca1'][$in], " ");

                $lc6= trim($_POST['ca2'][$in], " ");

                $lc7= trim($_POST['exam'][$in], " ");

                $lc8= trim($lc5 + $lc6 + $lc7, " ");

                $lc3= $_POST['class_id'];

                $lc9 = $_POST['subject_name'];

                $lc10 = $_POST['term'];

                $lc100 = $_POST['module'];

                $sbj_name = trim($lc9[0], " ");

                $module_f = trim($lc100[0], " ");



                $insert = $sms->query("INSERT INTO result_srms(`class_id`, `student_id`, `student_name`, `subject_name`, `term`, `year`, `ca1`, `ca2`, `exam`, `total`,`module`) VALUES('{$lc3[0]}','$lc2','$lc1','{$sbj_name}','{$lc10[0]}','$lc4','$lc5','$lc6','$lc7','$lc8','{$module_f}')") or die(mysqli_error($sms));

            }

                if ($insert){

                $showPop = "<script>alert('Result Submitted Successfully!');

                            window.location='exam.php';

                            </script>";

                echo $showPop;

                }

                

             }

        }

    }else if (isset($_POST['addC'])){

            $c_name = strtoupper($_POST['module_name']);

            $insert0 = $sms->query("INSERT INTO m_s(`module`) VALUES ('$c_name')") or die(mysqli_error($sms));

            if ($insert0){

                $showPop = "<script>alert('Module Submitted Successfully!');

                            window.location='../profile.php';

                            </script>";

                echo $showPop;



            }

        }else if (isset($_POST['addM'])){

            $c_name = ucwords($_POST['subject']);

            $id = $_POST['id'];



            $insert0 = $sms->query("INSERT INTO s_m(`subject`,`module_id`) VALUES ('$c_name','$id')") or die(mysqli_error($sms));

            if ($insert0){

                $showPop = "<script>alert('Subject Added Successfully!');

                            window.location='../profile.php';

                            </script>";

                echo $showPop;



            }

        }

        // if ($countR>0){

        //     $update = $sms->query("{$upt}") or die(mysqli_error($sms));

        // if ($update){

        //       header("Location:../student.php?stUp");

        //   }

        // }





        

    

}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){

    if (isset($_GET['del'])){

        $illet = decrtp($_GET['del']);

        $update = $sms->query("DELETE FROM `class_srms` WHERE class_id='$illet'") or die(mysqli_error($sms));

        header("Location:../classes.php?del");



    }elseif (isset($_GET['enable'])){

        $oillet = decrtp($_GET['enable']);

        $insert01 = $sms->query("SELECT class_status FROM class_srms WHERE class_id='$oillet'") or die(mysqli_error($sms));

        $countR = mysqli_fetch_assoc($insert01);

        if ($countR['class_status'] == "Enable") {

            $update = $sms->query("

                            UPDATE `class_srms` SET

                                    `class_status`= 2

                            WHERE `class_id`=$oillet") or die(mysqli_error($sms));

            header("Location:../classes.php?enabled");

        }elseif ($countR['class_status'] == "Disable"){

            $update = $sms->query("

                            UPDATE `class_srms` SET

                                    `class_status`= 1

                            WHERE `class_id`=$oillet") or die(mysqli_error($sms));

            header("Location:../classes.php?Disabled");

        }

    }elseif (isset($_GET['stdel'])){

        $illet = decrtp($_GET['stdel']);

        $update = $sms->query("DELETE FROM `student_srms` WHERE student_id='$illet'") or die(mysqli_error($sms));

        header("Location:../student.php?stdel");



    }elseif (isset($_GET['stfdel'])){

        $illet = decrtp($_GET['stfdel']);

        $update = $sms->query("DELETE FROM `user_srms` WHERE user_id='$illet'") or die(mysqli_error($sms));

        header("Location:../user.php?stfdel");



    }elseif (isset($_GET['delM'])){

        $illet = decrtp($_GET['delM']);

        $update = $sms->query("DELETE FROM `m_s` WHERE id='$illet'") or die(mysqli_error($sms));

        $update1 = $sms->query("DELETE FROM `s_m` WHERE module_id='$illet'") or die(mysqli_error($sms));



        header("Location:../profile.php?stfdel");



    }



}


<?php
//include"conn.php";
function addClass($c_name,$c_status){
        if (!empty($c_code) || !empty($c_name) || !empty($c_status)){
            $insert0 = $sms->query("INSERT INTO class_srms(`class_name`, `class_status`) VALUES ('$c_name','$c_status')") or die(mysqli_error($sms));
            if ($insert0){
                $showPop = '<div class="alert alert-success" role="alert">
                            Class Added Successfully!
                            </div>';
                return $showPop;
            }
        }

    }

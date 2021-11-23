<?php
    if (isset($_GET['getAss'])) {
        include('Connections/dbh.inc.php');
        $course = $_GET['course'];
        $class = $_GET['class'];
        // $pref = $_GET['pref'];
        if (empty($course) || empty($class)) {
            $err = array("status"=> false, "message"=>"Blank Field");
            exit(json_encode($err));
        }else{
            $sqll = $eva->query("SELECT * FROM assessments WHERE class='{$class}' AND course='{$course}'");
            $datae = [];
            while($s = $sqll->fetch_assoc()){
                $datae[] = $s;
            }
            exit(json_encode($datae));
        }
    }elseif(isset($_GET['getAss'])) {
        # code...
    }

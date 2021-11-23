<?php
  session_start();
   if (!isset($_SESSION['userNID'])) {
    
    header("location:./");
  }
  ?>
<?php
include"includes/conn.php";
include "includes/enctp.php";

$stID = $_GET['st'];
$sqll = $allo->query("SELECT * FROM access_students WHERE s_trackId='$stID'");
$countR1 = mysqli_fetch_assoc($sqll);


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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Allon Fasaha </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="styleSelectorsheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
	  <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>
  <style>
   
        .card1 {
          position: relative;
          width: 20%;
          min-width: 100px;
          height: auto;
          overflow: hidden;
          border-radius: 15px;
		  margin-left:40%;
          margin-bottom: 20px;
          padding: 15px 15px;
          box-shadow: 0 10px 15px rgb(255, 255, 255);
          transition: .5s;
        }
        .card1:hover {
          transform:scale(1.1);
        }
        .card_red, .card_red .title .fa {
          background: linear-gradient(-45deg, #1AA59A, #62d1c8);
        }
        .card_three, .card_three .title .fa  {
          background: linear-gradient(-45deg, #35477D, #596ba1);
        }
        
        .card1:before {
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          width: auto;
          height: auto;
          margin-top:20px;
          background: linear-gradient(-45deg, #1AA59A, #62d1c8);
          z-index: 1;
          transform: skewY(-5deg) scale(1.5);
        }
        
        .card1 a {
          display: block;
          position: relative;
          z-index: 2;
          background-color: linear-gradient(-45deg, #1AA59A, #62d1c8);
          color: #fff !important;
          width: auto;
          height: 20px;
          text-align: center;
          margin: auto;
          line-height: auto;
          border-radius: 20px;
          font-size: 14px;
          cursor: pointer;
          text-decoration: none;
          box-shadow: 0 5px 10px linear-gradient(-45deg, #1AA59A, #62d1c8);
        }
        .card1 a:hover {
            
          font-size: 16px;
          font-style: bold;
          
        }
       
        </style>

  <!--<body class="fix-menu dark-layout">-->

  <body>
  <div class="modal fade" id="modalUpdateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Update Student</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-3">
                                    
                                    <div class="container py-5">
                                          <div class="row">
                                              <div class="col-md-10 mx-auto">
                                                  <form method="POST" action="set.php" name="addClient" id="addClient">
                                                      <div class="form-group row">
                                                          <div class="col-sm-12">
                                                              <label for="name">Student Name</label>
                                                              <input type="text" class="form-control" id="name" value="<?php echo $countR1['fullname'];?>" name = "fname" placeholder="Full name" required>
                                                          </div>
                                                      </div>
                                                      <div class="form-group row">
                                                              <div class="col-sm-6">
                                                                  <label for="age">Age</label>
                                                                  <select class="form-control" id="phone" name ="age">
																  <option >--Select-- </option>
																  <option>6 - 10 </option>
																  <option>11 and Above </option>
																  </select>
                                                              </div>
                                                              <div class="col-sm-6">
                                                                  <label for="email">Home Town</label>
                                                                  <input type="text" class="form-control" id="email" name ="home" value="<?php echo $countR1['homeTown'];?>" placeholder="e.g Kano" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                                  
                                                                  <div class="col-sm-6">
                                                                      <label for="address">Username</label>
                                                                      <input type="text" class="form-control" id="prescription" name = "contact_address" placeholder="login id" readonly required>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                    <label for="business">Password</label>
                                                                    <input type="password" class="form-control" id="business_name" name = "password" placeholder="Password">
                                                                </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                 
                                                                  <div class="col-sm-12">
                                                                      <label for="address">Image</label>
                                                                      <input type="file" class="form-control" id="contact_address" name = "contact_address" placeholder="Upload Image">
                                                                  </div>
                                                              </div>
                                                              <input type="hidden" value="<?php echo $countR1['s_trackId'];?>" name="st_id">
                                                              <input type="hidden" value="<?php echo $_GET['center'];?>" name="centers">
                                                             <div class="modal-footer">					
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: lightgray; border-radius: 5px;">Close</button>
                                                                <input type="submit" style="border-radius: 5px;" class="btn btn-success" name="updateS" id="submit">
                                                            </div>
                                                 </div>
                                                 
                                                      
                                                  </form>
                                      </div>
                                    </div>
                            
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
 
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="">
                            <h5> Allon Fasaha</h5>
							</a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <!-- <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> -->
                                    <i class="icofont icofont-user-alt-5 card1-icon" style="font-size: 25px"></i>

                                    <span><?php echo  decrtp($_SESSION['userNAME']); ?></span>

                                    <!-- s<span>Mr. G</span> -->
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                   
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <!-- <img class="img-40 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image"> -->
                                        <i class="icofont icofont-user-alt-5 card1-icon" style="font-size: 25px"></i>
                                    
                                    <div class="user-details">
                                        <!-- <span>Mr. G</span> -->

                                    <span><?php echo  decrtp($_SESSION['userNAME']); ?></span>
                                        <span id="more-details">Administrator<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                           <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="dashboard_sa.php">
                                        <img src="dashboard_i.png"/>
                                        
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                            <ul class="pcoded-item pcoded-left-item" >
                                <li class="active1">
                                    <a href="#">
                                        <img src="center_a.png" style="margin-left:10px"/>
                                        
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               
                            </ul>

                            </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
									
                                            
									<a href="students_a.php?center=<?php echo $_GET['center']; ?>" class="btn btn-success" style="width:100px; border-radius:5px;"><i class="ti-arrow-left" style="font-size: large;">&nbsp;Back</i></a>
									
                                        <div class="row align-items-end" style="text-align:center">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4><?php echo $countR1['fullname']; ?></h4>
                                                        <span><?php echo $countR1['homeTown']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											<div class="row align-items-end" style="margin-left:10%; margin-top:10px;">
                      <?php
                          $sqll12w = $allo->query("SELECT SUM(quiz_unit_point), SUM(assm_unit) FROM assessment WHERE student_id='{$stID}'");
                          $countR1w = mysqli_fetch_assoc($sqll12w);


                      ?>    
                                            <div class="col-lg-4">
                                                Total Score: <?php echo $countR1w['SUM(assm_unit)']; ?>
                                            </div>
											<div class="col-lg-4">
                                                Quiz Points: <?php echo $countR1w['SUM(quiz_unit_point)']; ?>
                                            </div>
											<div class="col-lg-4">
                                                Time Spent: 34hrs
                                            </div>
                                        </div>
										<div class="card card1 card_red" style="margin-top: 10px;">
                                            <a data-toggle="modal" data-target="#modalUpdateForm">  &nbsp;Update<i class="icofont icofont-pencil card1-icon" style="font-size: large;"></i></a>
                                          </div>
										 
                                    <!-- Page-header end -->
                                    
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Material tab card start -->
                                                <div class="card">
                                                    
                                                    <div class="card-block">
                                                        <!-- Row start -->
                                                        <div class="row m-b-30">
                                                            <div class="col-lg-12 col-xl-12">
                                                               <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs md-tabs" role="tablist" style="background-color:#f4f7f6;">
                                                                    <li class="nav-item" style=" margin-left: 5%">
                                                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Module 1</a>
                                                                        <div class="slide" style=" margin-left: -0.5%"></div>
                                                                    </li>
                                                                    <li class="nav-item" style=" margin-left: 5%">
                                                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Module 2</a>
                                                                        <div class="slide" style=" margin-left: -0.5%"></div>
                                                                    </li>
                                                                    <li class="nav-item"style=" margin-left: 5%">
                                                                        <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">Module 3</a>
                                                                        <div class="slide"style=" margin-left: -0.5%"></div>
                                                                    </li>
                                                                    
                                                                </ul>
                                                                <!-- Tab panes -->
                                                                  <div class="tab-content card-block">

<?php


// $sqlla = $allo->query("SELECT * FROM access_students WHERE center_id='$center'");
$arr = ["level_1"=>"Level One",
        "level_2"=>"Level Two",
        "level_3"=>"Level Three",
        "level_4"=>"Level Four",
        "level_6"=>"Level Six",
        "level_7"=>"Level Seven"
        ];
$x= 1;
$arr1 = array("Literacy");
$check = [];
$assemble= '<div class="tab-pane active" id="home3" role="tabpanel">
                                  <p class="m-0">
              <div class="card-block accordion-block">
                  <div id="accordion2" role="tablist" aria-multiselectable="true">
                      <div class="accordion-panel">';
foreach ($arr as $key => $value) {
      $sqll12o = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$key}' AND module='1' AND subject_name='Literacy'");
      $countR11 = mysqli_num_rows($sqll12o);
      if ($countR11>0) {
        
      $countR1ao = mysqli_fetch_assoc($sqll12o);
        
       $assemble .= '
              
                          <div class="accordion-heading" role="tab" id="heading2One">
                              <h3 class="card-title accordion-title">
                                  <a class="accordion-msg" data-toggle="collapse"
                                  data-parent="#accordion2" href="#'.$key.'"
                                  aria-expanded="true" aria-controls="'.$key.'">
                                  '.$value.' '.$countR1ao['subject_name'].' <i class="ti-arrow-down"></i>
                              </a>
                          </h3>
                      </div>
                      <div id="'.$key.'" class="panel-collapse collapse in"
                      role="tabpanel" aria-labelledby="heading2One">
                      <div class="accordion-content accordion-desc">
                           <div class="card-block p-b-10">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                          <thead style="background-color: lightgray;">
                              <tr>
                                  <th>Topic</th>
                                  <th>Sub-Topic</th>
                                  <th>Assessment</th>
                                  <th>Trials</th>
                                  <th>Quiz Points</th>
                                  
                              </tr>
                          </thead>
                          <tbody>


      ';
      $sqll12oa = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$key}' AND module='1' AND subject_name='Literacy'");   
      while($alloai = $sqll12oa->fetch_assoc()){
          $assemble .='<tr>
              <td>
                  <a data-toggle="modal" data-target="#modalSubscriptionFormE_'.$alloai['id'].'" href="#"><div class="task-contain">
                      
                       <p class="d-inline-block m-l-20">'.$alloai['module_name'].'</p>
                  </div>
                 </a>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloai['mode'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-l-20">'.$alloai['assm_unit'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloai['trails'].' </p>
              </td>
            <td>
                  <p class="d-inline-block m-l-20">'.$alloai['quiz_point'].'</p>
              </td>';

            $assemble .=' <td>

                <div class="modal fade" id="modalSubscriptionFormE_'.$alloai['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-12">
                                    
                                          <div class="row">
                                              <div class="col-xl-12 mx-auto">
                        
                              <div class="table-responsive" style="width:80%; margin-left:10%">
                                                            <table class="table table-bordered table-hover" id="dataTable">
                                                                <thead style="background-color: lightgray;">
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>Date</th>
                                                                        <th>Score</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>';
                                          $splitAss = explode(",", $alloai['level_assN']);
                                          foreach ($splitAss as $keyq => $valueq) {
                                              $assemble .= '
                                                      <tr>
                                                                        <td>                                                                           
                                                                                 <p class="d-inline-block m-l-20">1</p>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">20/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">'.$valueq.'</p>
                                                                        </td>
                                                                        
                                                                    </tr>


                                              ';
                                          }
                                                                    
                                            $assemble .='                    </tbody>
                                                                      
                                                                  </table>
                                                             </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 
                                                      
                                      </div>
                                    </div>
                            
                                  </div>
                                 
                                </div>
                              </div>
                            </div>

             </td>
        </tr>';



      }
      $assemble .='
</tbody>
</table>
</div>
</div>
</div>
</div>


      ';
}
      }
$assemble .='</div>
</div>
</div></p>
</div>
';
      echo $assemble;
      // echo $smail;

// print_r($check);
?>
 


                      <!---------------------------------- First Tab --------------------------------->

                                                                    
                                                             

                      <!---------------------------------- End First Tab --------------------------------->


                       <!---------------------------------- Second Tab --------------------------------->

<?php


// $sqlla = $allo->query("SELECT * FROM access_students WHERE center_id='$center'");

$x= 1;
$arr1 = array("Literacy");
$check = [];
$assemble2= '<div class="tab-pane" id="profile3" role="tabpanel">
                                  <p class="m-0">
              <div class="card-block accordion-block">
                  <div id="accordion2" role="tablist" aria-multiselectable="true">
                      <div class="accordion-panel">';
foreach ($arr as $keyw => $valuew) {
      $sqll12ow = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$keyw}' AND module='2' AND subject_name='Literacy'");
      $countR11w = mysqli_num_rows($sqll12ow);
      if ($countR11w>0) {
        
      $countR1aow = mysqli_fetch_assoc($sqll12ow);
        
       $assemble2 .= '
              
                          <div class="accordion-heading" role="tab" id="heading2One">
                              <h3 class="card-title accordion-title">
                                  <a class="accordion-msg" data-toggle="collapse"
                                  data-parent="#accordion2" href="#r'.$keyw.'"
                                  aria-expanded="true" aria-controls="r'.$keyw.'">
                                  '.$valuew.' '.$countR1aow['subject_name'].' <i class="ti-arrow-down"></i>
                              </a>
                          </h3>
                      </div>
                      <div id="r'.$keyw.'" class="panel-collapse collapse in"
                      role="tabpanel" aria-labelledby="heading2One">
                      <div class="accordion-content accordion-desc">
                           <div class="card-block p-b-10">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                          <thead style="background-color: lightgray;">
                              <tr>
                                  <th>Topic</th>
                                  <th>Sub-Topic</th>
                                  <th>Assessment</th>
                                  <th>Trials</th>
                                  <th>Quiz Points</th>
                                  
                              </tr>
                          </thead>
                          <tbody>


      ';
      $sqll12oaw = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$keyw}' AND module='2' AND subject_name='Literacy'");   
      while($alloaiw = $sqll12oaw->fetch_assoc()){
          $assemble2 .='<tr>
              <td>
                  <a data-toggle="modal" data-target="#modalSubscriptionFormA_'.$alloaiw['id'].'" href="#"><div class="task-contain">
                      
                       <p class="d-inline-block m-l-20">'.$alloaiw['module_name'].'</p>
                  </div>
                 </a>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloaiw['mode'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-l-20">'.$alloaiw['assm_unit'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloaiw['trails'].' </p>
              </td>
            <td>
                  <p class="d-inline-block m-l-20">'.$alloaiw['quiz_point'].'</p>
              </td>';

            $assemble2 .=' <td>

                <div class="modal fade" id="modalSubscriptionFormA_'.$alloaiw['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-12">
                                    
                                          <div class="row">
                                              <div class="col-xl-12 mx-auto">
                        
                              <div class="table-responsive" style="width:80%; margin-left:10%">
                                                            <table class="table table-bordered table-hover" id="dataTable">
                                                                <thead style="background-color: lightgray;">
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>Date</th>
                                                                        <th>Score</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>';
                                          $splitAss1 = explode(",", $alloaiw['level_assN']);
                                          foreach ($splitAss1 as $keyq1 => $valueq1) {
                                              $assemble2 .= '
                                                      <tr>
                                                                        <td>                                                                           
                                                                                 <p class="d-inline-block m-l-20">1</p>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">20/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">'.$valueq1.'</p>
                                                                        </td>
                                                                        
                                                                    </tr>


                                              ';
                                          }
                                                                    
                                            $assemble2 .='                    </tbody>
                                                                      
                                                                  </table>
                                                             </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 
                                                      
                                      </div>
                                    </div>
                            
                                  </div>
                                 
                                </div>
                              </div>
                            </div>

             </td>
        </tr>';



      }
      $assemble2 .='
</tbody>
</table>
</div>
</div>
</div>
</div>


      ';
}
      }
$assemble2 .='</div>
</div>
</div></p>
</div>
';
      echo $assemble2;
      // echo $smail;

// print_r($check);
?>


                                                                  

                      <!---------------------------------- End First Tab --------------------------------->


                       <!---------------------------------- Third Tab --------------------------------->

<?php


// $sqlla = $allo->query("SELECT * FROM access_students WHERE center_id='$center'");

$x= 1;
$arr1 = array("Literacy");
$check = [];
$assemble3= '<div class="tab-pane" id="messages3" role="tabpanel">
                                  <p class="m-0">
              <div class="card-block accordion-block">
                  <div id="accordion2" role="tablist" aria-multiselectable="true">
                      <div class="accordion-panel">';
foreach ($arr as $keyw1 => $valuew) {
      $sqll12ow1 = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$keyw1}' AND module='3' AND subject_name='Literacy'");
      $countR11w1 = mysqli_num_rows($sqll12ow1);
      if ($countR11w1>0) {
        
      $countR1aow1 = mysqli_fetch_assoc($sqll12ow1);
        
       $assemble3 .= '
              
                          <div class="accordion-heading" role="tab" id="heading2One">
                              <h3 class="card-title accordion-title">
                                  <a class="accordion-msg" data-toggle="collapse"
                                  data-parent="#accordion2" href="#rr'.$keyw1.'"
                                  aria-expanded="true" aria-controls="rr'.$keyw1.'">
                                  '.$valuew.' '.$countR1aow1['subject_name'].' <i class="ti-arrow-down"></i>
                              </a>
                          </h3>
                      </div>
                      <div id="rr'.$keyw1.'" class="panel-collapse collapse in"
                      role="tabpanel" aria-labelledby="heading2One">
                      <div class="accordion-content accordion-desc">
                           <div class="card-block p-b-10">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                          <thead style="background-color: lightgray;">
                              <tr>
                                  <th>Topic</th>
                                  <th>Sub-Topic</th>
                                  <th>Assessment</th>
                                  <th>Trials</th>
                                  <th>Quiz Points</th>
                                  
                              </tr>
                          </thead>
                          <tbody>


      ';
      $sqll12oaw1 = $allo->query("SELECT * FROM assessment WHERE student_id='{$stID}' AND level_ass='{$keyw1}' AND module='3' AND subject_name='Literacy'");   
      while($alloaiw1 = $sqll12oaw1->fetch_assoc()){
          $assemble3 .='<tr>
              <td>
                  <a data-toggle="modal" data-target="#modalSubscriptionFormR_'.$alloaiw1['id'].'" href="#"><div class="task-contain">
                      
                       <p class="d-inline-block m-l-20">'.$alloaiw1['module_name'].'</p>
                  </div>
                 </a>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloaiw1['mode'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-l-20">'.$alloaiw1['assm_unit'].'</p>
              </td>
              <td>
                  <p class="d-inline-block m-r-20">'.$alloaiw1['trails'].' </p>
              </td>
            <td>
                  <p class="d-inline-block m-l-20">'.$alloaiw1['quiz_point'].'</p>
              </td>';

            $assemble3 .=' <td>

                <div class="modal fade" id="modalSubscriptionFormR_'.$alloaiw1['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-12">
                                    
                                          <div class="row">
                                              <div class="col-xl-12 mx-auto">
                        
                              <div class="table-responsive" style="width:80%; margin-left:10%">
                                                            <table class="table table-bordered table-hover" id="dataTable">
                                                                <thead style="background-color: lightgray;">
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>Date</th>
                                                                        <th>Score</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>';
                                          $splitAss2 = explode(",", $alloaiw1['level_assN']);
                                          foreach ($splitAss2 as $keyq2 => $valueq2) {
                                              $assemble3 .= '
                                                      <tr>
                                                                        <td>                                                                           
                                                                                 <p class="d-inline-block m-l-20">1</p>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">20/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">'.$valueq2.'</p>
                                                                        </td>
                                                                        
                                                                    </tr>


                                              ';
                                          }
                                                                    
                                            $assemble3 .='                    </tbody>
                                                                      
                                                                  </table>
                                                             </div>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 
                                                      
                                      </div>
                                    </div>
                            
                                  </div>
                                 
                                </div>
                              </div>
                            </div>

             </td>
        </tr>';



      }
      $assemble3 .='
</tbody>
</table>
</div>
</div>
</div>
</div>


      ';
}
      }
$assemble3 .='</div>
</div>
</div></p>
</div>
';
      echo $assemble3;
      // echo $smail;

// print_r($check);
?>



<!-- 
                                                                    <div class="tab-pane active" id="messages3" role="tabpanel">
                                                                        <p class="m-0">
                                    <div class="card-block accordion-block">
                                                        <div id="accordion2" role="tablist" aria-multiselectable="true">
                                                            <div class="accordion-panel">
                                                                <div class="accordion-heading" role="tab" id="heading2One">
                                                                    <h3 class="card-title accordion-title">
                                                                        <a class="accordion-msg" data-toggle="collapse"
                                                                        data-parent="#accordion2" href="#collapse2One"
                                                                        aria-expanded="true" aria-controls="collapse2One">
                                                                        Level One(1) Literacy <i class="ti-arrow-down"></i>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div id="collapse2One" class="panel-collapse collapse in"
                                                            role="tabpanel" aria-labelledby="heading2One">
                                                            <div class="accordion-content accordion-desc">
                                                                 <div class="card-block p-b-10">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                                <thead style="background-color: lightgray;">
                                                                    <tr>
                                                                        <th>Topic</th>
                                                                        <th>Sub-Topic</th>
                                                                        <th>Assessment</th>
                                                                        <th>Trials</th>
                                                                        <th>Quiz Points</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                <tr>
                                                                        <td>
                                                                            <a data-toggle="modal" data-target="#modalSubscriptionForm" href="#"><div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">Grammer</p>
                                                                            </div>
                                                                           </a>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Parts of Speech </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">45</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">7 </p>
                                                                        </td>
                                    <td>
                                                                            <p class="d-inline-block m-l-20">81</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                </tbody>
                                                                  </table>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                          
                          
                       
                            </div>
                        </div></p>
                                                                    </div>
 -->
                      <!---------------------------------- End First Tab --------------------------------->

                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- Row end -->
                                                        <!-- Row start -->
                                                       
                                                        <!-- Row end -->
                                                    </div>
                                                </div>
                                                <!-- Material tab card end -->
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
  
  <script src="assets/demo/datatables-demo.js"></script>
  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>

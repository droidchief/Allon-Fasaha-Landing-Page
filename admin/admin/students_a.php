<?php
  session_start();
   if (!isset($_SESSION['userNID'])) {
    
    header("location:./");
  }
  ?>
<?php
include"includes/conn.php";
include "includes/enctp.php";

$center = $_GET['center'];
$sqll = $allo->query("SELECT * FROM admin_center WHERE center_id='$center'");
$countR1 = mysqli_fetch_assoc($sqll);
$sqll12 = $allo->query("SELECT COUNT(fullname) FROM access_students WHERE center_id='{$center}'");
$countR1a = mysqli_fetch_assoc($sqll12);
$sqlla = $allo->query("SELECT * FROM access_students WHERE center_id='$center'");

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
      <!-- Google font-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"> -->
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
      <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


      
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
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
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
                                    <!-- <span>Mr. G</span> -->
                                    <i class="icofont icofont-user-alt-5 card1-icon" style="font-size: 25px"></i>

                                    <span><?php echo  decrtp($_SESSION['userNAME']); ?></span>

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
                                    <a href="">
                                        <img src="center_a.png" style="margin-left:10px"/>
                                        
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               
                            </ul>

                            </nav>

                            <div class="modal fade" id="modifyCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Update Center</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body mx-3">
                                    
                                    <div class="container py-5">
                                          <div class="row">
                                              <div class="col-md-10 mx-auto">
                                                  <form method="POST" action="<?php echo $editFormAction; ?>" name="addStudent" id="addStudent">
                                                      <div class="form-group row">
                                                          <div class="col-sm-12">
                                                              <label for="name">Center Name</label>
                                                              <input type="text" class="form-control" id="name" name = "name" placeholder="Full name" required>
                                                          </div>
                                                      </div>
                                                      <div class="form-group row">
                                                              <div class="col-sm-6">
                                                                  <label for="phone">Location</label>
                                                                  <input type="text" class="form-control" id="phone" name ="phone" placeholder="e.g Tarauni" required>
                                                              </div>
                                                              <div class="col-sm-6">
                                                                  <label for="email">Admin Name</label>
                                                                  <input type="text" class="form-control" id="email" name ="email" placeholder="e.g Abubakar Bello" required>
                                                              </div>
                                                          </div>
														  <div class="form-group row">
                                                                 <div class="col-sm-6">
                                                                      <label for="address">Admin Phone:</label>
                                                                      <input type="text" class="form-control" id="contact_address" name = "contact_address" placeholder="Phone Number" required>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                      <label for="address">Image</label>
                                                                      <input type="file" class="form-control" id="contact_address" name = "contact_address" placeholder="Upload Image" required>
                                                                  </div>
                                                              </div>
                                                          <div class="form-group row">
                                                                  
                                                                  <div class="col-sm-6">
                                                                      <label for="address">Username</label>
                                                                      <input type="text" class="form-control" id="prescription" name = "contact_address" placeholder="login id" required>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                    <label for="business">Password</label>
                                                                    <input type="password" class="form-control" id="business_name" name = "business_name" placeholder="Password" required>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                             <div class="modal-footer">					
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: lightgray; border-radius: 5px;">Close</button>
                                                                <input type="submit" style="border-radius: 5px;" class="btn btn-success" id="submit">
                                                            </div>
                                                 </div>
                                                 
                                                      
                                                  </form>
                                      </div>
                                    </div>
                            
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                                
                              
                            <div class="main-body">
                                
                                <div class="page-wrapper">

                                    
                                        <div class="row">
                                           
                                           
                                            
                                            <!-- Statestics Start -->
                                            



                                            
                                           
                                            <!-- Email Sent End -->
                                            <!-- Data widget start -->
	  
                                                
                                           
                                            <div class="col-md-12 col-xl-12">
                                                
                                                
                                                <div class="card project-task">
                                                    <div class="page-body">
                                       
                                                    <div class="card-header">
													<a href="centers.php" class="btn btn-success" style="width:100px; border-radius:5px;"><i class="ti-arrow-left" style="font-size: large;">&nbsp;Back</i></a>
									
                                        <div class="row align-items-end" style="text-align:center">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4><?php echo $countR1['center_name'];?></h4>
                                                        <span><?php echo $countR1['center_location'];?></span>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											<div class="row text-center">
                                           
                                            <div class="col-lg-4">
                                                
                                            </div>
											<div class="col-lg-4">
                                                Toatal Students: <?php echo $countR1a['COUNT(fullname)'];?>
                                            </div>
											<div class="col-lg-4">
											
                                            </div>
                                        </div>
										<div class="card card1 card_red" style="margin-top: 10px;">
                                            <a data-toggle="modal" data-target="#modifyCenter">  &nbsp;Update<i class="icofont icofont-pencil card1-icon" style="font-size: large;"></i></a>
                                          </div>
                                                        <div class="card-header-left ">
                                                            <h4>Students</h4>
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                    
                                                    <div class="card-block p-b-10">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                                <thead style="background-color: lightgray;">
                                                                    <tr>
                                                                        <th>Recent Users</th>
                                                                         <th>User ID</th>
                                                                        <th>User Password</th>
                                                                        <th>Logins</th>
                                                                        <th>Time(mins)</th>
                                                                        <th>Module</th>
                                                                        <th>Level</th>
                                                                        <th>Score<s/th>
                                                                        <th>Points</th>
                                                                        <th>Last Seen</th>
																		<th>Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                    while($s = $sqlla->fetch_assoc()){
                                                                      echo '
                                                                             <tr>
                                                                        <td>
                                    <div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">'.$s['fullname'].'</p>
                                                                            </div>
                                                                        </td>
                                                                                                  <td>
                                    <div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">'.$s['s_trackId'].'</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                    <div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">'.$s['s_password'].'</p>
                                                                            </div>
                                                                        </td>';
                                                                        $sqll12a = $allo->query("SELECT * FROM st_activities WHERE st_id='{$s['s_trackId']}'");
                                                                        $countR1b = mysqli_fetch_assoc($sqll12a);
                                                                        echo '<td>
                                                                            <p class="d-inline-block m-r-20">'.$countR1b['logins'].'</p>
                                                                        </td>';
                                                                        echo '<td>
                                                                            <p class="d-inline-block m-r-20">'.$countR1b['timeSpent'].'</p>
                                                                        </td>';
                                                                        echo '<td>
                                                                            <p class="d-inline-block m-r-20">'.$countR1b['module'].'</p>
                                                                        </td>';
                                                                        echo '<td>
                                                                            <p class="d-inline-block m-r-20">'.$countR1b['level'].'</p>
                                                                        </td>';
                                                                        echo '<td>
                                                                            <p class="d-inline-block m-r-20">234</p>
                                                                        </td>';
                                                                       echo' <td>
                                                                            <p class="d-inline-block m-r-20">pt s</p>
                                                                        </td>';
                                                                         echo '<td>
                                                                            <p class="d-inline-block m-r-20">'.$countR1b['timeOn'].'</p>
                                                                        </td>';
                                                                        echo'
                                                                        
                                                                        
                                    <td class = "text-center">
                                        <a href="students_details_a.php?st='.$s['s_trackId'].'&center='.$_GET['center'].'" class="btn btn-primary btn-outline-primary" style="border-radius:6px">View <i class="icofont icofont-eye-alt"></i></a>
                                                                        </td>
                                                                    </tr>




                                                                      ';
                                                                    }
                                                                ?>
                                                                   
                                                                </tbody>
                                                                      
                                                                  </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </div>
                                                
                                                
                                               
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
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
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
</body>

</html>

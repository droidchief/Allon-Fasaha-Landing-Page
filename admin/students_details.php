<?php
  session_start();
   if (!isset($_SESSION['userTID'])) {
    
    header("location:./");
  }
  ?>
<?php
include"includes/conn.php";
include "includes/enctp.php";

$stID = $_GET['st'];
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
      <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
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
                                                  <form method="POST" action="<?php echo $editFormAction; ?>" name="addClient" id="addClient">
                                                      <div class="form-group row">
                                                          <div class="col-sm-12">
                                                              <label for="name">Student Name</label>
                                                              <input type="text" class="form-control" id="name" name = "name" placeholder="Full name" required>
                                                          </div>
                                                      </div>
                                                      <div class="form-group row">
                                                              <div class="col-sm-6">
                                                                  <label for="age">Age</label>
                                                                  <select class="form-control" id="phone" name ="phone" required>
																  <option>--Select-- </option>
																  <option>6 - 10 </option>
																  <option>11 and Above </option>
																  </select>
                                                              </div>
                                                              <div class="col-sm-6">
                                                                  <label for="email">Home Town</label>
                                                                  <input type="text" class="form-control" id="email" name ="email" placeholder="e.g Kano" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group row">
                                                                  
                                                                  <div class="col-sm-6">
                                                                      <label for="address">Username</label>
                                                                      <input type="text" class="form-control" id="prescription" name = "contact_address" placeholder="login id" readonly required>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                    <label for="business">Password</label>
                                                                    <input type="password" class="form-control" id="business_name" name = "business_name" placeholder="Password" required>
                                                                </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                 
                                                                  <div class="col-sm-12">
                                                                      <label for="address">Image</label>
                                                                      <input type="file" class="form-control" id="contact_address" name = "contact_address" placeholder="Upload Image" required>
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
  <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            
                                                                                
                                                                                 <p class="d-inline-block m-l-20">1</p>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">20/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">26</p>
                                                                        </td>
                                                                        
                                                                    </tr>
																	<tr>
                                                                        <td>
                                                                            
                                                                                
                                                                                 <p class="d-inline-block m-l-20">2</p>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">18/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">34</p>
                                                                        </td>
                                                                        
                                                                    </tr>
																	<tr>
                                                                        <td>
                                                                            
                                                                                
                                                                                 <p class="d-inline-block m-l-20">3</p>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">12/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">43</p>
                                                                        </td>
                                                                        
                                                                    </tr>
																	<tr>
                                                                        <td>
                                                                            
                                                                                
                                                                                 <p class="d-inline-block m-l-20">4</p>
                                                                           
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">19/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">19</p>
                                                                        </td>
                                                                        
                                                                    </tr>
																	<tr>
                                                                        <td>
                                                                            
                                                                                
                                                                                 <p class="d-inline-block m-l-20">5</p>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">21/03/2021 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">38</p>
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
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>Mr. G</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                   
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="index.html">
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
                                    <img class="img-40 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span>Mr. G</span>
                                        <span id="more-details">Administrator<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="index.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
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
                                    <a href="dashboard.php">
                                        <img src="dashboard_a.png" />
                                        
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>
                            <ul class="pcoded-item pcoded-left-item" >
                                <li class="active1">
                                    <a href="#">
                                        <img src="student_a.png" style="margin-left:8px"/>
                                        
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
									
                                            
									<a href="students.html" class="btn btn-success" style="width:100px; border-radius:5px;"><i class="ti-arrow-left" style="font-size: large;">&nbsp;Back</i></a>
									
                                        <div class="row align-items-end" style="text-align:center">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Sani Abdu</h4>
                                                        <span>Gidan Buhari Zoo Road</span>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											<div class="row align-items-end" style="margin-left:10%; margin-top:10px;">
                                           
                                            <div class="col-lg-4">
                                                Total Score: 76
                                            </div>
											<div class="col-lg-4">
                                                Quiz Points: 76
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
                                                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                                                        <p class="m-0"> 
																		 <div class="card-block accordion-block">
                                                        <div id="accordion" role="tablist" aria-multiselectable="true">
                                                            <div class="accordion-panel">
                                                                <div class="accordion-heading" role="tab" id="headingOne">
                                                                    <h3 class="card-title accordion-title">
                                                                        <a class="accordion-msg" data-toggle="collapse"
                                                                        data-parent="#accordion" href="#collapseOne"
                                                                        aria-expanded="true" aria-controls="collapseOne">
                                                                        Level One(1) Literacy<i class="ti-arrow-down"></i>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapse in"
                                                            role="tabpanel" aria-labelledby="headingOne">
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
                                                                                
                                                                                 <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                           </a>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">52</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">4 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">98</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="task-contain">
                                                                                
                                                                                <p class="d-inline-block m-l-20">Grammer</p>
                                                                            </div>
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
                                                                    <tr>
                                                                        <td>
                                                                            <div class="task-contain">
                                                                                
                                                                                <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">23</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">4 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">78</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                                      
                                                                  </table>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingTwo">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseTwo"
                                                                aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Level One(1) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level One(1) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
											<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingThree">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseThree"
                                                                aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Level Two(2) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingFour">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseFour"
                                                                aria-expanded="false"
                                                                aria-controls="collapseFour">
                                                                Level Two(2) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="headingFour">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingFive">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseFive"
                                                                aria-expanded="false"
                                                                aria-controls="collapseFive">
                                                                Level Three(3) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseFive" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="headingFive">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingSix">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseSix"
                                                                aria-expanded="false"
                                                                aria-controls="collapseSix">
                                                                Level Three(3) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseSix" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="headingSix">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
											 
                            </div>
                        </div></p>
                                                                    </div>
                                                                    <div class="tab-pane" id="profile3" role="tabpanel">
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
                                                                    <tr>
                                                                        <td>
																		
                                                                            <div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">52</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">4 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">98</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td>
                                                                            <div class="task-contain">
                                                                                
                                                                                <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">23</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">4 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">78</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                                      
                                                                  </table>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading2Two">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion2" href="#collapse2Two"
                                                                aria-expanded="false"
                                                                aria-controls="collapse2Two">
                                                                Level One(1) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse2Two" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading2Two">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level One(1) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
											<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading2Three">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion2" href="#collapse2Three"
                                                                aria-expanded="false"
                                                                aria-controls="collapse2Three">
                                                                Level Two(2) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse2Three" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading2Three">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading2Four">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion2" href="#collapse2Four"
                                                                aria-expanded="false"
                                                                aria-controls="collapse2Four">
                                                                Level Two(2) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse2Four" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading2Four">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading2Five">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion2" href="#collapse2Five"
                                                                aria-expanded="false"
                                                                aria-controls="collapse2Five">
                                                                Level Three(3) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse2Five" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading2Five">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading2Six">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion2" href="#collapse2Six"
                                                                aria-expanded="false"
                                                                aria-controls="collapse2Six">
                                                                Level Three(3) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse2Six" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading2Six">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
											 
                            </div>
                        </div></p>
                                                                    </div>
                                                                    <div class="tab-pane" id="messages3" role="tabpanel">
                                                                        <p class="m-0">
																		<div class="card-block accordion-block">
                                                        <div id="accordion3" role="tablist" aria-multiselectable="true">
                                                            <div class="accordion-panel">
                                                                <div class="accordion-heading" role="tab" id="heading3One">
                                                                    <h3 class="card-title accordion-title">
                                                                        <a class="accordion-msg" data-toggle="collapse"
                                                                        data-parent="#accordion3" href="#collapse3One"
                                                                        aria-expanded="true" aria-controls="collapse3One">
                                                                        Level One(1) Literacy <i class="ti-arrow-down"></i>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div id="collapse3One" class="panel-collapse collapse in"
                                                            role="tabpanel" aria-labelledby="heading3One">
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
                                                                                
                                                                                 <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                           </a>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">62</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">5 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">76</p>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td>
                                                                            <div class="task-contain">
                                                                                
                                                                                <p class="d-inline-block m-l-20">Phonics</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">Sounds </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">27</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-r-20">6 </p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="d-inline-block m-l-20">73</p>
                                                                        </td>
                                                                       
                                                                    </tr>
																	<tr>
                                                                        <td>
                                                                            <div class="task-contain">
                                                                                
                                                                                 <p class="d-inline-block m-l-20">Grammer</p>
                                                                            </div>
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
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading3Two">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion3" href="#collapse3Two"
                                                                aria-expanded="false"
                                                                aria-controls="collapse3Two">
                                                                Level One(1) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse3Two" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading3Two">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level One(1) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
											<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading3Three">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion3" href="#collapse3Three"
                                                                aria-expanded="false"
                                                                aria-controls="collapse3Three">
                                                                Level Two(2) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse3Three" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading3Three">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading3Four">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion3" href="#collapse3Four"
                                                                aria-expanded="false"
                                                                aria-controls="collapse3Four">
                                                                Level Two(2) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse3Four" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading3Four">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Two(2) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading3Five">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion3" href="#collapse3Five"
                                                                aria-expanded="false"
                                                                aria-controls="collapse3Five">
                                                                Level Three(3) Literacy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse3Five" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading3Five">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Literacy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
														<div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="heading3Six">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg" data-toggle="collapse"
                                                                data-parent="#accordion3" href="#collapse2Six"
                                                                aria-expanded="false"
                                                                aria-controls="collapse3Six">
                                                                Level Three(3) Numeracy <i class="ti-arrow-down"></i>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapse3Six" class="panel-collapse collapse"
                                                    role="tabpanel" aria-labelledby="heading3Six">
                                                    <div class="accordion-content accordion-desc">
                                                        <p>
                                                            Level Three(3) Numeracy Contents
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
											 
                            </div>
                        </div></p>
                                                                    </div>
                                                                    
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

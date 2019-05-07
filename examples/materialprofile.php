<?php
    $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);


session_start();

if(!isset($_SESSION["applicantuser"]))
   {
    header('location:home.html');
   }
   elseif((time() - $_SESSION['utime'])>=1000)
   {
     header('location:logout.php');
   }
   else
   {
   
     $_SESSION['utime']=time();
     $user1=$_SESSION["applicantuser"];
     $sql="SELECT * FROM jobapplication where email_id='$user1'";
     $result = $conn->query($sql);

   
        if ($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();  
          } 



     $skills=explode(",", $row['tech_skill']);
     $c=count($skills);


   }





?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Web Fonts -->
  <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- CSS Header and Footer -->
  <link rel="stylesheet" href="assets/css/headers/header-default.css">
  <link rel="stylesheet" href="assets/css/footers/footer-v1.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="assets/plugins/animate.css">
  <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
  <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

  <!-- CSS Page Style -->
  <link rel="stylesheet" href="assets/css/pages/profile.css">
  <link rel="stylesheet" href="assets/css/pages/shortcode_timeline2.css">

  <!-- CSS Theme -->
  <link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
  <link rel="stylesheet" href="assets/css/theme-skins/dark.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="profile-page sidebar-collapse">
 
 <div class="header">
       
       <nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    
      <div class="navbar-translate">
       <a class="text-dark h1 navbar-brand" href="home.html">
           <h1>Resume Ranking </h1></a>
      
      </div>
      <div class="collapse navbar-collapse ">
        <ul class="navbar-nav">
         
         <a href="logout.php " class="btn btn-danger">Logout</a>
          
          
        </ul>
      </div>
   
  </nav>
    </div>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="container content profile">
      <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">
          <img class="img-responsive profile-img margin-bottom-20" src="https://i.dailymail.co.uk/i/pix/2017/04/20/13/3F6B966D00000578-4428630-image-m-80_1492690622006.jpg" alt="">

          <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
            
            <li class="list-group-item active">
              <a href="applicanthome.php"><i class="fa fa-user"></i> Profile</a>
            </li>
            
            <li class="list-group-item">
              <a href="projects.php"><i class="fa fa-cubes"></i> My Projects</a>
            </li>
            
            
            <li class="list-group-item">
              <a href="experience.php"><i class="fa fa-history"></i> My Experience</a>
            </li>
            <li class="list-group-item">
              <a href="update.php"><i class="fa fa-cog"></i>Update Profile</a>
            </li>
          </ul>



          <!-- certification -->
          <div class="panel-heading-v2 overflow-h">
            <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i>Certification</h2>
            <a href="#"><i class="fa fa-cog pull-right"></i></a>
          </div>
          <div id="container4">
            
          </div>
          

                          <?php  $certi=explode(",", $row['certificate']);
                           ?>

                    
                        <?php  foreach ($certi as $key => $value):
                         ?> 
                            
                            

                        <script>
                          var html='<h3 class="heading-xs"><?php echo $value;  ?> <span class="pull-right">100%</span></h3>         <div class="progress progress-u progress-xxs">            <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">           </div>          </div>';
                               
                                          $("#container4").append(html); 
                                      

                                </script>
                      <?php endforeach ?>

          <hr>

          <!--Notification
          <div class="panel-heading-v2 overflow-h">
            <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
            <a href="#"><i class="fa fa-cog pull-right"></i></a>
          </div>
          <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
            <li class="notification">
              <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
              <div class="overflow-h">
                <span><strong>Albert Heller</strong> has sent you email.</span>
                <small>Two minutes ago</small>
              </div>
            </li>
            <li class="notification">
              <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
              <div class="overflow-h">
                <span><strong>Taylor Lee</strong> started following you.</span>
                <small>Today 18:25 pm</small>
              </div>
            </li>
            <li class="notification">
              <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
              <div class="overflow-h">
                <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                <small>Yesterday 1:07 pm</small>
              </div>
            </li>
            <li class="notification">
              <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
              <div class="overflow-h">
                <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                <small>23/12 11:01 am</small>
              </div>
            </li>
            <li class="notification">
              <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
              <div class="overflow-h">
                <span><strong>Bruno Js.</strong> added you to group chating.</span>
                <small>Yesterday 1:07 pm</small>
              </div>
            </li>
            <li class="notification">
              <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
              <div class="overflow-h">
                <span><strong>Taylor Lee</strong> changed profile picture.</span>
                <small>23/12 15:15 pm</small>
              </div>
            </li>
          </ul>
          <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
          End Notification-->

          <div class="margin-bottom-50"></div>

          <!--Datepicker-->
          <form action="#" id="sky-form2" class="sky-form">
            <div id="inline-start"></div>
          </form>
          <!--End Datepicker-->
        </div>
        <!--End Left Sidebar-->

        <!-- Profile Content -->
        <div class="col-md-9">
          <div class="profile-body">
            <div class="profile-bio">
              <div class="row">
                <div class="col-md-5">
                  <img class="" alt="">
                </div>
                
                <div class="col-md-12">
                  <h2 class="display-4"><?php echo $row["firstname"]." ".$row["lastname"];   ?></h2>
                  <span><strong>Birth Date:</strong><?php echo $row["dob"];?></span>
                  <span><strong>Location:</strong> <?php echo $row["current_state"];?></span>
                  <hr>
                  
                  <p><?php echo $row["careerobj"];?></p>
                  
                </div>
              </div>
            </div><!--/end row-->

            <hr>

            <div class="row">
              <!--Social Icons v3-->
              <div class="col-sm-6 sm-margin-bottom-30">
                <div class="panel panel-profile">
                  <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Training <small></small></h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                  </div>
                  <div class="panel-body">

                    <?php 
                    $train=explode(",", $row['training']);
                    ?>


                    <ul class=" social-contacts-v2" id="container3">
                      
                          <?php  foreach ($train as $key => $value):
                         ?> 
                            
                            

                        <script>
                          var html='<li>   <h3 class="heading-xs"><?php echo $value; ?></h3></li>';
                               
                                          $("#container3").append(html); 
                                      

                                </script>
                      <?php endforeach ?>



                    </ul>
                  </div>
                </div>
              </div>
              <!--End Social Icons v3-->

              <!----certification--->





              <!--Skills-->
              <div class="col-sm-6 sm-margin-bottom-30">
                <div class="panel panel-profile" id="container1">
                  <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Skills</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                  </div>

                  <div class="panel-body">


                    <!--
                    <small> </small>
                    <small>92%</small>
                    <div class="progress progress-u progress-xxs">
                      <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                      </div>
                    </div>-->


                     
                          <?php  $rates=explode(",", $row['rate']);
                           ?>

                    
                        <?php  foreach ($skills as $key => $value):
                         ?> 
                            
                            

                        <script>
                          var html='<h3 class="heading-xs"> <?php echo $value; ?><span class="pull-right"><?php echo $rates[$key]*10 ?>% </span></h3> <div class="progress progress-u progress-xxs"> <div id="pro" style="width:<?php echo $rates[$key]*10 ?>%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">                     </div></div>';
                               
                                          $("#container1").append(html); 
                                      

                                </script>
                      <?php endforeach ?>



                  </div>
                </div>
              </div>
              <!--End Skills-->
            </div><!--/end row-->

            <hr>

            <!--Timeline-->
            <div class="panel panel-profile" >
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Experience</h2>
                <a href="#"><i class="fa fa-cog pull-right"></i></a>
              </div>
              <div class="panel-body margin-bottom-40" >
                <ul class="timeline-v2 timeline-me" id="container2">
                
                  

                          <?php  

                             $company=explode(",", $row['company_name']);
                             $sdate=explode(",", $row['start_date']);
                             $edate=explode(",", $row['end_date']);
                             $jobtitle=explode(",", $row['job_tiitle']);
                             $jobdes=explode(",", $row['job_description']);
                          ?>

                        <?php  foreach ($company as $key => $value): ?> 
                      
                        <script>
                          var html1='<li> <time datetime="" class="cbp_tmtime"><span><?php echo $jobtitle[$key] ?></span> <span></span></time>  <i class="cbp_tmicon rounded-x hidden-xs"></i>            <div class="cbp_tmlabel"><h2><?php echo $value ?></h2>    <p><?php echo $jobdes[$key] ?></p>                    </div>                  </li>';
                               
                                          $("#container2").append(html1); 
                                      
                                </script>
                      <?php endforeach ?>







                </ul>
              </div>
            </div>
            <!--End Timeline-->

            <!--Timeline-->
            <div class="panel panel-profile">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                <a href="#"><i class="fa fa-cog pull-right"></i></a>
              </div>
              <div class="panel-body">
                <ul class="timeline-v2 timeline-me">
                  <li>
                    <time datetime="" class="cbp_tmtime"><span><?php  echo $row['btech/mtech'];?></span> <span><?php  echo $row['btech/mtech_passing_year'];?></span></time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="cbp_tmlabel">
                      <h2><?php echo $row['btech/mtech_college'];  ?></h2>
                      <p><strong>University:</strong> <?php  echo $row['btech/mtech_university'];?></p>
                      <p><strong>percentage:</strong> <?php  echo $row['btech/mtech_percentage'];?>%</p>
                    </div>
                  </li>
                  <li>
                    <time datetime="" class="cbp_tmtime"><span><?php  echo $row['tew/dip'];?></span> <span><?php  echo $row['tew/dip_passing_year'];?></span></time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="cbp_tmlabel">
                      <h2><?php echo $row['tew/dip_college_name'];  ?></h2>
                      <p><strong>University:</strong> <?php  echo $row['tew/dip_board_name'];?></p>
                      <p><strong>percentage:</strong> <?php  echo $row['tew/dip_percentage'];?>%</p>
                    </div>
                  </li>
                  <li>
                    <time datetime="" class="cbp_tmtime"><span>S.S.C</span> <span><?php  echo $row['ten_passing_year'];?></span></time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="cbp_tmlabel">
                      <h2><?php echo $row['ten_school_name'];  ?></h2>
                      <p><strong>University:</strong> <?php  echo $row['ten_board_name'];?></p>
                      <p><strong>percentage:</strong> <?php  echo $row['ten_percentage'];?>%</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!--End Timeline-->

            <hr>

            <div class="row">
              <!--Social Contacts v2-->
              <div class="col-sm-6">
                <div class="panel panel-profile">
                  <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left lead"><i class="fa fa-lightbulb-o"></i><strong> Contacts </h2></strong>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                  </div>
                  <div class="panel-body">
                    <ul class="list-unstyled social-contacts-v3">
                      <li><h3 class="heading-xs"><strong>Email ID:</strong>  <?php echo $row['email_id']; ?></h3></li>
                      <li> <h3 class="heading-xs"><strong>Contact:</strong>  <?php echo $row['contact_no']; ?></h3></li>
                      <li><h3 class="heading-xs"><strong>Alternate contact:</strong>  <?php echo $row['alt_contact_no']; ?></h3></li>
                      <li><h3 class="heading-xs"><strong>Address:</strong>  <?php echo $row['present_address']; ?></h3></li>
                      <li><h3 class="heading-xs"><strong>State:</strong>  <?php echo $row['current_state']; ?></h3></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--End Social Contacts v2-->

              <!--Design Skills-->
              <div class="col-sm-6">
                <div class="panel panel-profile">
                  <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left lead"><i class="fa fa-pencil"></i><strong> Language</strong></h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                  </div>
                  <div class="panel-body">

                    <?php 
                    $language=explode(",", $row['lang']);
                    ?>


                    <ul class=" social-contacts-v2" id="container5">
                      
                          <?php  foreach ($language as $key => $value):
                         ?> 
                            
                            

                        <script>
                          var html='<li>   <h3 class="heading-xs"><?php echo $value; ?></h3></li>';
                               
                                          $("#container5").append(html); 
                                      

                                </script>
                      <?php endforeach ?>



                    </ul>
                  </div>
                </div>
              </div>
              <!--End Design Skills-->
            </div><!--/end row-->
          </div>
        </div>
        <!-- End Profile Content -->
      </div>
    </div>
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    
    <!--=== End Footer Version 1 ===-->
  </div><!--/wrapper-->
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
</body>

</html>
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


   





?>




<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <title>Profile History</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
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

<body>
  <div class="wrapper">
    <!--=== Header ===-->
 <div class="header">
       <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="home.html">
          Resume Ranking </a>
      
      </div>
      <div class="collapse navbar-collapse ">
        <ul class="navbar-nav">
         
         <a href="logout.php " class="btn btn-danger">Logout</a>
          
          
        </ul>
      </div>
    </div>
  </nav>
    </div>
    <!--=== End Header ===-->

    <!--=== Profile ===-->
    <div class="container content profile">
      <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">
          <img class="img-responsive profile-img margin-bottom-20" src="assets/img/team/img32-md.jpg" alt="">

          
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

          <div class="panel-heading-v2 overflow-h">
            <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i>Certification</h2>
            <a href="#"><i class="fa fa-cog pull-right"></i></a>
          </div>
          <div id="container4">
            
          </div>
          

                          <?php  $certi=explode(",", $row['certificate']);
                           ?>

                    
                        <?php  foreach ($certi as $key => $value):
                         
                          echo "<h3 class='heading-xs'>". $value. '<span class="pull-right">100%</span></h3>          <div class="progress progress-u progress-xxs">            <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">           </div>          </div>';
                         ?> 

                      <?php endforeach ?>
          <hr>

        

          

          <div class="margin-bottom-50"></div>

          <!--Datepicker-->
          <form action="#" id="sky-form2" class="sky-form">
            <div id="inline-start"></div>
          </form>
          <!--End Datepicker-->
        </div>
        <!--End Left Sidebar-->
        <?php 

            $company=explode(",", $row['company_name']);
            $start=explode(",", $row['start_date']);
            $end=explode(",", $row['end_date']);
            $jtitle=explode(",", $row['job_tiitle']);
            $jdecs=explode(",", $row['job_description']);            




         ?>
        
           
        
        <!-- Profile Content -->
        <div class="col-md-9">
           
          <div class="profile-body">
            <!--Timeline-->
            <ul class="timeline-v2">
           <?php foreach ($company as $key => $value): ?>
              <li>
                <time class="cbp_tmtime" datetime=""><span><?php echo $start[$key]; ?></span> <span><?php echo $end[$key]; ?></span></time>
                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                <div class="cbp_tmlabel">
                  <h2><?php echo $value; ?></h2>
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive" src="assets/img/main/img18.jpg" alt="">
                      <div class="md-margin-bottom-20"></div>
                    </div>
                    <div class="col-md-8">
                      <p><h5><?php echo $jdecs[$key];?></h5></p>
                    </div>
                  </div>
                </div>
              </li>
               <?php endforeach ?>
             </ul>
               

                  <div class="margin-bottom-20"></div>

                      <!-- End Progress Bar Text -->

                      <!-- Progress Bar Text -->
                    </div>
                </div>
              </li>
              
             
           
            <!--End Timeline-->
         
        </div>
        <!-- End Profile Content -->
      </div>
    </div><!--/container-->
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    
    <!--=== End Footer Version 1 ===-->
  </div><!--/wrapper-->

  <!--=== Style Switcher ===-->
  
  <div class="style-switcher animated fadeInRight">
    <div class="style-swticher-header">
      <div class="style-switcher-heading">Style Switcher</div>
      <div class="theme-close"><i class="icon-close"></i></div>
    </div>

    <div class="style-swticher-body">
      <!-- Theme Colors -->
      <div class="style-switcher-heading">Theme Colors</div>
      <ul class="list-unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
        <li class="theme-purple last" data-style="purple" data-header="light"></li>
        <li class="theme-aqua" data-style="aqua" data-header="light"></li>
        <li class="theme-brown" data-style="brown" data-header="light"></li>
        <li class="theme-dark-blue" data-style="dark-blue" data-header="light"></li>
        <li class="theme-light-green" data-style="light-green" data-header="light"></li>
        <li class="theme-dark-red" data-style="dark-red" data-header="light"></li>
        <li class="theme-teal last" data-style="teal" data-header="light"></li>
      </ul>

      <!-- Theme Skins -->
      <div class="style-switcher-heading">Theme Skins</div>
      <div class="row no-col-space margin-bottom-20 skins-section">
        <div class="col-xs-6">
          <button data-skins="default" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn handle-skins-btn">Light</button>
        </div>
        <div class="col-xs-6">
          <button data-skins="dark" class="btn-u btn-u-xs btn-u-dark btn-block skins-btn">Dark</button>
        </div>
      </div>

      <hr>

      <!-- Layout Styles -->
      <div class="style-switcher-heading">Layout Styles</div>
      <div class="row no-col-space margin-bottom-20">
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn wide-layout-btn">Wide</a>
        </div>
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block boxed-layout-btn">Boxed</a>
        </div>
      </div>

      <hr>

      <!-- Theme Type -->
      <div class="style-switcher-heading">Theme Types and Versions</div>
      <div class="row no-col-space margin-bottom-10">
        <div class="col-xs-6">
          <a href="E-Commerce/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Shop UI <small class="dp-block">Template</small></a>
        </div>
        <div class="col-xs-6">
          <a href="One-Pages/Classic/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">One Page <small class="dp-block">Template</small></a>
        </div>
      </div>

      <div class="row no-col-space">
        <div class="col-xs-6">
          <a href="Blog-Magazine/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Blog <small class="dp-block">Template</small></a>
        </div>
        <div class="col-xs-6">
          <a href="RTL/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">RTL <small class="dp-block">Version</small></a>
        </div>
      </div>
    </div>
  </div><!--/style-switcher-->
  <!--=== End Style Switcher ===-->

  <!-- JS Global Compulsory -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
  <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- JS Implementing Plugins -->
  <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
  <script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
  <script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
  <script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script>
  <script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- JS Customization -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
  <!-- JS Page Level -->
  <script type="text/javascript" src="assets/js/app.js"></script>
  <script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
  <script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      
      App.initScrollBar();
      Datepicker.initDatepicker();
      StyleSwitcher.initStyleSwitcher();
    });
  </script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/respond.js"></script>
  <script src="assets/plugins/html5shiv.js"></script>
  <script src="assets/plugins/placeholder-IE-fixes.js"></script>
  <![endif]-->
  
</body>
</html>
<?php } ?>
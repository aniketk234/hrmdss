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
	<title>Profile Projects</title>

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
        <a class="navbar-brand" href="home.php">
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
										  	 
										  		echo "<h3 class='heading-xs'>". $value. '<span class="pull-right">100%</span></h3>					<div class="progress progress-u progress-xxs">						<div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">						</div>					</div>';
										  	 ?>	

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
						<!--Projects-->
						<div id="container5">


						</div>
							<div class="row">
						<?php $projectname=explode(",",$row['project_name']);
							  $projectDuration=explode(",",$row['project_duration']);
							  $projectrole=explode(",",$row['project_role']);
							  $projectDecs=explode(",",$row['project_description']);
						 foreach ($projectname as $key => $value): ?>
							
						
					
							<div class="col-sm-6">
								<div class="margin-bottom-30"></div>
								<div class="projects">
									<h2><a class="color-dark" ><?php echo $value ?></a></h2>
									<ul class="list-unstyled list-inline blog-info-v2">
										<li>Role: <a class="color-green"><?php echo $projectrole[$key]; ?></a></li>
										<li><i class="fa fa-clock-o"></i> <?php echo $projectDuration[$key]; ?></li>
									</ul>
									<p><?php echo $projectDecs[$key]; ?></p>
								
								</div>
								
							</div>
					<?php endforeach ?>
					</div><!--/end row-->
						<!--End Projects-->

						<hr>

						<!--End Projects-->

						<hr>

						
						<!--End Projects-->
						<button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
					</div>
				</div>
				<!-- End Profile Content -->
			</div>
		</div>
		
	</div>

		<!--=== End Profile ===-->

		
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
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



          $img=$row['img'];

     $skills=explode(",", $row['tech_skill']);
     $c=count($skills);


   }


?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<title>My Profile </title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
<!-- Latest compiled and minified CSS -->
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
	<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Please Fill Out the details for your account to find jobs.</h4>
            </div>
            <div class="modal-body">
                <p class="lead"><a href="register/zcon.php" class="link">Click here.</a>to fill out the application form.</p>
                
            </div>
        </div>
    </div>
</div>

<?php 
	if($row['ten_passing_year']==0){

?>
<script>
    			$(document).ready(function(){
        $('#myModal').modal('show');
    			});
    			
			</script>;

	<?php } ?>		


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
        <ul class="navbar-nav ">
         
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
					<img class="img-responsive profile-img margin-bottom-20" src="img/<?php echo $img;?>" alt="">

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
									    		var html='<h3 class="heading-xs"><?php echo $value;  ?> <span class="pull-right">100%</span></h3>					<div class="progress progress-u progress-xxs">						<div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">						</div>					</div>';
									    		     
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
									    		var html='<li>	 <h3 class="heading-xs"><?php echo $value; ?></h3></li>';
									    		     
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
									    		var html='<h3 class="heading-xs"> <?php echo $value; ?><span class="pull-right"><?php echo $rates[$key]*10 ?>% </span></h3>	<div class="progress progress-u progress-xxs"> <div id="pro" style="width:<?php echo $rates[$key]*10 ?>%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">											</div></div>';
									    		     
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
									    		var html1='<li>	<time datetime="" class="cbp_tmtime"><span><?php echo $jobtitle[$key] ?></span> <span></span></time>	<i class="cbp_tmicon rounded-x hidden-xs"></i>						<div class="cbp_tmlabel"><h2><?php echo $value ?></h2>		<p><?php echo $jobdes[$key] ?></p>										</div>									</li>';
									    		     
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
										<time datetime="" class="cbp_tmtime"><span><?php  echo $row['btech_mtech'];?></span> <span><?php  echo $row['btech_mtech_passing_year'];?></span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2><?php echo $row['btech_mtech_college'];  ?></h2>
											<p><strong>University:</strong> <?php  echo $row['btech_mtech_university'];?></p>
											<p><strong>percentage:</strong> <?php  echo $row['btech_mtech_percentage'];?>%</p>
										</div>
									</li>
									<li>
										<time datetime="" class="cbp_tmtime"><span><?php  echo $row['tew_dip'];?></span> <span><?php  echo $row['tew_dip_passing_year'];?></span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2><?php echo $row['tew_dip_college_name'];  ?></h2>
											<p><strong>University:</strong> <?php  echo $row['tew_dip_board_name'];?></p>
											<p><strong>percentage:</strong> <?php  echo $row['tewdip_percentage'];?>%</p>
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
									    		var html='<li>	 <h3 class="heading-xs"><?php echo $value; ?></h3></li>';
									    		     
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
	<script type="text/javascript" src="assets/plugins/circles-master/circles.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/circles-master.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			
			App.initScrollBar();
			Datepicker.initDatepicker();
			CirclesMaster.initCirclesMaster1();
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

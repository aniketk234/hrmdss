




	<div id="education" class="profile-edit tab-pane fade">
									<h2 class="heading-md">Manage your Educational Details</h2>
									<p>Below are the Educational details  for your account.</p>
									<br>
									<form class="sky-form" id="sky-form" action="update.php" method="post">
										<!--Checkout-Form-->
										<dl class="dl-horizontal">
										
										
										<dt><strong> Education Qualification</strong></dt>
										<dd>
											
											<select name="ddlEduQualification" id="ddlEduQualification" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
						                  <option value="selected" >- Please Select Option -</option>
						                 
						                  <option <?php if($row['qualification']=="BTech"){?>  selected="selected" <?php } ?> value="BTech">BTech</option>
						                  <option <?php if($row['qualification']=="MTech"){?>  selected="selected" <?php }?> value="MTech">MTech</option>
						                  <option <?php if($row['qualification']=="BE"){?>  selected="selected" <?php } ?> value="BE">BE</option>
						                  <option <?php if($row['qualification']=="ME"){?>  selected="selected" <?php }?> value="ME">ME</option>
						                  <option <?php if($row['qualification']=="BCS"){?>  selected="selected" <?php } ?> value="BCS">BCS</option>
						                  <option <?php if($row['qualification']=="MCS"){?>  selected="selected" <?php } ?>value="MCS">MCS</option>
						                  <option <?php if($row['qualification']=="BCA"){?>  selected="selected" <?php } ?> value="BCA">BCA</option>
						                  <option <?php if($row['qualification']=="MCA"){?>  selected="selected" <?php } ?>value="MCA">MCA</option>
						                  <option<?php if($row['BSC']=="BTech"){?>  selected="selected" <?php }?> value="BSC">BSC</option>
						                  <option <?php if($row['qualification']=="MSC"){?>  selected="selected" <?php } ?>value="MSC">MSC</option>
						                  <option <?php if($row['qualification']=="BBA"){?>  selected="selected" <?php } ?>value="BBA">BBA</option>
						                  <option <?php if($row['qualification']=="MBA"){?>  selected="selected" <?php } ?>value="MBA">MBA</option>
						                  <option <?php if($row['qualification']=="MCM"){?>  selected="selected" <?php }?> value="MCM">MCM</option>

						                </select>
										</dd>
										<hr>
										
										<hr>
										<dt><strong>School Marks</strong></dt>
										<dd>
											<input type="number" name="txt10thPercentage" oncopy="return false" onpaste="return false" oncut="return false"  min="0" max="100" step="1" class="form-control" placeholder="Your School Pecentage"   required="" value="<?php echo $row['ten_percentage'];?>">
              
										</dd>
										<hr>
										<dt><strong>12th Marks</strong></dt>
										<dd>
											 <input type="number" name="txt12thPercentage" min="0" max="100" step="1" class="form-control" placeholder="Your 12th Pecentage" value="<?php echo $row['tewdip_percentage'];?>"  >
             
										</dd>
										<hr>
										<dt><strong>B.Tech/M.Tech Marks</strong></dt>
										<dd>
											<input type="number" name="txtGradPercentage" min="0" max="100" step="1" class="form-control" placeholder="Degree Pecentage"   required="" value="<?php echo $row['btech/mtech_percentage'];?>">
										</dd>
										
										<hr>
										<button type="button" class="btn-u btn-u-default">Cancel</button>
										<button class="btn-u" type="submit" name="btn2">Save Changes</button>
										<!--End Checkout-Form-->
									</form>
								</div>
								
								<div id="skillsTab" class="profile-edit tab-pane fade">
									<h2 class="heading-md">Manage and Resubmit your Technical Skills with updated ratings for each.</h2>
									<p>Below are the technical skills you may manage.</p>
									<br>
									<form class="sky-form" id="sky-form3" action="update.php">
										<div class="sub-header" style="margin-bottom:-15px;">Technical Details</div>
    
  
										<button type="button" class="btn-u btn-u-default">Reset</button>
										<button class="btn-u" type="submit" name="btn4">Save Changes</button>
									</form>
								</div>
						
































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
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Profile Settings</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

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
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
  
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


					<hr>


		

				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body margin-bottom-20">
						<div class="tab-v1">
							<ul class="nav nav-justified nav-tabs">
								<li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
								<li><a data-toggle="tab" href="#passwordTab">Password</a></li>
								<li><a data-toggle="tab" href="#education">Edit Education</a></li>
								<li><a data-toggle="tab" href="#skillsTab">Edit Skills</a></li>
								<li><a data-toggle="tab" href="#projectsTab">Edit Projects</a></li>
								<li><a data-toggle="tab" href="#experienceTab">Edit Experience</a></li>
							</ul>
							<div class="tab-content">
								<div id="profile" class="profile-edit tab-pane fade in active">
									<h2 class="heading-md">Manage your Name, COntact and Email Addresses.</h2>
									<p>Below are the name and email addresses on file for your account.</p>
									<br>
									<form action="update.php" method="post">
									<dl class="dl-horizontal">
										<dt><strong>Your First name </strong></dt>
										<dd>
											
											<input type="text" name="txtFirstName" id="txtFirstName" oncopy="return false;" onpaste="return false;" value="<?php echo $row['firstname'];?>" maxlength="50" class="form-control" placeholder="Your First Name"  required="" style="height: 20%;">
											<span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
										</dd>
										<hr>
										<dt><strong>Your Last name </strong></dt>
										<dd>
											
											<input type="text" name="txtLastName" id="txtFirstName" oncopy="return false;" onpaste="return false;" value="<?php echo $row['lastname'];?>" maxlength="50" class="form-control" placeholder="Your Last Name"  required="" style="height: 20%;">
											<span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
										</dd>
										<hr>
										<dt><strong>Your Email </strong></dt>
										<dd>
											<input  name="txtEmailAdd" type="Email" maxlength="150" id="txtEmailAdd"  class="form-control" placeholder="Your Email Address" required="" style="height: 20%;" value="<?php echo $row['email_id'];?>">
										</dd>
										<hr>
										<dt><strong>Your Birth Date</strong></dt>
										<dd>
											<input type="date" name="txtBirthDate" id="txtBirthDate" oncopy="return false" onpaste="return false" oncut="return false" value="<?php echo $row['dob'];?>" maxlength="50" class="form-control" placeholder="Date"  required="">
										</dd>
										<hr>
										<dt><strong>Your Gender</strong></dt>
										<dd>
											 <select name="gpGender" id="gpGender" class="form-control">
						                  <!-- Add take away change options - change text twice per option to show in email results -->
						                  <?php $gender=$row['gender']; ?>
						                  <option value="" required="">- Please Select Gender -</option>
						                  <option <?php if($gender=="Male"){?>  selected="selected" <?php } ?> value="Male">Male</option>
						                  <option <?php if($gender=="Female"){?>  selected="selected" <?php } ?> value="Female">Female</option>
						               
						                </select>
										</dd>
										<hr>
										<dt><strong>Phone Number </strong></dt>
										<dd>
											 <input type="tel" name="txtMobileNo" id="txtMobileNo" oncopy="return false" onpaste="return false" oncut="return false" value="<?php echo $row['contact_no'];?>" maxlength="10" class="form-control" placeholder="Your Contact no"  required="" required="">
										</dd>
										<hr>
										<dt><strong>Present Address</strong></dt>
										<dd>
											<input type="textarea" rows="2" cols="20"  name="txtPuneAddress" id="txtPuneAddress" value="<?php echo $row['present_address'];?>" maxlength="200" class="form-control" placeholder="Your Address" required="">
										</dd>
										<hr>
										
									<a type="button" class="btn-u btn-u-default" href="applicanthome.php">Cancel</a>
									<button type="submit" class="btn-u" name="btn1">Save Changes</button>
							 </form>
								</div>

								<div id="passwordTab" class="profile-edit tab-pane fade">
									<h2 class="heading-md">Manage your Security Settings</h2>
									<p>Change your password.</p>
									<br>
									<form class="sky-form" id="sky-form4" action="#">
										<dl class="dl-horizontal">
											
											<dt>Email address</dt>
											<dd>
												<section>
													<label class="input">
														<i class="icon-append fa fa-envelope"></i>
														<input type="email" placeholder="Email address" name="email">
														<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
													</label>
												</section>
											</dd>
											<dt>Enter your password</dt>
											<dd>
												<section>
													<label class="input">
														<i class="icon-append fa fa-lock"></i>
														<input type="password" id="password" name="password" placeholder="Password">
														<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
													</label>
												</section>
											</dd>
											<dt>Confirm Password</dt>
											<dd>
												<section>
													<label class="input">
														<i class="icon-append fa fa-lock"></i>
														<input type="password" name="passwordConfirm" placeholder="Confirm password">
														<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
													</label>
												</section>
											</dd>
										</dl>
										<label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Remember password</label>
										<br>
										<section>
											<label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
										</section>
										<button type="button" class="btn-u btn-u-default">Cancel</button>
										<button class="btn-u" type="submit">Save Changes</button>
									</form>
								</div>

								
							

							<div id="projectsTab" class="profile-edit tab-pane fade in active">
									<h2 class="heading-md">Manage your Projects you have done.</h2>
									<p>Below are the projects on file for your account.</p>
									<br>
									<form action="update.php" method="post">
									<dl class="dl-horizontal">
										<dt><strong>Title</strong></dt>
										<dd>
											 <input type="text" name="pname[]" id="pname" value="" maxlength="50" class="form-control" placeholder="Project name"   required="">
											
										</dd>
										<hr>	
										<dt><strong>Project Duration</strong></dt>
										<dd>
											<input type="text" name="pduration[]" id="pduration" value="" maxlength="50" class="form-control" placeholder="Project duration"   required="">
										</dd>
										<hr>	
										<dt><strong>Your role in project</strong></dt>
										<dd>
										 <input type="text" name="prole[]" id="prole" value="" maxlength="50" class="form-control" placeholder="Role"   required="">
										</dd>
										<hr>	
										<dt><strong>Project Description</strong></dt>
										<dd>
										 <input type="text" name="pdescription[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"   required="">
										</dd>
										<hr>
										<hr>
										<hr>	
									</dl>
											<button type="button" class="btn-u btn-u-default">Cancel</button>
										<button class="btn-u" type="submit" name="btn5">Save Changes</button>

								</form>

							</div>


							<div id="experienceTab" class="profile-edit tab-pane fade in active">
									<h2 class="heading-md">Manage your experience.</h2>
									<p>Below are the Experience on file for your account.</p>
									<br>
									<form action="update.php" method="post">
									<dl class="dl-horizontal">
										<dt><strong>Comapany Name</strong></dt>
										<dd>
											 <input type="text" name="cname[]" id="cname" value="" maxlength="50" class="form-control" placeholder="company name"  >
											
										</dd>
										<hr>
									<div class="row">	
										<div class="col-md-6">
										<dt><strong>Start Year</strong></dt>
										<dd>
											 <input type="date" name="syear[]" id="syear" value="" maxlength="50" class="form-control" placeholder="start year"  >
										</dd>
										</div>
										<div class="col-md-6">
										<dt><strong>end Year</strong></dt>
										<dd>
										 <input type="date" name="eyear[]" id="eyear" value="" maxlength="50" class="form-control" placeholder="end date"  >
										</dd>
										<hr>
										</div>	
									</div>
										<dt><strong>Your role in project</strong></dt>
										<dd>
										 <input type="text" name="prole[]" id="prole" value="" maxlength="50" class="form-control" placeholder="Role"   required="">
										</dd>
										<hr>	
										<dt><strong>Project Description</strong></dt>
										<dd>
										 <input type="text" name="pdescription[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"   required="">
										</dd>
										<hr>	
									</dl>
											<button type="button" class="btn-u btn-u-default">Cancel</button>
										<button class="btn-u" type="submit" name="btn5">Save Changes</button>

								</form>

							</div>



							
						</div><!--row-->
	</div><!--wrapper-->

</body>
</html>


<?php 
	if(isset($_POST['btn1'])){

  $firstname     = $_POST['txtFirstName'];
  $lastname      = $_POST['txtLastName'];
  $emailid       = $_POST['txtEmailAdd'];
  $birthdate     = $_POST['txtBirthDate'];
  $gender        = $_POST['gpGender'];
 
  $mobileno      = $_POST['txtMobileNo'];
  
  $address       = $_POST['txtPuneAddress'];
	
	$sql="Update jobapplication set firstname='$firstname',lastname='$lastname',email_id='$emailid',dob='$birthdate',gender='$gender',contact_no='$mobileno',present_address='$address' where email_id='$user1'";
     $result = $conn->query($sql);

   
        if ($result> 0)
          {
           echo "<script>alert('Personal Details Updated');</script>";
          }
          else{
          	echo "<script>alert('Something went wrong');</script>";	
          } 


	}

if(isset($_POST['btn2'])){
		$qualification = $_POST['ddlEduQualification'];
		$specialisation= $_POST['ddlSpcl'];
		$tenthpercentage= $_POST['txt10thPercentage'];
		$tewthpercentage= $_POST['txt12thPercentage'];
		$gradpercentage= $_POST['txtGradPercentage'];



	$sql="Update jobapplication set qualification='$qualification',ten_percentage='$tenthpercentage',tewdip_percentage='$tewthpercentage',special_skill='$specialisation,' where email_id='$user1'";
     $result = $conn->query($sql)or die(mysqli_error($conn));;
     mysqli_error($conn);
   
       
	}

 ?>
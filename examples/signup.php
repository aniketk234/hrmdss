

 <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets1/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets1/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SignUp</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!-- CSS Files -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script> <script src="../assets/js/plugins/moment.min.js"></script>
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets1/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
   <script src="../assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
 <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets1/css/demo.css" rel="stylesheet" />
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets1/img/home.jpg')">
    <!--   Creative Tim Branding   -->
  
<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="home.php">
          Resume Ranking </a>
       
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a href="login1.php" class="btn btn-rose btn-raised btn-round" style="color: 'red'" >
                Login
            </a>
           </li>
          
          
        </ul>
      </div>
    </div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



  </nav>
	<!--  Made With Get Shit Done Kit  -->
		

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="red" id="wizardProfile">
                    <form action="signup.php" method="post" enctype="multipart/form-data">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>BUILD</b> YOUR PROFILE <br>
                        	   <small>This information will let you in the system.</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">About</a></li>
	                            <li><a href="#account" data-toggle="tab">Finish</a></li>
	                          
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> ENTER THE BASIC FIELDS BELOW</h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets1/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" id="wizard-picture" name="image">
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>First Name <small>(required)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name <small>(required)</small></label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                      </div>
                                     
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                      </div>
                                       <div class="form-group">
                                        <label>Password for your profile <small>(required)</small></label>
                                        <input name="Password" type="Password" class="form-control" placeholder="******">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Who are you?  </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-6">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Job Applicant">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>Job Applicant</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Recruiter">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Recruiter</h6>
                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' value='Finish' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                           
                        </div>

                    </form>

                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end ro -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">The Team</a>.
        </div>
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets1/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets1/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets1/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets1/js/jquery.validate.min.js"></script>

</html>

<?php 

if(isset($_POST['finish']))
{

	$FirstName=$_POST['firstname'];
	$LastName=$_POST['lastname'];
	$Email=$_POST['email'];
	$picture=$_FILES['image']['name'];
	$temp_name=$_FILES['image']['tmp_name'];
	
  $Password=$_POST['Password'];
	$who=$_POST['jobb'];
	if($who=='Job Applicant'){
	$con=mysqli_connect("localhost","root","","hrmdss");
	move_uploaded_file($temp_name, "img/".$picture);
	$sql="insert into jobapplication(firstname,lastname,email_id,password,img) values('$FirstName','$LastName','$Email','$Password','$picture')";
	$result=mysqli_query($con,$sql)or die(mysqli_error($con));
	if($result>0)
	{?>

		    <script>window.location('home.html');</script>
	<?php }
	else{
	//echo "<script>alert('Registration Failed');</script>";	
	}
	}
	elseif($who=='Recruiter'){
		$con=mysqli_connect("localhost","root","","hrmdss");
	move_uploaded_file($temp_name, "img/".$picture);
	$sql="insert into hr(id,firstname,lastname,email_id,password,img) values('','$FirstName','$LastName','$Email','$Password','$picture')";
	$result=mysqli_query($con,$sql)or die(mysqli_error($con));
  mysqli_error($con);
	if($result>0)
	{
		echo "<script>alert('succesfully registered');</script>";
     
      	}
	else{
	echo "<script>alert('Registration Failed');</script>";	
	}

	}

}

 ?>


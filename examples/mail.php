<?php 

if(isset($_POST['submit'])){
    $job_code=$_POST['var'];
    #echo $job_code;
    $val1=$_POST['check_list'];
    $val=implode(",", $val1);
  	
   

	$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);
      
      foreach ($val1 as $key => $value) {
      	$sql="select * from jobapplication where email_id='$value'";

      	if($result=mysqli_query($conn,$sql))
          { 
            while ($fieldinfo=mysqli_fetch_array($result)) {
            $id[]=$fieldinfo['id'];

            $first[]=$fieldinfo['firstname'];
            $last[]=$fieldinfo['lastname'];
   	}
    }
   	}
   		$id=implode(",", $id);
   		                
   		$sql1="INSERT INTO shortlisted_candidates(job_code, id) VALUES ('$job_code','$id') ON DUPLICATE KEY UPDATE id='$id'";
	    $result=mysqli_query($conn,$sql1);

?>


<?php
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
    ShortListed Candidates
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
    <nav class="navbar navbar-inverse navbar-expand-lg bg-dark mb-0" role="navigation-demo">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-translate">
                <a class="navbar-brand" href="hrhome.php">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a href="job post/job.php" class="nav-link">
                      Post A Job
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="discover.php" class="nav-link">
                      Discover Candidates
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="shortlist.php" class="nav-link">
                      Show shortlisted candidates
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="btn btn-rose btn-raised btn-fab btn-round" data-toggle="dropdown">
                      <i class="material-icons">email</i>
                    </a>
                  
                  </li>
                  <li class="dropdown nav-item">
                    <a href="" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                      <div class="profile-photo-small">
                        <img src="img/<?php echo $img;?>" alt="Circle Image" class="rounded-circle img-fluid">
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      
                     
                      <a href="logout.php" class="dropdown-item">Sign out</a>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
          </nav>
          <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile">
              
              <div class="name">
                <h2 class="title text-white">Shortlisted Candidates</h2>
                <h3>FOR JOB:<strong> <?php echo $job_code; ?></strong><br>Listed Below</h3>
               </div>
           </div>

           <?php $no=0; foreach ($first as $key => $value): ?>
           		<div class="row">
    				<div class="col-md-6">
    			<?php
    			echo "<h3>".++$no." ] ".$value." ".$last[$key]."</h3>";
    			?></div> 
    			<div class="col-md-6">
    			</div></div>
           <?php endforeach ?>

           </div>

            </div>
            <hr>
            <?php $subject="You%20are%20shortlisted%20for%20job%20apportunity";
            		 ?>
<a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $val; ?>&su=<?php echo $subject; ?>&body=http://localhost/resume/examples/mcqlogin.php Go to link given." class="btn btn-primary btn-round text-white"><i class="material-icons">mail </i>  Click to send Email for MCQ Phase</a><br><br>
          </div>
        </div>
        
        

      </div>
    
 <br><br>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
  <footer class="footer footer-default bg-dark text-white">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <h4><strong>
              Human Resource Management System
            </strong></h4>
          </li>
          
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i>
       
      </div>
    </div>
  </footer>
</body>

</html>
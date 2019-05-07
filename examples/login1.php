<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrmdss";  


if(isset($_POST['btnlogin']))
{

$user=$_POST['uname'];
$pass=$_POST['upass'];
}

$conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) 
 {
  die("Connection failed: " . $conn->connect_error);
 }

session_start();  
    if(isset($_SESSION['applicantuser']))
    {

        $_SESSION['utime']=time();
        header('location:applicanthome.php');
    }
    elseif(isset($_SESSION['hruser']))
    {
         $_SESSION['utime']=time();
        header('location:hrhome.php');
    }
   else{
    	if(isset($_POST['btnlogin']) && $_POST['user']=="applicant")
    	{
    	$sql1 = "SELECT * FROM jobapplication WHERE email_id='$user' AND password='$pass'";
        $result = $conn->query($sql1);

       if ($result->num_rows > 0)
       {
     
          $row = $result->fetch_assoc();
          if(strcasecmp($user,$row['email_id'])==0 && strcasecmp($pass,$row['password'])==0)
          {
            $_SESSION["applicantuser"]=$_POST['uname'];
            $_SESSION['utime']=time();
            header('location:applicanthome.php');
          }
      }else{
        ?><script>alert("Enter valid username and password");
      </script>

        <?php   
         
        }
    	}
    	if(isset($_POST['btnlogin']) && $_POST['user']=="hr")
    	{

    	$sql2 = "SELECT * FROM hr WHERE email_id='$user' AND password='$pass'";

        $result1 = $conn->query($sql2);

       if ($result1->num_rows > 0)
       {
     
          $row1 = $result1->fetch_assoc();
          if(strcasecmp($user,$row1['email_id'])==0 && strcasecmp($pass,$row1['password'])==0)
          {
            $_SESSION["hruser"]=$_POST['uname'];
            $_SESSION['utime']=time();
            header('location:hrhome.php');
          }
      } else{
        ?><script>alert("Enter valid username and password");
          </script>

        <?php    
         
        }	
    	}
    
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
Resume Ranking
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="login-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="home.php">
          Resume Ranking </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
         
         
          
           <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link  " data-toggle="dropdown">
              <i class="material-icons">apps</i> Register
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="signup.php" class="dropdown-item">
                <i class="material-icons">layers</i> SignUp
              </a>
             
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="login1.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <p class="description text-center">Or Be Classical</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <select class="form-control" name="user">
                  	<option value="default" selected="default">----	  please select user  ----</option>
                  	<option value="applicant">Applicant</option>
                  	<option value="hr">HR</option>
                  </select>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" name="uname" class="form-control" placeholder="Email...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="upass" class="form-control" placeholder="Password...">
                </div>
              </div>
              <div class="footer text-center">
                <input type="submit" value="Login" name="btnlogin" class="btn btn-primary btn-link btn-wd btn-lg">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <footer class="footer footer-default">
    <div class="container">
    
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">copyright</i> by ATeam
      </div>
    </div>
  </footer>
  </div>
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
</body>

</html>





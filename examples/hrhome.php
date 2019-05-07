<?php
 	  $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);


session_start();

if(!isset($_SESSION["hruser"]))
   {
    header('location:home.php');
   }
   elseif((time() - $_SESSION['utime'])>=1000)
   {
     header('location:logout.php');
   }
   else
   {
   
     $_SESSION['utime']=time();
     $user1=$_SESSION["hruser"];
     $sql="SELECT * FROM hr where email_id='$user1'";
     $result = $conn->query($sql);

   
        if ($result->num_rows > 0)
          {
            $row = $result->fetch_assoc(); 	
          } 


          $name=$row['firstname']." ".$row['lastname'];
          $img=$row['img'];
          $email=$row['email_id'];


   
 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    HR Home
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
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo $email; ?>" class="btn btn-rose btn-raised btn-fab btn-round" >
                      <i class="material-icons">email</i>
                    </a>
                  
                  </li>
                   <li class="nav-item nav-link">
                    <?php echo $name; ?>
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
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/hrmm.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="img/<?php echo $img;?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $name;?></h3>
                <h6>HR Manager</h6>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p><h4><strong>Human resources managers plan, direct, and coordinate the administrative functions of an organization. We oversee the recruiting, interviewing, and hiring of new staff; consult with top executives on strategic planning; and serve as a link between an organization’s management and its employees</strong></h4></p>
        </div>
        <br><br>

      </div>
    </div>
  </div>
  <br>
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
<?php } ?>
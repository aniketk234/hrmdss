<?php 
       session_start();
      
    if(!isset($_SESSION['hruser']))
    {

        
        header('location:home.html');
    }
else{     
      $user1=$_SESSION["hruser"];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql="Select * from job_posts";
      
         $sql1="SELECT * FROM hr where email_id='$user1'";
     $result1 = $conn->query($sql1);

   
        if ($result1->num_rows > 0)
          {
            $row = $result1->fetch_assoc();  
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
    Search for a job
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

<body class="index-page sidebar-collapse">
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
                    <a href="#" class="nav-link">
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
<!--FORLOOP STARTS -->
 <?php if($result=mysqli_query($conn,$sql))
          { 
            while ($fieldinfo=mysqli_fetch_array($result)) {
            $id[]=$fieldinfo['id'];
            $job_code[]= $fieldinfo['job_code'];
            $job_title[]=$fieldinfo['job_title'];
            $job_location[]=$fieldinfo['job_location'];
            $job_description[]=$fieldinfo['job_description'];
            $skills[]=$fieldinfo['skills_required'];
            $close[]=$fieldinfo['closing_date'];
            $mob[]=$fieldinfo['telephone'];

            }
              }
           
             ?>
               <div class="container">
               <hr>
               <h1 class="heading"><strong>Posted Jobs</strong></h1>
             </div>
             <hr>
              <?php foreach ($job_code as $key => $value): ?>
 <div class="section section-tabs">
          <div class="container">

        <!--         nav tabs               -->

        <div id="nav-tabs">
         
         
         
          
          <div class="row">
            
            <div class="col-md-12 border border-info">

            
              
                  <h2><strong><?php echo $job_title[$key]; ?></strong></h2><hr>
              <h3>
                <small>Select the operations on job</small>
              </h3>
              <!-- Tabs with icons on Card -->
              <div class="card ">
                <div class="card-header card-header-primary">
                  <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <h5><strong>Job Profile</strong></h5>
                    </div>
                  </div>
                </div>
                <div class="card-body ">
                 
                      
                      <h4 class="text-secondary"> <strong>The job profile description.</strong> </h4>
                      
                      <h4><?php echo "<strong>Title: </strong>".$job_title[$key]; ?></h4>
                      <h4><?php echo "<strong>Job Description: </strong>".$job_description[$key]; ?></h4>
                      <h4><?php echo "<strong>Job Location: </strong>".$job_location[$key]; ?></h4>
                        <?php  $id1=$id[$key];
                        $jobcode=$job_code[$key];
                                                ?>
                                                <hr>
                        <a href="Ranked.php?id=<?php echo $id1?>&job=<?php echo $jobcode ?>" class="btn btn-primary btn-round text-white">
                           <i class="material-icons">reorder</i> Ranked Candidates
                      </a>

                        <a href="Delete.php?id=<?php echo $id1?>" class="btn btn-primary btn-round text-white">
                           <i class="material-icons">delete</i> Delete Job
                      </a>
                  
                  
                </div>
              </div>
              

           <?php#    }
            
          #} ?>
              <!-- End Tabs with icons on Card -->
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <hr>
    <?php endforeach ?>
<!--FORLOOP ENDS -->
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
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }


    $(document).ready(function() {

      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-kit/index.html'
      });

      $('#googlePlus').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-kit/index.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-kit/index.html'
      });

    });
  </script>
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
<?php } ?>

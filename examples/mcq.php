<?php
	session_start();  
    if(isset($_SESSION['applicantuser']))
    {
        $email_id=$_SESSION['applicantuser'];
    }


      $right=0;
    	$wrong=0;
    	$no_answer=0;
     	$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";
      $totalscore=0;
      $count=0;
      $conn = new mysqli($servername, $username, $password, $dbname);

  $sql="select * from jobapplication where email_id='$email_id'";  
  if($result=mysqli_query($conn,$sql))
          { 
            while ($fieldinfo=mysqli_fetch_array($result)) {
       
          $skills=$fieldinfo['tech_skill'];
          $skills=explode(",", $skills);
          $count=count($skills);
          $rate=$fieldinfo['rate'];
          $rate=explode(",", $rate);

          $attempt=$fieldinfo['attempt'];
          $totalscore=$fieldinfo['mcq_score'];
          $img=$fieldinfo['img'];
          $name=$fieldinfo['firstname']." ".$fieldinfo['lastname'];
          }
          } 
        $timer=$count*0.666667;
       if($attempt>0){
        echo "<script type='text/javascript'>  
      
    
          alert('You are done with your attempt!');
    window.location.href='applicanthome.php';
        </script>";

         
       }else{


                 
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MCQ Results
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery-3.3.1.min.js"></script>

  <script type="text/javascript">
    var timer="<?php echo $timer; ?>";
    var total_seconds=60*timer;
    var c_minutes=parseInt(total_seconds/60);
    var c_seconds=parseInt(total_seconds%60);

    function checkTime(){
      document.getElementById("quiz-time-left").innerHTML='Time Left: '+ c_minutes +' minutes '+ c_seconds +'  seconds';
      if(total_seconds<=0)
      {
         document.getElementById('bton').click();
      }
      else
      {
        total_seconds=total_seconds-1;
        c_minutes=parseInt(total_seconds/60);
        c_seconds=parseInt(total_seconds%60);
        setTimeout("checkTime()",1000);
      }
    }
</script>


</head>
<body class="profile-page sidebar-collapse" onload="setTimeout('checkTime()',1000)">
 <nav class="navbar navbar-inverse navbar-expand-lg bg-dark mb-0" role="navigation-demo">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-translate">
                <a class="navbar-brand" href="applicanthome.php">HR Management</a>
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

  <div class="mt-5 main main-raised">
    <div class="profile-content">
      <div class="container">
        <h4><div style="font-weight: bold;" id="quiz-time-left" class="mt-4 ml-5"></div></h4>
	<form method="POST" action="mcq.php" id="myquiz">
	<div class="col-sm-2">
 	
 </div>
 <div class="col-sm-12 mx-5">
  <h2><strong>Online Quiz</strong></h2>
  <?php
   $no=0;
  foreach ($skills as $key => $value) {
 
    $sql1="SELECT * FROM mcq where diff_lang='$value' and rating='$rate[$key]'";
       if($result1=mysqli_query($conn,$sql1))
          { 

            while ($row=mysqli_fetch_array($result1)) {
                            $rating=$row['rating'];
                            $id=$row['id'];
                            $question=$row['question'];
                            $opt1=$row['opt1'];
                            $opt2=$row['opt2'];
                            $opt3=$row['opt3'];
                            $opt4=$row['opt4'];
                            $correct_answer=$row['correct'];
                           
?>

  <table class="table table-bordered">
    <thead>
      <tr class="danger" style="font-size: 20px;">
        
        <th><?php echo ++$no; ?><?php echo " ] ".$question; ?></th>
        
      </tr>
    </thead>
    <tbody>
      <?php if(isset($row['opt1'])){?>
      <tr class="info">
        <td>&nbsp;1]&emsp;<input type="radio"  name=<?php echo $id; ?> value=1>&nbsp;<?php echo $opt1; ?></td>
        
      </tr>
  <?php }?>
  <?php if(isset($row['opt2'])){?>
      <tr class="info">
        
        <td>&nbsp;2]&emsp;<input type="radio" name=<?php echo $id; ?> value=2> <?php echo $opt2; ?></td>
      </tr>
  <?php }?>
  <?php if(isset($row['opt3'])){?>
      <tr class="info">
       
        <td>&nbsp;3]&emsp;<input type="radio" name=<?php echo $id; ?> value=3><?php echo $opt3; ?></td>
      </tr>
  <?php }?>
  <?php if(isset($row['opt4'])){?>
      <tr class="info">
        
        <td>&nbsp;4]&emsp;<input type="radio" name=<?php echo $id; ?> value=4><?php echo $opt4; ?></td>
      </tr>
  <?php } ?>
  <tr class="info">
    <td><input type="radio" name=<?php echo $id; ?> checked="checked" style="display:none" value="0"></td>
    
  </tr>
    </tbody>
  </table>
 


<?php


if(isset($_POST['submit']))
{
  $attempt=1;
	$ans=$_POST[$id];
	$correct=$row['correct'];
	if($ans==$correct)
	{
		$totalscore=$totalscore+1;
	
	}
  $email_id1=$_SESSION['applicantuser'];
  #echo "Total score is :".$totalscore;
  $count=count($skills);
  #echo $count;
  $totalscore1=($totalscore/($count*1)*100);
  $sql2="UPDATE jobapplication SET mcq_score='$totalscore1',attempt='$attempt' WHERE email_id='$email_id1'";
  $result2=mysqli_query($conn,$sql2);
  echo "<script>window.location.href='mcqresult.php'</script>";
    }
    }
  }
  } 


?>
<center><input type="submit"  name="submit" id="bton" class="btn btn-success" value="Submit Quiz"></center>
</form>
</div>
</div>

</div>
</div>
</div>
       
 
</script>
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
  <footer class="footer footer-default bg-dark text-white mb-0">
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
<?php } ?>
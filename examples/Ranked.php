<?php
 	  $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);


session_start();

if(!isset($_SESSION["hruser"]))
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
     $user1=$_SESSION["hruser"];
     $sql="SELECT * FROM hr where email_id='$user1'";
     $result = $conn->query($sql);

   
        if ($result->num_rows > 0)
          {
            $row = $result->fetch_assoc(); 	
          } 


          $name=$row['firstname']." ".$row['lastname'];
          $img=$row['img'];
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
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile">
              
              <div class="name">
                <h2 class="title text-white">Ranked Candidates</h2>
                <h6>Listed Below</h6>
               </div>
           </div>
<?php

$id=$_GET['id'];
$jobcode=$_GET['job'];
#echo $jobcode;
error_reporting(E_ALL ^ E_NOTICE);  
$index_project=array();
$technical_skills=1.0;
$experience=1.5;
$degree=0.5;
$certificates=1.0;
$sortarray=array();
$con=mysqli_connect("localhost","root","","hrmdss");
$sql="Select * from job_posts where id='$id'";

$sql1="Select * from jobapplication";
if ($result=mysqli_query($GLOBALS['con'],$GLOBALS['sql']))
{            // Get field information for all fields
  			while ($fieldinfo=mysqli_fetch_array($result))
    		{
					if ($result1=mysqli_query($con,$sql1))
					{
						while ($fieldinfo1=mysqli_fetch_array($result1))
					    	{
					    		
					    		calculate($fieldinfo1,$fieldinfo);

					    	}
					    	sorted($GLOBALS['sortarray']);
					    	echo "<hr><br><br>";

					}
		   }
  
}




function calculate($resultset,$fieldinfo)
{

	
	#------------to fetch the required skills from job_postss----------
	
   				$skills1=$fieldinfo['skills_required'];
   				$skills=explode(",", $skills1);
   		   		$experience_min=doubleval($fieldinfo['experience_min']);
   				$experience_max=doubleval($fieldinfo['experience_max']);
		   
		#-----------------------------------------------------

   				#..................To fetch project details
   				$project1=$resultset['project_description'];
   				$project1=strtoupper($project1);
   				
   				$project_skills=explode(" ", $project1);
   				
   				
   				//var_dump($project_skills);
   				$Tskills1=explode(",",$resultset['tech_skill'] );
   				$techresult=array_intersect($Tskills1,$skills);
   				$techresult1=array_intersect($techresult,$project_skills);
   				$count_pro=count($techresult1);
   				$proj_skills_weight=getPro($count_pro);
   				



	$Tskills=explode(",",$resultset['tech_skill'] );
	$rate=explode(",", $resultset['rate']);
	$start=explode(",",$resultset['start_date']);
   	$end=explode(",",$resultset['end_date']);
	//$qualrequire=$fieldinfo['qualification'];
	$certification=explode(",", $resultset['certificate']);


	$expresult=getExp($start,$end);
	

	$expWeight=getExpWeight($expresult,$experience_max,$experience_min);
	

	
	$weightTechnical=getTech($Tskills,$techresult,$rate);


	$qualif=$resultset['btech_mtech'];
	$qual=getQualification($qualif);
	

	$count=array_intersect($certification, $techresult);
	$count1=count($count);
	$certiweight=getCerti($count1);
	
	
	$total=getTotal($expWeight,$weightTechnical,$qual,$certiweight,$proj_skills_weight);
	
	$key=$resultset['id'];
	
	
	$GLOBALS['sortarray'][$key]=$total;
	$sortarray=arsort($GLOBALS['sortarray']);

	


}
#var_dump($sortarray);


function getExp($startd,$endd)
{
	       $sDate=array();
		   $eDate=array();
			foreach ($startd as $variable) 
			{
				$sDate[]= date("d-m-Y", strtotime($variable));
			}
		
			foreach ($endd as $variable) 
			{
				$eDate[]= date("d-m-Y", strtotime($variable));
			}
			$exp=0;
			$i=0;
		    foreach ($sDate as $value) 
		    {
				$datetime1 = strtotime($value); 
				$newformat1 = date('Y-m-d',$datetime1);

				$datetime2 =  strtotime($eDate[$i]);
				$newformat2 = date('Y-m-d',$datetime2);
				$i++;

			    $diff = abs($newformat2 - $newformat1);
				
				$exp=$exp+$diff;

		    }
		    return $exp;

}

function projectskills($pro_skills,$project_skill){
	$index1=array();
			foreach ($pro_skills as $key=> $value) {
				foreach ($project_skill as $key1=> $value1) {
					if($value==$value1){
						echo "<br>".$value;
						$index1[]=$value;	
						
					}
				}
			}
			
			
			return $index1;
}
function projectskills1($Tskills,$techresult){
	$index=array();
			foreach ($Tskills as $key=> $value) {
				foreach ($techresult as $key1=> $value1) {
					if($value==$value1){
						echo "<br>".$value;
						$index[]=$value;	
						
					}
				}
			}
			
			
			return $index;
}


function getTech($Tskills,$techresult,$rate){
	$index=array();
			foreach ($Tskills as $key=> $value) {
				foreach ($techresult as $key1=> $value1) {
					if($value==$value1){
						$index[]=$key;	
						
					}
				}
			}
			
			$weight=0;
			#print_r($index);
				$rates[]=array();
				foreach ($index as $value) {
					foreach ($rate as $key=> $value1) {
					if($value==$key)
					{
						$rates[]=$value1;
						$weight+=(($value1/10)*$GLOBALS['technical_skills']);
					}		
				}
			}
			return $weight;
}

function getExpWeight($expresult,$experience_max,$experience_min){
			$c=0;
			if($experience_min>=0 && $experience_max<=5){
				$c=$experience_max+2;
			}
			if($experience_min>5 ){
				$c=$experience_max+3;
			}
			
			//$expweight=($expresult/$experience_max)*1.5;
			
			
			if(0<$expresult&&$expresult<$experience_min){
				$expweight=(0.3*$expresult)/$experience_min;
				return $expweight;
				}
			if($experience_min<=$expresult && $expresult <=$experience_max){
				$expweight=$expresult/$experience_max;
				return $expweight;
			}
			if($experience_max<	$expresult&&$expresult<=$c)
			{
				$expweight=((2*c)-$expresult)/(2*$experience_max);
				return $expweight;
			}
			


}
function getTotal($expWeight,$weightTechnical,$qual,$certiweight,$proj_skills_weight){
	$TotalWeight=$weightTechnical+$expWeight+$qual+$certiweight+$proj_skills_weight;
	return $TotalWeight;
}
$no=0;
function sorted($sortedarray){
	foreach ($sortedarray as $key=>$id) {
		
		$sql2="select * from jobapplication where id='$key'";
		if ($result=mysqli_query($GLOBALS['con'],$sql2))
  		{
            // Get field information for all fields
  			while ($fieldinfo=mysqli_fetch_array($result))
    		{
    			$fname=$fieldinfo['firstname'];
    			$lfname=$fieldinfo['lastname'];
    			$email=$fieldinfo['email_id'];

    			?>
    		<form action="mail.php" method="POST">
    			<div class="row">
    				<div class="col-md-6">
    			<?php
    			echo "<h3>".++$no." ] ".$fname." ".$lfname."</h3>";
    			?></div> 
    			<div class="col-md-6">
    			<div class="form-check">
                <br><label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="<?php echo $email; ?>" name="check_list[]"> Shortlist
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div></div></div>
<input type='hidden' name='var' value='<?php echo $GLOBALS['jobcode'];?>'/>

            <?php

    		}

    	}
	}
	  ?>
	  
	  <input class="btn btn-primary  btn-round align-right" type="submit" name="submit">
                
               </form><?php
}

function getQualification($level){
		
		if($level=='B.Tech'){
			$w=1;
			return $w; 
		}elseif($level=='M.Tech'){
			$w=1.2;
			return $w;
	}		
}

function getCerti($count2){
	
	$wet=$count2*0.3;
	return $wet;

}


 function getPro($count_pro)
{
	$wt=$count_pro*0.3;
	return $wt;
}

?>
 <a href="discover.php" class="btn btn-primary btn-fab btn-round">
                <i class="material-icons">fast_rewind</i>
              </a><h4><strong> BACK TO JOB PROFILES</strong></h4><br><br>
              </div>

            </div>

          </div>
        </div>
        
        

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


<?php 


	 ?>

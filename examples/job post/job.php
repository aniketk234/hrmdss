<?php
    $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);


session_start();
if(!isset($_SESSION["hruser"]))
   {
    header('location:../home.php');
   }
   elseif((time() - $_SESSION['utime'])>=1000)
   {
     header('location:../logout.php');
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



?>


<!DOCTYPE html>
<html>
<head>
	<title>Job Publish</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <style type="text/css">

	.form-group.required .control-label:after { 
   content:"*";
   color:red;
}
html, body{
  height: 100%;
}
body { 
			background-image: url(https://ak1.picdn.net/shutterstock/videos/699571/thumb/1.jpg) ;
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;
  
}

div, body{
  margin: 0;
  padding: 0;
  font-family: exo, sans-serif;
  
}
.wrapper {
  height: 100%; 
  width: 100%; 
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
.message {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%; 
  height:45%;
  bottom: 0; 
  display: block;
  position: absolute;
  background-color: rgba(0,0,0,0.6);
  color: #fff;
  padding: 0.5em;
}


body {
  font-size: 150%;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-translate">
                <a class="nav-link text-light" href="../hrhome.php">Home</a>
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
                    <a href="job.php" class="nav-link">
                      Post A Job
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../discover.php" class="nav-link">
                      Discover Candidates
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Show shortlisted candidates
                    </a>
                  </li>
                 
                  <li class="dropdown nav-item">
                    <a href="" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                     <?php echo $name; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      
                     
                      <a href="../logout.php" class="dropdown-item">Sign out</a>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
          </nav>
<div class="container">
  	<div class="row mt-4 mb-4">
  	
    <div class="col col-md-11 mx-auto">

  		<div class="card border border-dark">
  			<div class="card-header bg-danger border border-dark text-white">
  				<h1>Post a Job</h1>
  		</div>
  		<div class="card-body">
 	  	<form action="job.php" method="post" class="form">
  		<div class="form-group required col-md-6">
    		<label for="InputJobT" class='control-label'>Job Title</label>
    		  <div class="input-group-prepend">
    		<span class="input-group-text bg-silver border-dark"><i class="fa fa-briefcase"></i></span><input type="text" class="form-control border-dark border-dark" id="InputJobT"  placeholder="Ex: Senior Mobile Developer" name="job_title"></div>
    	</div>
    
    	<div class="form-group required col-md-6">
    		<label for="pdate" class='control-label'>Post Date</label>
    		<div class="input-group-prepend">
    		<span class="input-group-text bg-silver border-dark"><i class="fa fa-calendar"></i></span>
    		<input type="date" class="form-control border-dark border-dark" id="pdate" name="postdate" >
  		</div>
  		</div>
  		<div class="form-group required col-md-6">
    		<label for="exampleSelect1" class='control-label'>Region</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-map-marker"></i></span>
    		<select name="region" id="exampleSelect1" class="form-control border-dark border-dark">
				<option value="">------------Select State------------</option>
				<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
				<option value="Andhra Pradesh">Andhra Pradesh</option>
				<option value="Arunachal Pradesh">Arunachal Pradesh</option>
				<option value="Assam">Assam</option>
				<option value="Bihar">Bihar</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Chhattisgarh">Chhattisgarh</option>
				<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
				<option value="Daman and Diu">Daman and Diu</option>
				<option value="Delhi">Delhi</option>
				<option value="Goa">Goa</option>
				<option value="Gujarat">Gujarat</option>
				<option value="Haryana">Haryana</option>
				<option value="Himachal Pradesh">Himachal Pradesh</option>
				<option value="Jammu and Kashmir">Jammu and Kashmir</option>
				<option value="Jharkhand">Jharkhand</option>
				<option value="Karnataka">Karnataka</option>
				<option value="Kerala">Kerala</option>
				<option value="Lakshadweep">Lakshadweep</option>
				<option value="Madhya Pradesh">Madhya Pradesh</option>
				<option value="Maharashtra">Maharashtra</option>
				<option value="Manipur">Manipur</option>
				<option value="Meghalaya">Meghalaya</option>
				<option value="Mizoram">Mizoram</option>
				<option value="Nagaland">Nagaland</option>
				<option value="Orissa">Orissa</option>
				<option value="Pondicherry">Pondicherry</option>
				<option value="Punjab">Punjab</option>
				<option value="Rajasthan">Rajasthan</option>
				<option value="Sikkim">Sikkim</option>
				<option value="Tamil Nadu">Tamil Nadu</option>
				<option value="Tripura">Tripura</option>
				<option value="Uttaranchal">Uttaranchal</option>
				<option value="Uttar Pradesh">Uttar Pradesh</option>
				<option value="West Bengal">West Bengal</option>
				</select>
    		</div>
  		</div>
  		
  		<div class="form-group required col-md-6">
    		<label for="Location" class='control-label'>Location</label>
    		<div class="input-group-prepend">
    		<span class="input-group-text bg-silver border-dark"><i class="fa fa-location-arrow"></i></span>
    		<input type="text" class="form-control border-dark border-dark" id="Location" placeholder="Ex:Hyderabad" name="location">
  		</div>
  		</div>
  		
  		<div class="form-group required col-md-6">
    		<label for="exampleSelect2" class='control-label'>Job Type</label>
    		<div class="input-group-prepend">
    		<span class="input-group-text bg-silver border-dark"><i class="fa fa-archive"></i></span>
    		<select class="form-control border-dark" id="exampleSelect2" name="job_type">  
	      		<option value="Permanent" selected="selected">Permanent</option>
	      		<option value="Temporary">Temporary</option>
	      		<option value="Internship">Internship</option>
	      		<option value="Contract">Contract</option>
    		</select>
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="exampleTextarea" class='control-label'>Job Description</label>
    		<div class="input-group-prepend">
    		<span class="input-group-text bg-silver border-dark"><i class="fa fa-edit"></i></span>
    		<textarea class="form-control border-dark" id="exampleTextarea" name="job_description" rows=""></textarea>
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="exampleInputPassword1" class='control-label'>Company ID</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-info-circle"></i></span>
    		<input type="text" class="form-control border-dark" id="exampleInputPassword1" name="company_id" placeholder="Ex:ID101">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="exampleInputPassword2" class='control-label'>Company Name</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-institution"></i></span>
    		<input type="text" class="form-control border-dark" id="exampleInputPassword2" placeholder="Ex:Infosys" name="company_name">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="postedby" class='control-label'>Posted By</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-user"></i></span>
    		<input type="text" class="form-control border-dark" id="postedby" name="posted_by" placeholder="Ex:Mr.ABC">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="jobcode" class='control-label'>Job Code</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-key"></i></span>
    		<input type="text" class="form-control border-dark" id="jobcode" name="jobcode" placeholder="Ex:1244">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="emil" class='control-label'>Email</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-envelope"></i></span>
    		<input type="email" class="form-control border-dark" id="email" name="email" placeholder="Ex:job@gmail.com">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="Priority" class='control-label'>Priority</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-level-down"></i></span>
    		<select class="form-control border-dark" id="Priority" name="priority">  
	      		<option value="Urgent - Immediate" selected="selected">Urgent-Immediate</option>
	      		<option value="Urgent -1 Week">Urgent-1Week</option>
	      		<option value="Urgent -2 Weeks">Urgent-2Week</option>
	      		<option value="Urgent -4 Weeks">Urgent-4Week</option>
	      		<option value="General - Urgent">Urgent-general</option>
	      		<option value="Unspecified">Unspecified</option>
    		</select>
    	</div>
    </div>
    	<div class="form-group required col-md-6">
    		<label for="fax" class='control-label'>Fax</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-fax"></i></span>
    		<input type="number" class="form-control border-dark" id="fax" name="fax" placeholder="Ex:0245-4544">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="tel" class='control-label'>Mobile</label>
			<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-mobile"></i></span>    	
    		<input type="Mobile" class="form-control border-dark" id="tel" name="telephone" placeholder="Ex:1234567890">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="sdate" class='control-label'>Start date</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-calendar"></i></span>
    		<input type="date" class="form-control border-dark" id="sdate" name="sdate" >
  		</div>
  		</div>
  		<div class="form-group required col-md-6">
    		<label for="edate" class='control-label'>End date</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-calendar"></i></span>
    		<input type="date" class="form-control border-dark" id="edate" name="edate" >
  		</div>
  	</div>
          

  		<div class="form-group required col-md-6">
    		<label for="keyres" class='control-label'>Key responsibilities</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-child"></i></span>
    		<textarea class="form-control border-dark" id="keyres" name="key_responsibilities" rows="7"></textarea>
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="salarym" class='control-label'>Salary Max</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="	fa fa-inr"></i></span>
    		<input class="form-control border-dark" id="salarym" name="salary_max" type="number">
  		</div></div>
  		<div class="form-group required col-md-6">
    		<label for="salarymin" class='control-label'>Salary Min</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="	fa fa-inr"></i></span>
    		<input class="form-control border-dark" id="salarymin" name="salary_min" type="number">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="domain" class='control-label'>Job Domain</label>
    	<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fas fa-laptop-code"></i></span>
    		<input type="text" class="form-control border-dark" id="domain" name="job_domain" placeholder="Ex:Web">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="exp2" class='control-label'>Experience Max</label>
    	<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fas fa-business-time"></i></span>
    		<input class="form-control border-dark" id="exp2" name="experience_max" type="number" placeholder="In yrs">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="exp3" class='control-label'>Experience Min</label>
    	<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fas fa-business-time"></i></span>
    		<input class="form-control border-dark" id="exp3" name="experience_min" type="number" placeholder="In yrs">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="appfor" class='control-label'>Applicable For</label>
    	<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fas fa-plus-circle"></i></span>
    		<select class="form-control border-dark" id="appfor" name="applicable_for">  
	      		<option value="fresher">Fresher</option>
	      		<option value="experienced">Experienced</option>
	      		
    		</select>
    	</div>
    </div>
    	<div class="form-group required col-md-6">
    		<label for="jdate" class='control-label'>Expected Joining date</label>
    	<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="far fa-calendar-plus"></i></span>
    		<input type="date" class="form-control border-dark border-dark" id="jdate" name="expected_joining_date" >
  		</div>
  	</div>


  		<div class="form-group required">
    		<label for="skilss" class='control-label ml-4'>Skills Required</label>
    		<div class="container">
  <style type="text/css">
    .material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
  </style>
    <div class="row">
        <div class=" col-md-12 ">
            <div class="panel panel-default border-dark">
                <!-- Default panel contents -->
                <div class="panel-heading bg-secondary text-white"><h4>Technical Skills</h4></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      C/C++
                        <div class="material-switch pull-right">
                            <input id="skills1" name="skills[]" type="checkbox" value="C/C++" />
                            <label for="skills1" class="label-default"></label>
                        </div>
                        <hr>
                    </li>

                    <li class="list-group-item">
                        C#
                        <div class="material-switch pull-right">
                            <input id="skills2" name="skills[]" type="checkbox" value="C#"/>
                            <label for="skills2" class="label-primary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        PHP
                        <div class="material-switch pull-right">
                             <input id="skills3" name="skills[]" type="checkbox" value="PHP"/>
                            <label for="skills3" class="label-secondary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        HTML
                        <div class="material-switch pull-right">
                            <input id="skills4" name="skills[]" type="checkbox" value="HTML"/>
                            <label for="skills4" class="label-success"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        JavaScript
                        <div class="material-switch pull-right">
                           <input id="skills5" name="skills[]" type="checkbox" value="JavaScript"/>
                            <label for="skills5" class="label-info"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        VB.Net
                        <div class="material-switch pull-right">
                        <input id="skills6" name="skills[]" type="checkbox" value="VB.Net"/>
                            <label for="skills6" class="label-primary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                      Asp.Net
                        <div class="material-switch pull-right">
                            <input id="skills7" name="skills[]" type="checkbox" value="Asp.Net"/>
                            <label for="skills7" class="label-secondary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        Core Java
                        <div class="material-switch pull-right">
                            <input id="skills8" name="skills[]" type="checkbox" value="Core Java"/>
                            <label for="skills8" class="label-success"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        MySql
                        <div class="material-switch pull-right">
                          <input id="skills9" name="skills[]" type="checkbox" value="MySql"/>
                            <label for="skills9" class="label-info"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        Orcale\PL-SQL
                        <div class="material-switch pull-right">
                            <input id="skills10" name="skills[]" type="checkbox" value="Oracale"/>
                            <label for="skills10" class="label-primary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        SQL Server
                        <div class="material-switch pull-right">
                            <input id="skills11" name="skills[]" type="checkbox" value="SQL Server"/>
                            <label for="skills11" class="label-secondary"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        Android
                        <div class="material-switch pull-right">
                            <input id="skills12" name="skills[]" type="checkbox" value="Android"/>
                            <label for="skills12" class="label-success"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        Testing
                        <div class="material-switch pull-right">
                          <input id="skills13" name="skills[]" type="checkbox" value="Testing"/>
                            <label for="skills13" class="label-danger"></label>
                        </div>
                        <hr>
                    </li>
                    <li class="list-group-item">
                        Other Technical skills
                        <div class="material-switch pull-right">
                          <input id="skills14" name="skills[]" type="checkbox" value="Other Technical skills"/>
                            <label for="skills14" class="label-warning"></label>
                        </div>
                        <hr>
                    </li>
                </ul>
            </div>  
  		</div>
  		
  		<div class="form-group required col-md-6">
    		<label for="aemil" class='control-label'>Application Email</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-envelope"></i></span>
    		<input type="email" class="form-control border-dark" id="aemail" name="app_email" placeholder="Ex:job@gmail.com">
  		</div>
  	</div>
  		<div class="form-group required col-md-6">
    		<label for="cdate" class='control-label'>Closing Date</label>
    		<div class="input-group-prepend">
    			<span class="input-group-text bg-silver border-dark"><i class="fa fa-calendar"></i></span>
    		<input type="date" class="form-control border-dark" id="cdate" name="closing_date" >
  		</div>
  	</div>
  		<!--<div class="form-group">
    		<label for="exampleInputFile">Company Logo</label>
    		<input type="file" class="form-control border-dark-file" id="exampleInputFile" aria-describedby="fileHelp">-->
    <!--<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
  		</div>-->
  		
		 
	 <button type="submit" class="btn btn-block btn-success col-sm-12 mx-auto p-3" name="btnp"><span class="glyphicon glyphicon-ok"></span> Publish</button>
		 
</form>
</div>
</div>
</div>
</div>
</div>
<div class="footer">
  <p>HR Management System</p>
</div>
</body>
</html>


<?php

	if(isset($_POST['btnp'])){
	$_server="localhost";
	$_username="root";
	$_password="";
	$_db="hrmdss";
	$con=mysqli_connect($_server,$_username,$_password,$_db)or die(mysql_error());
	$location=$_POST['location'];
	$email=$_POST['email'];
	$job_title=$_POST['job_title'];
	$company_id=$_POST['company_id'];
	$job_desc=$_POST['job_description'];
	$posted_by=$_POST['posted_by'];
	$jobcode=$_POST['jobcode'];
	$priority=$_POST['priority'];
	$fax=$_POST['fax'];
	$telephone=$_POST['telephone'];
	$sdate=$_POST['sdate'];
	$jobtype=$_POST['job_type'];
	
	$edate=$_POST['edate'];
	$key_resposnse=$_POST['key_responsibilities'];
	$salary_max=$_POST['salary_max'];
	$salary_min=$_POST['salary_min'];
	$job_domain=$_POST['job_domain'];
	$experience_max=$_POST['experience_max'];
	$experience_min=$_POST['experience_min'];
	$applicabel_for=$_POST['applicable_for'];
	$expected_joining_date=$_POST['expected_joining_date'];
	$skills_required=$_POST['skills'];
	$apl_email=$_POST['app_email'];
	$closing_date=$_POST['closing_date'];
	$company_name=$_POST['company_name'];
	$region=$_POST['region'];
	$postdate=$_POST['postdate'];
  
  


	 $checkedArr = $_POST['skills'];     //return an array.
 	 $checkboxvalue = implode(",", $checkedArr);

	$sql="insert into job_posts values('','$company_id','$company_name','$posted_by','$jobcode','$priority','$email','$fax','$telephone','$sdate','$edate','$job_title','$jobtype','$location','$region','$postdate','$job_desc','$key_resposnse','$salary_min','$salary_max','$job_domain','$experience_min','$experience_max','$applicabel_for','$expected_joining_date','$checkboxvalue','$apl_email','$closing_date','','25-01-1998','','','')";






	$res=mysqli_query($con,$sql)or die(mysqli_error($con));
	mysqli_error($con);
	if($res>0)
	{
		?>
				<script> window.alert("JOB Posted successfully");</script>
				
				<?php

	}
	else
	{
		?>
				<script> window.alert("Job not posted please try again!");</script>
				
				<?php

	}

	}
}
?>

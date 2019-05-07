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
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</head>

<body style="background-color: lightblue;">
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
        <ul class="navbar-nav">
         
         <a href="logout.php " class="btn btn-danger" style="margin-top: 10px;">Logout</a>
          
          
        </ul>
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

       <!------------------------------------------------------->

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
          <div class="profile-body margin-bottom-20">
            <div class="tab-v1">
              <ul class="nav nav-justified nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#passwordTab">Password</a></li>
                <li><a data-toggle="tab" href="#educationTab">Edit Education</a></li>
                <li><a data-toggle="tab" href="#skillsTab">Edit Skills</a></li>
                <li><a data-toggle="tab" href="#projectsTab">Edit Projects</a></li>
                <li><a data-toggle="tab" href="#experienceTab">Edit Experience</a></li>
              </ul>
              <div class="tab-content">
                <div id="profile" class="profile-edit tab-pane fade in active">
                  <h2 class="heading-md">Manage your Name, Address and Email Addresses.</h2>
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
                      
                      <input type="text" name="txtLastName" id="txtLastName" oncopy="return false;" onpaste="return false;" value="<?php echo $row['lastname'];?>" maxlength="50" class="form-control" placeholder="Your Last Name"  required="" style="height: 20%;">
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
                   
                  </dl>
                  <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn1">Save Changes</button>
                  </form>
                </div>


        <!--PASSWORD------------------------------------------------------------------------>


                <div id="passwordTab" class="profile-edit tab-pane fade">
                  <h2 class="heading-md">Manage your Security Settings</h2>
                  <p>Change your password.</p>
                  <br>
                  <form class="sky-form" id="sky-form4" action="update.php" method="post">
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
                   
                    <br>
                    <section>
                      <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                    </section>
                    <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn2">Save Changes</button>
                  </form>
                </div>
     <!----------------------------3RD TAB--------------------------------------------------->
                <div id="educationTab" class="profile-edit tab-pane fade">
                  <h2 class="heading-md">Manage your Education Details here.</h2>
                  <p>Below are the education details for your account.</p>
                  <br>
                  <form class="sky-form" id="sky-form" action="update.php" method="post">
                    <!--Checkout-Form-->
                   
                    <dl class="dl-horizontal">
                    <dt><strong> Education Qualification</strong></dt>
                    <dd>
                    <select name="ddlEduQualification" id="ddlEduQualification" class="form-control" required="">
                      <option value="selected" >- Please Select Option -</option>
                      <option <?php if($row['qualification']=="BTech"){?>  selected="selected" <?php } ?> value="BTech">BTech</option>
                      <option <?php if($row['qualification']=="MTech"){?>  selected="selected" <?php }?> value="MTech">MTech</option>
                      <option <?php if($row['qualification']=="BE"){?>  selected="selected" <?php } ?> value="BE">BE</option>
                      <option <?php if($row['qualification']=="ME"){?>  selected="selected" <?php }?> value="ME">ME</option>
                      <option <?php if($row['qualification']=="BCS"){?>  selected="selected" <?php } ?> value="BCS">BCS</option>
                      <option <?php if($row['qualification']=="MCS"){?>  selected="selected" <?php } ?>value="MCS">MCS</option>
                      <option <?php if($row['qualification']=="BCA"){?>  selected="selected" <?php } ?> value="BCA">BCA</option>
                      <option <?php if($row['qualification']=="MCA"){?>  selected="selected" <?php } ?>value="MCA">MCA</option>
                      <option <?php if($row['qualification']=="BSC"){?>  selected="selected" <?php }?> value="BSC">BSC</option>
                      <option <?php if($row['qualification']=="MSC"){?>  selected="selected" <?php } ?>value="MSC">MSC</option>
                      <option <?php if($row['qualification']=="BBA"){?>  selected="selected" <?php } ?>value="BBA">BBA</option>
                      <option <?php if($row['qualification']=="MBA"){?>  selected="selected" <?php } ?>value="MBA">MBA</option>
                      <option <?php if($row['qualification']=="MCM"){?>  selected="selected" <?php }?> value="MCM">MCM</option>

                    </select>
                    </dd>
                      <hr>
                    <dt><strong> Education Specialisation</strong></dt>
                    <dd>

                    <select name="ddlSpcl" id="ddlSpcl" class="form-control" required="">
                    
                    <option value="" selected="selected">- Please Select Option -</option>
                    <option <?php if($row['special_skill']=="Acoustic"){?>  selected="selected" <?php } ?> value="Acoustic">Acoustic</option>
                    <option <?php if($row['special_skill']=="Aerospace"){?>  selected="selected" <?php } ?> value="Aerospace">Aerospace</option>
                    <option <?php if($row['special_skill']=="Aeronautical"){?>  selected="selected" <?php } ?> value="Aeronautical">Aeronautical</option>
                    <option <?php if($row['special_skill']=="Agricultural"){?>  selected="selected" <?php } ?> value="Agricultural">Agricultural</option>
                    <option <?php if($row['special_skill']=="Automobiles"){?>  selected="selected" <?php } ?> value="Automobiles">Automobiles</option>
                    <option <?php if($row['special_skill']=="Biomedical"){?>  selected="selected" <?php } ?> value="Biomedical">Biomedical</option>
                    <option <?php if($row['special_skill']=="Chemical"){?>  selected="selected" <?php } ?> value="Chemical">Chemical</option>
                    <option <?php if($row['special_skill']=="Civil"){?>  selected="selected" <?php } ?> value="Civil">Civil</option>
                    <option <?php if($row['special_skill']=="Computer"){?>  selected="selected" <?php } ?> value="Computer">Computer</option>
                    <option <?php if($row['special_skill']=="Electrical"){?>  selected="selected" <?php } ?> value="Electrical">Electrical</option>
                    <option <?php if($row['special_skill']=="Electronics"){?>  selected="selected" <?php } ?> value="Electronics">Electronics</option>
                    <option <?php if($row['special_skill']=="Electronics and Tele Communication"){?>  selected="selected" <?php } ?> value="Electronics and Tele Communication">Electronics and Tele Communication</option>
                    <option <?php if($row['special_skill']=="Environmental"){?>  selected="selected" <?php } ?> value="Environmental">Environmental</option>
                    <option <?php if($row['special_skill']=="Finance"){?>  selected="selected" <?php } ?>  value="Finance">Finance</option>
                    <option <?php if($row['special_skill']=="Gneral"){?>  selected="selected" <?php } ?> value="General">General</option>
                    <option <?php if($row['special_skill']=="Hospital"){?>  selected="selected" <?php } ?> value="Hospital">Hospital</option>
                    <option <?php if($row['special_skill']=="Hotel"){?>  selected="selected" <?php } ?> value="Hotel">Hotel</option>
                    <option <?php if($row['special_skill']=="Human Resources"){?>  selected="selected" <?php } ?> value="Human Rresources">Human Rresources</option>
                    <option <?php if($row['special_skill']=="Industrial"){?>  selected="selected" <?php } ?> value="Industrial">Industrial</option>
                    <option <?php if($row['special_skill']=="Instrumentation and Control"){?>  selected="selected" <?php } ?> value="Instrumentation and Control">Instrumentation and Control</option>
                    <option <?php if($row['special_skill']=="Marine"){?>  selected="selected" <?php } ?> value="Marine">Marine</option>
                    <option <?php if($row['special_skill']=="Marketing"){?>  selected="selected" <?php } ?> value="Marketing">Marketing</option>
                    <option <?php if($row['special_skill']=="Materials"){?>  selected="selected" <?php } ?> value="Materials">Materials</option>
                    <option <?php if($row['special_skill']=="Mechanical"){?>  selected="selected" <?php } ?> value="Mechanical">Mechanical</option>
                    <option <?php if($row['special_skill']=="Metallurgical"){?>  selected="selected" <?php } ?> value="Metallurgical">Metallurgical</option>
                    <option <?php if($row['special_skill']=="Mining"){?>  selected="selected" <?php } ?> value="Mining">Mining</option>
                    <option <?php if($row['special_skill']=="Naval Architecture"){?>  selected="selected" <?php } ?> value="Naval Architecture">Naval Architecture</option>
                    <option <?php if($row['special_skill']=="Nuclear"){?>  selected="selected" <?php } ?> value="Nuclear">Nuclear</option>
                    <option <?php if($row['special_skill']=="Ocean"){?>  selected="selected" <?php } ?> value="Ocean">Ocean</option>
                    <option <?php if($row['special_skill']=="Operations"){?>  selected="selected" <?php } ?> value="Operations">Operations</option>
                    <option <?php if($row['special_skill']=="Petroleum"){?>  selected="selected" <?php } ?> value="Petroleum">Petroleum</option>
                    <option <?php if($row['special_skill']=="Polymer"){?>  selected="selected" <?php } ?> value="Polymer">Polymer</option>
                    <option <?php if($row['special_skill']=="Production"){?>  selected="selected" <?php } ?> value="Production">Production</option>
                    <option <?php if($row['special_skill']=="Textile"){?>  selected="selected" <?php } ?> value="Textile">Textile</option>
                    <option <?php if($row['special_skill']=="Transportation"){?>  selected="selected" <?php } ?> value="Transportation">Transportation</option>
                    <option <?php if($row['special_skill']=="Other"){?>  selected="selected" <?php } ?> value="Other">Other</option>

                    </select>
                    </dd>
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
                      <input type="number" name="txtGradPercentage" min="0" max="100" step="1" class="form-control" placeholder="Degree Pecentage"   required="" value="<?php echo $row['btech_mtech_percentage'];?>">
                    </dd>
                    
                    <hr>

                   
                   <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn3">Save Changes</button>
                    <!--End Checkout-Form-->
                  </form>
                </div>
      <!----------------------------4TH TAB--------------------------------------------------->
                <div id="skillsTab" class="profile-edit tab-pane fade">
                  <h2 class="heading-md">Manage your SkillSets.</h2>
                  <p>Below are the Skills you may manage. If you want to edit them resubmit all.</p>
                  <br>
                  
                  <form class="sky-form" id="sky-form3" action="update.php" method="post">
                   <div class="row">
                    <div class="col-md-6">
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="c/c++"><i class="no-rounded"></i>C/C++</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="c#"><i class="no-rounded"></i>C#</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="php"><i class="no-rounded"></i>PHP</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="html"> <i class="no-rounded"></i>HTML</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="javascript"><i class="no-rounded"></i>JavaScript</label>
                    <hr>
                    
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="vb.net"><i class="no-rounded"></i>VB.NET</label>
                    <hr>
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="asp.net"><i class="no-rounded"></i>ASP.NET</label>
                    <hr>
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="core java"><i class="no-rounded"></i>Core Java</label>
                    <hr>
                    </div>
                    <div class="col-md-6">
                   
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="mysql"><i class="no-rounded"></i>MySql</label>
                    <hr>
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="orcale"><i class="no-rounded"></i>Oracle/PL-SQL</label>
                    <hr>
                     <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="sql server"><i class="no-rounded"></i>SQL Server</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="android"><i class="no-rounded"></i>Android</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="testing"><i class="no-rounded"></i>testing</label>
                    <hr>
                    <label class="toggle"><input type="checkbox" checked="" name="Tskills[]" value="other technical skills"><i class="no-rounded"></i>Other Technoical Skils</label>
                    <hr>
                  </div>
                </div>
                   <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn4">Save Changes</button>
                  
                  </form>

                </div>

 <!----------------------------5TH TAB--------------------------------------------------->
    <?php 

      $item=explode(",", $row['project_name']);
      $pduration=explode(",", $row['project_duration']);
      $prole=explode(",", $row['project_role']);
      $pdescription=explode(",", $row['project_description']);

     ?>


  <div id="projectsTab" class="profile-edit tab-pane fade">
                  <h2 class="heading-md">Manage your Projects.</h2>
                  <p>Below are the projects you may manage.</p>
                  <br>
                  <form action="update.php" method="post">
                    <div name="abc" id="abc">
                    <?php foreach ($item as $key => $value): ?>
               
                     
                    <dl class="dl-horizontal">
                     
                      <dt><strong>Title</strong></dt>
                    <dd>
                       <input type="text" name="pname[]" id="pname" value="<?php echo $value; ?>" maxlength="50" class="form-control" placeholder="Project name"   required="">
                      
                    </dd>
                    <hr>  
                    <dt><strong>Project Duration</strong></dt>
                    <dd>
                      <input type="text" name="pduration[]" id="pduration" value="<?php echo $pduration[$key];?>" maxlength="50" class="form-control" placeholder="Project duration"   required="">
                    </dd>
                    <hr> 
                    <dt><strong>Your role in project</strong></dt>
                    <dd>
                     <input type="text" name="prole[]" id="prole" value="<?php echo $prole[$key];?>" maxlength="50" class="form-control" placeholder="Role"   required="">
                    </dd>
                    <hr>  
                    <dt><strong>Project Description</strong></dt>
                    <dd>
                     <input type="text" name="pdescription[]" id="pdescription" value="<?php echo $pdescription[$key];?>" maxlength="50" class="form-control" placeholder="Project description"   required="">
                    </dd>
                    <div class="border-dark"><hr></div>
                    <hr> 
                    
                    </dl>
                   
                    <?php endforeach ?>
                     </div>
              
                  <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn5">Save Changes</button>
                   <a id="add" name="add" class=" btn-u" >Add more</a> 
                  </form>
                    <script>  

                  $(document).ready(function(e){
                    var html=' <div id="new"><h5>NEW ONE</h5> <dl class="dl-horizontal"><dt><strong>Title</strong></dt><dd><input type="text" name="pname[]" id="pname" value="" maxlength="50" class="form-control" placeholder="Project name"   required=""></dd><hr><dt><strong>Project Duration</strong></dt><dd><input type="text" name="pduration[]" id="pduration" value="" maxlength="50" class="form-control"placeholder="Project duration"   required=""></dd><hr> <dt><strong>Your role in project</strong></dt><dd><input type="text" name="prole[]" id="prole" value="" maxlength="50" class="form-control"placeholder="Role"   required=""></dd><hr>  <dt><strong>ProjectDescription</strong></dt><dd><input type="text" name="pdescription[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"   required=""></dd><hr><a  id="btnremove" name="remove"  class="form-control btn btn-primary" >Remove</a><br><hr><hr></dl></div>';
                

                    $("#add").click(function(e){
                      $("#abc").append(html)
                      });

                    $('#abc').on('click','#btnremove',function(e){
                      $('#new').remove();
                    });
                  });
                  </script>

                 
  </div>


  <!--end 5th------------------------->

  <!------6th------------------------------------------------------------------------------->
  <?php 

  $cname=explode(",",$row['company_name']);
  $sdate=explode(",", $row['start_date']);
  $edate=explode(",", $row['end_date']);
  $jtitle=explode(",", $row['job_tiitle']);
  $jdesc=explode(",", $row['job_description']);


   ?>
 <div id="experienceTab" class="profile-edit tab-pane fade">
                  <h2 class="heading-md">Manage your Experience.</h2>
                  <p>Below are the Experiences on file of your account.</p>
                  <br>
                 <form action="update.php" method="post">
                  <div name="abc1" id="abc1">
                  <?php foreach ($cname as $key => $value): ?>
                  <dl class="dl-horizontal">
                   
                   
                    <dt><strong>Comapany Name</strong></dt>
                    <dd>
                       <input type="text" name="cname[]" id="cname" value="<?php echo $value;?>" maxlength="50" class="form-control" placeholder="company name"  >
                      
                    </dd>
                    <hr>
                  <div class="row"> 
                    <div class="col-md-6">
                    <dt><strong>Start Year</strong></dt>
                    <dd>
                       <input type="date" name="syear[]" id="syear" value="<?php echo $sdate[$key]; ?>" maxlength="50" class="form-control" placeholder="start year"  >
                    </dd>
                    <hr>
                    </div>
                    <div class="col-md-6">
                    <dt><strong>end Year</strong></dt>
                    <dd>
                     <input type="date" name="eyear[]" id="eyear" value="<?php echo $edate[$key]?>" maxlength="50" class="form-control" placeholder="end date"  >
                    </dd>
                    <hr>
                    </div>  
                  </div>
                    <dt><strong>Job Title</strong></dt>
                    <dd>
                     <input type="text" name="jtitle[]" id="prole" value="<?php echo $jtitle[$key]?>" maxlength="50" class="form-control" placeholder="Role"   required="">
                    </dd>
                    <hr>  
                    <dt><strong>Job Description</strong></dt>
                    <dd>
                     <input type="text" name="job_description[]" id="pdescription" value="<?php echo $jdesc[$key]?>" maxlength="50" class="form-control" placeholder="Project description"   required="">
                    </dd>
                    
                       <hr> 
                       -------------------------------- 
                    <hr>  
                  </dl>
                       
                    <?php endforeach ?>
                    </div>
                   <a href="applicanthome.php" class="btn-u btn-u-default">Cancel</a>
                  <button type="submit" class="btn-u" name="btn6">Save Changes</button>
                  <a id="add1" name="add1" class=" btn-u" >Add more</a> 
                
                </form>
                <script>  

                  $(document).ready(function(e){
                    var html='<div id="new1"><h5>NEW ONE</h5>  <dl class="dl-horizontal"><dt><strong>Comapany Name</strong></dt><dd><input type="text" name="cname[]" id="cname" value="" maxlength="50" class="form-control" placeholder="company name"  ></dd> <hr><div class="row">  <div class="col-md-6"><dt><strong>Start Year</strong></dt><dd> <input type="date" name="syear[]" id="syear" value="" maxlength="50" class="form-control" placeholder="start year"  ></dd>   <hr> </div><div class="col-md-6"><dt><strong>end Year</strong></dt><dd><input type="date" name="eyear[]" id="eyear" value="" maxlength="50" class="form-control" placeholder="end date"  > </dd><hr></div>  </div> <dt><strong>Job Title</strong></dt><dd>  <input type="text" name="jtitle[]" id="prole" value="" maxlength="50" class="form-control" placeholder="Role"   required=""></dd><hr>   <dt><strong>Job Description</strong></dt>  <dd> <input type="text" name="job_description[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"   required=""></dd><hr> --------------------------------  <hr> </dl><a  id="btnremove1" name="remove"  class="form-control btn btn-primary" >Remove</a><hr><hr></div>';
                

                    $("#add1").click(function(e){
                      $("#abc1").append(html)
                      });

                    $('#abc1').on('click','#btnremove1',function(e){
                      $('#new1').remove();
                    });
                  });
                  </script>

                 
                </div>



  <!--end 5th------------------------->
              </div>
            </div>
          </div>
        </div>
        <!-- End Profile Content -->
      </div><!--/end row-->
    </div>
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
     

      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>
                2019 &copy; All Rights Reserved.
                <a href="">Privacy Policy</a> | <a href="">Terms of Service</a>
              </p>
            </div>

            <!-- Social Links -->
            
            <!-- End Social Links -->
          </div>
        </div>
      </div><!--/copyright-->
    </div>
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
  <script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- JS Customization -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
  <!-- JS Page Level -->
  <script type="text/javascript" src="assets/js/app.js"></script>
  <script type="text/javascript" src="assets/js/forms/reg.js"></script>
  <script type="text/javascript" src="assets/js/forms/checkout.js"></script>
  <script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
  <script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      

      App.initScrollBar();
      RegForm.initRegForm();
      Datepicker.initDatepicker();
      CheckoutForm.initCheckoutForm();
      StyleSwitcher.initStyleSwitcher();
    });
  </script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/respond.js"></script>
  <script src="assets/plugins/html5shiv.js"></script>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
  <![endif]-->

  <!--[if lt IE 10]>
  <script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
  <![endif]-->
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

    if($_POST['email']==$_SESSION["applicantuser"]){
      if($_POST['password']==$_POST['passwordConfirm'])
      {
        $email=$_POST['email'];
        $pass=$_POST['password'];

          $sql="Update jobapplication set email_id='$email', password='$pass' where email_id='$user1'";
          $result = $conn->query($sql)or die(mysqli_error($conn));

   
        if ($result> 0)
          {
           echo "<script>alert('Password Updated');</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>"; 
          } 
      }
      else{
        echo "<script>alert('Passwords does not match');</script>"; 
      }
    }
    else{
       echo "<script>alert('Wrong email Address');</script>"; 
    }


  }

if(isset($_POST['btn3'])){
    $qualification = $_POST['ddlEduQualification'];
    $specialisation= $_POST['ddlSpcl'];
    $tenthpercentage= $_POST['txt10thPercentage'];
    $tewthpercentage= $_POST['txt12thPercentage'];
    $gradpercentage= $_POST['txtGradPercentage'];



  $sql="Update jobapplication set qualification='$qualification',ten_percentage='$tenthpercentage',tewdip_percentage='$tewthpercentage',special_skill='$specialisation' where email_id='$user1'";
     $result = $conn->query($sql)or die(mysqli_error($conn));

   
        if ($result> 0)
          {
           echo "<script>alert('Educational details Updated');</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>"; 
          } 
       
  }


if(isset($_POST['btn4'])){

  $skills=implode(",",$_POST['Tskills']);


  $sql="Update jobapplication set tech_skill='$skills' where email_id='$user1'";
     $result = $conn->query($sql)or die(mysqli_error($conn));

   
        if ($result> 0)
          {
           echo "<script>alert('Technical Skills Updated');</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>"; 
          } 
}



if(isset($_POST['btn5'])){

  $proname=implode(",", $_POST['pname']);
  $produration=implode(",",$_POST['pduration']);
  $prorole=implode(",",$_POST['prole']);
  $prodesc=implode(",",$_POST['pdescription']);



  $sql="Update jobapplication set project_name='$proname',project_duration='$produration',project_description='$prodesc',project_role='$prorole' where email_id='$user1'";
     $result = $conn->query($sql)or die(mysqli_error($conn));

   
        if ($result> 0)
          {
           echo "<script>alert('Projects Updated');</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>"; 
          } 

}

if(isset($_POST['btn6'])){

  $comp_name=implode(",", $_POST['cname']);
  $stdate=implode(",",$_POST['syear']);
  $enddate=implode(",",$_POST['eyear']);
  $desc=implode(",",$_POST['job_description']);
  $title=implode(",",$_POST['jtitle']);



  $sql="Update jobapplication set company_name='$comp_name',start_date='$stdate',end_date='$enddate',job_tiitle='$title',job_description='$desc' where email_id='$user1'";
     $result = $conn->query($sql)or die(mysqli_error($conn));

   
        if ($result> 0)
          {
           echo "<script>alert('Experience Updated');</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>"; 
          } 

}
}

  ?>














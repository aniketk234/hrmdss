<?php
    $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hrmdss";

      $conn = new mysqli($servername, $username, $password, $dbname);


session_start();

if(!isset($_SESSION["applicantuser"]))
   {
    header('location:../home.html');
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

          $fname=$row['firstname'];
          $lname=$row['lastname'];
          $email=$row['email_id'];

   }





?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Job Application Form</title>
<!-- Add to Head -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<link rel="stylesheet" href="../assets/css/headers/header-default.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js" type="text/javascript"></script>
<script src='//www.google.com/recaptcha/api.js'></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet" />
<script language="JavaScript" type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="assets/css/html5reset.css" media="all">
<link rel="stylesheet" href="assets/css/col.css" media="all">
<link rel="stylesheet" href="assets/css/1cols.css" media="all">
<link rel="stylesheet" href="assets/css/2cols.css" media="all">
<!-- jQuery Form Validation code -->


  

  


<script type="text/javascript" language="JavaScript">
<!--
//File upload button
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
	$("#field_10" ).trigger( "focus" );
	$("#field_10" ).trigger('keyup');
	$("#field_11" ).trigger( "focus" );
	$("#field_11" ).trigger('keyup');
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
}); 
// Phone allows for internatonal numbers and ext 
jQuery.validator.addMethod("phone", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
	return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^((\+)?[1-9]{1,2})?([-\s\.\(\)\])?((\(\d{1,4}\))|\d{1,4})(([-\s\.\(\)\])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/);
}, "Please specify a valid phone number");

// Removes Error Message When reCaptcha is Checked Valid
function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};

// Set Max File Attachment Size 
$.validator.addMethod(
    "maxfilesize",
    function (value, element) {
        return this.optional(element) || (element.files && element.files[0]
                               && element.files[0].size < 1024 * 1024 * 4); // Set the * 4) 4MB to max mb and test
    },
    'Maximum file size limit is 4MB'
);





$.fn.singleDatePicker = function() {
  $(this).on("apply.daterangepicker", function(e, picker) {
    picker.element.val(picker.startDate.format(picker.locale.format));
  });
  return $(this).daterangepicker({
    locale: {
      format: 'DD-MM-YYYY' // Change to local formats YYYY-MM-DD - MM-DD-YYYY
    },
    singleDatePicker: true,
    autoUpdateInput: false
  });
};
// Textarea Countdown
function limitTextCount(limitField_id, limitCount_id, limitNum)
{
    var limitField = document.getElementById(limitField_id);
    var limitCount = document.getElementById(limitCount_id);
    var fieldLEN = limitField.value.length;

    if (fieldLEN > limitNum)
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
    else
    {
        limitCount.innerHTML = (limitNum - fieldLEN) + ' Countdown';
    }
}
// Submit button Please Wait... and loading gif
$(function () {
    $('#frmFormMail').submit(function () {
        if($(this).valid()) {
          $("#btn").val("Please Wait... ");
		  $('#divMsg').show();
        }
    });
});
-->
</script>
<style type="text/css">
<!--
/* THIS FORM IS RESPONSIVE - MOBILE FRIENDLY */
.margin {
   margin:8px; /* Form outside margin */
}
.form-container{
	max-width:800px; /* change this to get your desired form width */
    width:100%;
	margin: 0 auto;
	border:solid 1px #CCCCCC; /* Remove outer border if wished */
	padding:10px;
	margin-top:5px;
	margin-bottom:40px;
	padding-bottom:30px;
}
.header {
  font-size:24px;
  font-weight:normal;
  background-color:#950000; /* Header Backgroung Colour  */
  color:white; /* Header Text Colour  */
  max-width:100%;
  padding:10px;
}
.sub-header {
  font-size:20px;
  font-weight:normal;
  background-color:;
  border-bottom:solid 1px #950000; /* Divider Border Colour  */
  color:#950000; /* Sub-heading Text Text Colour  */
  max-width:100%;
  padding:5px;
}
/* Placeholder disappears on focus */
input:focus::-webkit-input-placeholder  {color:transparent !IMPORTANT;}
input:focus::-moz-placeholder   {color:transparent !IMPORTANT;}
input:-moz-placeholder   {color:transparent !IMPORTANT;}
textarea:focus::-webkit-input-placeholder  {color:transparent !IMPORTANT;}
textarea:focus::-moz-placeholder   {color:transparent !IMPORTANT;}
textarea:-moz-placeholder   {color:transparent !IMPORTANT;}
textarea{ height:70px !IMPORTANT;}
input[type="file"] {
  color:#000 !IMPORTANT;    
}
input.file[type="text"] {
  background-color:white !IMPORTANT;
}
.control-label {font-size:14px; font-weight:bold; margin-bottom:5px; !IMPORTANT;}
.input-row {
  display:block;
  min-height:85px;
  margin-bottom:-5px;
}
input:-webkit-autofill {
    -webkit-box-shadow:0 0 0 50px white inset !important; /* Change the color to your own background color */
    -webkit-text-fill-color: #333 !important;
}
input:-webkit-autofill:focus {
    -webkit-box-shadow: /*your box-shadow*/,0 0 0 50px white inset !important;
    -webkit-text-fill-color: #333 !important;
}
-->
</style>
</head>
<body><div class="header">
       <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../home.php">
          Resume Ranking </a>
      
      </div>
      <div class="collapse navbar-collapse ">
        <ul class="navbar-nav ">
         
         <a href="../logout.php " class="btn btn-danger">Logout</a>
          
          
        </ul>
      </div>
    </div>
  </nav>
    </div>
<div class="margin">
  <div class="form-container">
    <h4>Fill Out the form first</h4>
    <div class="header">JOB APPLICATION FORM</div>
    <div>&nbsp;</div>
    <form  action='zcon.php' method='post' enctype='multipart/form-data' autocomplete="on">
      <input type='hidden' name='formmail_submit' value='Y'>
      <input type='hidden' name='mod' value='ajax'>
      <input type='hidden' name='func' value='submit'>
      <!-- Left Column -->
      <div class="section group">
        <div class="col span_1_of_2">
          <div class="sub-header">Personal Information</div>
          <div>&nbsp;</div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



          <div class="input-row">
            <label class="control-label" for="txtFirstName">First Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtFirstName" id="txtFirstName" oncopy="return false;" onpaste="return false;" value="<?php echo "$fname";?>" maxlength="50" class="form-control" placeholder="Your Name"  required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtFirstName" generated="true"></label>
            </div>
          </div>

      

           <div class="input-row">
            <label class="control-label" for="txtLastName">Last Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="txtLastName" type="text" maxlength="50" id="txtLastName" class="form-control" placeholder="Your Last Name" required="" value="<?php echo "$lname";?>">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtLastName" generated="true"></label>
            </div>
          </div>



           <div class="input-row">
            <label class="control-label" for="txtEmailAdd">Email<span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input  name="txtEmailAdd" type="Email" maxlength="150" id="txtEmailAdd"  class="form-control" placeholder="Your Email Address" required="" value="<?php echo "$email";?>">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtEmailAdd" generated="true"></label>
            </div>
          </div>


           <div class="input-row">
            <label class="control-label" for="txtBirthDate">Birth Date <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="date" name="txtBirthDate" id="txtBirthDate" oncopy="return false" onpaste="return false" oncut="return false" value="" maxlength="50" class="form-control" placeholder="Date"  required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtBirthDate" generated="true"></label>
            </div>
          </div>

         <div class="input-row">
            <label class="control-label" for="gpGender"> Gender <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="gpGender" id="gpGender" class="form-control">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected" required="">- Please Select Gender -</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
               
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="gpGender" generated="true"></label>
            </div>
          </div>

           <div class="input-row">
            <label class="control-label" for="gpMaritalStatus"> Marital status <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="gpMaritalStatus" id="gpMaritalStatus" class="form-control">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected" required="">- Select Marital Status -</option>
                  <option value="Married">Married</option>
                  <option value="Unmarried">Unmarried</option>
               
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="gpMaritalStatus" generated="true"></label>
            </div>
          </div>

          <div class="input-row">
            <label class="control-label" for="txtMobileNo">Contact no <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="tel" name="txtMobileNo" id="txtMobileNo" oncopy="return false" onpaste="return false" oncut="return false" value="" maxlength="10" class="form-control" placeholder="Your Contact no"  required="" required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; font-size:12px; margin-top:5px;" class="error" for="txtMobileNo" generated="true"></label>
            </div>
          </div>
          
          <div class="input-row">
            <label class="control-label" for="txtAltMobNo">Alternate Contact no <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="tel" name="txtAltMobNo" id="txtAltMobNo"  oncopy="return false" onpaste="return false" oncut="return false"  value="" maxlength="10" class="form-control" placeholder="Your Alternate Contact no" required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; font-size:12px; margin-top:5px;" class="error" for="txtAltMobNo" generated="true"></label>
            </div>
          </div>

          <div class="input-row">
            <label class="control-label" for="txtPuneAddress">Present Address <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="textarea" rows="2" cols="20"  name="txtPuneAddress" id="txtPuneAddress" value="" maxlength="200" class="form-control" placeholder="Your Address" required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtPuneAddress" generated="true"></label>
            </div>
          </div>

           <div class="input-row">
            <label class="control-label" for="ddlState"> Current State <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddlState" id="ddlState" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="selected" selected="selected">- Please Select State -</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands </option>
                <option value="Andhra Pradesh">Andhra Pradesh </option>
                <option value="Arunachal Pradesh">Arunachal Pradesh </option>
                <option value="Assam">Assam </option>
                <option value="Bihar">Bihar </option>
                <option value="Chandigarh">Chandigarh </option>
                <option value="Chhatisgarh">Chhatisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli </option>
                <option value="Daman and Diu">Daman and Diu </option>
                <option value="Delhi">Delhi </option>
                <option value="Goa">Goa </option>
                <option value="Gujarat">Gujarat </option>
                <option value="Haryana">Haryana </option>
                <option value="Himachal Pradesh">Himachal Pradesh </option>
                <option value="Jammu and Kashmir">Jammu and Kashmir </option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka </option>
                <option value="Kerala">Kerala </option>
                <option value="Lakshadweep">Lakshadweep </option>
                <option value="Madhya Pradesh">Madhya Pradesh </option>
                <option value="Maharashtra">Maharashtra </option>
                <option value="Manipur">Manipur </option>
                <option value="Meghalaya">Meghalaya </option>
                <option value="Mizoram">Mizoram </option>
                <option value="Nagaland">Nagaland </option>
                <option value="Orissa">Orissa </option>
                <option value="Pondicherry">Pondicherry </option>
                <option value="Punjab">Punjab </option>
                <option value="Rajasthan">Rajasthan </option>
                <option value="Sikkim">Sikkim </option>
                <option value="Tamil Nadu">Tamil Nadu </option>
                <option value="Tripura">Tripura </option>
                <option value="Uttaranchal">Uttaranchal</option>
                <option value="Uttar Pradesh">Uttar Pradesh </option>
                <option value="West Bengal">West Bengal </option>
               
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddlState" generated="true"></label>
            </div>
          </div>

   <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Languages</div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      English
                        <div class="material-switch pull-right">
                            <input id="chkEnglish" name="chklang[]" value="English" type="checkbox"/>
                            <label for="chkEnglish" class="label-default"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Hindi
                        <div class="material-switch pull-right">
                            <input id="chkHindi" name="chklang[]" value="Hindi" type="checkbox"/>
                            <label for="chkHindi" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Marathi
                        <div class="material-switch pull-right">
                            <input id="chkMarathi" name="chklang[]" value="Marathi" type="checkbox"/>
                            <label for="chkMarathi" class="label-success"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        other
                        <div class="material-switch pull-right">
                            <input id="chkOther" name="chklang[]" value="other" type="checkbox"/>
                            <label for="chkOther" class="label-success"></label>
                        </div>
                    </li>
                  
                </ul>
            </div>



          <div class="input-row">
            <label class="control-label" for="career"> Career Objective <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="textarea" rows="5" cols="20"  name="career" id="career" value="" maxlength="200" class="form-control" placeholder="Your Career Objective" required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="career" generated="true"></label>
            </div>
          </div>
</div>


        <!-- Right Column -->
        <div class="col span_1_of_2">
          <div class="sub-header">Educational Details</div>
          <div>&nbsp;</div>
          <div class="input-row">
            <label class="control-label" for="field_6"> Education Qualification <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddlEduQualification" id="ddlEduQualification" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="selected" selected="selected">- Please Select Option -</option>
                 
                 <option value="BTech">BTech</option>
                  <option value="MTech">MTech</option>
                  <option value="BE">BE</option>
                  <option value="ME">ME</option>
                  <option value="BCS">BCS</option>
                  <option value="MCS">MCS</option>
                  <option value="BCA">BCA</option>
                  <option value="MCA">MCA</option>
                  <option value="BSC">BSC</option>
                  <option value="MSC">MSC</option>
                  <option value="BBA">BBA</option>
                  <option value="MBA">MBA</option>
                  <option value="MCM">MCM</option>

			
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddlEduQualification" generated="true"></label>
            </div>
          </div>


          <div class="input-row">
            <label class="control-label" for="field_7">Specialization <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddlSpcl" id="ddlSpcl" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select Option -</option>
                  <option value="Acoustic">Acoustic</option>
                    <option value="Aerospace">Aerospace</option>
                    <option value="Aeronautical">Aeronautical</option>
                    <option value="Agricultural">Agricultural</option>
                    <option value="Automobiles">Automobiles</option>
                    <option value="Biomedical">Biomedical</option>
                    <option value="Chemical">Chemical</option>
                    <option value="Civil">Civil</option>
                    <option value="Computer">Computer</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Electronics and Tele Communication">Electronics and Tele Communication</option>
                    <option value="Environmental">Environmental</option>
                    <option value="Finance">Finance</option>
                    <option value="General">General</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Hotel">Hotel</option>
                    <option value="Human Rresources">Human Rresources</option>
                    <option value="Industrial">Industrial</option>
                    <option value="Instrumentation and Control">Instrumentation and Control</option>
                    <option value="Marine">Marine</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Materials">Materials</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Metallurgical">Metallurgical</option>
                    <option value="Mining">Mining</option>
                    <option value="Naval Architecture">Naval Architecture</option>
                    <option value="Nuclear">Nuclear</option>
                    <option value="Ocean">Ocean</option>
                    <option value="Operations">Operations</option>
                    <option value="Petroleum">Petroleum</option>
                    <option value="Polymer">Polymer</option>
                    <option value="Production">Production</option>
                    <option value="Textile">Textile</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Other">Other</option>

                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddlSpcl" generated="true"></label>
            </div>
          </div>

            <div class="input-row">
            <label class="control-label" for="ddl10thYear"> 10th std passing year <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddl10thYear" id="ddl10thYear" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select Year -</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2018">2019</option>
                <option value="2018">2020</option>
                <option value="2018">2021</option>

                <option value="2018">2022</option>
           
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddl10thYear" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txt10thSchool">School Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txt10thSchool" id="txt10thSchool" value="" maxlength="50" class="form-control" placeholder="Your School Name"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt10thSchool" generated="true"></label>
            </div>
          </div>

            <div class="input-row">
            <label class="control-label" for="txt10thBoard">Board Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txt10thBoard" id="txt10thBoard" value="" maxlength="50" class="form-control" placeholder="School Board Name"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt10thBoard" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txt10thPercentage">School Pecentage <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input type="number" name="txt10thPercentage" oncopy="return false" onpaste="return false" oncut="return false"  min="0" max="100" step="1" class="form-control" placeholder="Your School Pecentage"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt10thPercentage" generated="true"></label>
            </div>
          </div>


             <script type="text/javascript">
            
            function show1()
            {
              var sel=$('#choice').val();

              if(sel == '12')
              {
                $('#Diploma').hide();
                $('#12th').show();
              }
              else if(sel == 'Diploma')
              {
               $('#12th').hide(); 
              $('#Diploma').show();


              }
              else
              {
                  $('#12th').hide(); 
                  $('#Diploma').hide();
              }
            }


          </script>

            <div class="input-row">
            <label class="control-label" for="ddl12thdipYear"> 12th / Diploma  <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="choice" id="choice" class="form-control" onchange="show1()" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select -</option>
                  <option value="12">12th</option>
                  <option value="Diploma">Diploma</option>
                           
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddl12thYear" generated="true"></label>
            </div>
          </div>


          <div  id="12th" style="display: none;">
            <div class="input-row" >
            <label class="control-label" for="ddl12thYear"> 12th passing year <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddl12thYear" id="ddl12thYear" class="form-control" >
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select Year -</option>
                 <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
                           
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddl12thYear" generated="true"></label>
            </div>
          </div>



            <div class="input-row">
            <label class="control-label" for="txt12thSchool">12th School Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txt12thSchool" id="txt12thSchool" value="" maxlength="50" class="form-control" placeholder="12th School Name"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt12thSchool" generated="true"></label>
            </div>
          </div>

            <div class="input-row">
            <label class="control-label" for="txt12thBoard">HSC Board Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txt12thBoard" id="txt12thBoard" value="" maxlength="50" class="form-control" placeholder="12th Board Name"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt12thBoard" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txt12thPercentage">HSC Pecentage <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input type="number" name="txt12thPercentage" min="0" max="100" step="1" class="form-control" placeholder="Your 12th Pecentage"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txt12thPercentage" generated="true"></label>
            </div>
          </div>
        </div>





         <div id="Diploma" style="display: none;">
            <div class="input-row" >
            <label class="control-label" for="ddl12thYear"> Diploma passing year <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="Diploma" id="Diploma" class="form-control" >
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select Year -</option>
                 <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
                           
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddl12thYear" generated="true"></label>
            </div>
          </div>



            <div class="input-row">
            <label class="control-label" for="txt12thSchool">Diploma college Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtdipSchool" id="txtdipSchool" value="" maxlength="50" class="form-control" placeholder="Diploma college Name"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtdipSchool" generated="true"></label>
            </div>
          </div>

            <div class="input-row">
            <label class="control-label" for="txt12thBoard">Diploma Board Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtdipBoard" id="txtdipBoard" value="" maxlength="50" class="form-control" placeholder="Diploma Board Name"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtdipBoard" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txt12thPercentage">Diploma Pecentage <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input type="number" name="txtdipPercentage" id="txtdipPercentage" min="0" max="100" step="1" class="form-control" placeholder="Diploma Pecentage"   >
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtdipPercentage" generated="true"></label>
            </div>
          </div>
        </div>


            <div class="input-row">
            <label class="control-label" for="bmtech"> B.Tech/M.Tech  <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="bmtech" id="bmtech" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected" >- Please Select -</option>
                  <option value="B.Tech">B.Tech</option>
                  <option value="M.Tech">M.Tech</option>
                           
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddl12thYear" generated="true"></label>
            </div>
          </div>



            <div class="input-row">
            <label class="control-label" for="ddlGradYear"> Graduation/Post Graduation passing year <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="ddlGradYear" id="ddlGradYear" class="form-control" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select Year -</option>
                 <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                             
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="ddlGradYear" generated="true"></label>
            </div>
          </div>

           <div class="input-row">
            <label class="control-label" for="txtGradCollege">College Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtGradCollege" id="txtGradCollege" value="" maxlength="50" class="form-control" placeholder="College Name"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtGradCollege" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txtGradUniversity">University Name <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtGradUniversity" id="txtGradUniversity" value="" maxlength="50" class="form-control" placeholder="University Name"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtGradUniversity" generated="true"></label>
            </div>
          </div>


            <div class="input-row">
            <label class="control-label" for="txtGradPercentage">Degree Pecentage <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input type="number" name="txtGradPercentage" min="0" max="100" step="1" class="form-control" placeholder="Degree Pecentage"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtGradPercentage" generated="true"></label>
            </div>
          </div>


          <div class="input-row">
            <label class="control-label" for="cvfile">Attach CV File <span style="color:red;">*</span></label>
            <div class="input-group">
              <label class="input-group-btn"> <span class="btn btn-primary"> Browse
              <input type="file" id="cvfile" name="cvfile" style="display: none;" required="">
              </span> </label>
              <input type="text" class="form-control file" readonly>
            </div>
            <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="field_10" generated="true"></label>
          </div>
        
        </div>
      </div>
      <!-- Column Full Start -->
      <div class="section group">
        <div class="col span_1_of_1">
          <div class="sub-header" style="margin-bottom:-15px;">Technical Details</div>
        </div>
        <!-- Column Left -->
        <div class="section group">
          <div class="col span_1_of_2">
            <div class="input-row">
              <div>&nbsp;</div>



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
        <div class=" col-md-4 ">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Technical Skills</div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      C/C++
                        <div class="material-switch pull-right">
                            <input id="chkC" name="Tskills[]" value="C/C++" type="checkbox" onclick="EnableDisableTextBox1(this)" />
                            <label for="chkC" class="label-default"></label>
                            <input type="number" min="1" max="10" id="text1"   disabled="disabled" name="skillrate[]" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                    <script type="text/javascript">
                        function EnableDisableTextBox1(chkC) {
                            var txt1 = document.getElementById("text1");
                           txt1.disabled = chkC.checked ? false : true;
                            if (!txt1.disabled) {
                              txt1.focus();
                            }
                        }
                    </script>
                       

                    <li class="list-group-item">
                        C#
                        <div class="material-switch pull-right">
                            <input id="chkcSharp" name="Tskills[]" value="C#" type="checkbox" onclick="EnableDisableTextBox2(this)"/>
                            <label for="chkcSharp" class="label-primary"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text2" disabled="disabled"  class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>

                     <script type="text/javascript">
                        function EnableDisableTextBox2(chkcSharp) {
                            var txt2 = document.getElementById("text2");
                           txt2.disabled = chkcSharp.checked ? false : true;
                            if (!txt2.disabled) {
                              txt2.focus();
                            }
                        }
                    </script>

                    <li class="list-group-item">
                        PHP
                        <div class="material-switch pull-right">
                            <input id="chkPHP" name="Tskills[]" value="PHP" type="checkbox" onclick="EnableDisableTextBox3(this)"/>
                            <label for="chkPHP" class="label-success"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text3" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                    <script type="text/javascript">
                        function EnableDisableTextBox3(chkPHP) {
                            var txt3 = document.getElementById("text3");
                           txt3.disabled = chkPHP.checked ? false : true;
                            if (!txt3.disabled) {
                              txt3.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        HTML
                        <div class="material-switch pull-right">
                            <input id="chkHtml" name="Tskills[]" value="HTML" type="checkbox" onclick="EnableDisableTextBox4(this)"/>
                            <label for="chkHtml" class="label-info"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text4" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>

                     <script type="text/javascript">
                        function EnableDisableTextBox4(chkHtml) {
                            var txt4 = document.getElementById("text4");
                           txt4.disabled = chkHtml.checked ? false : true;
                            if (!txt4.disabled) {
                              txt4.focus();
                            }
                        }
                    </script>

                    <li class="list-group-item">
                        JavaScript
                        <div class="material-switch pull-right">
                            <input id="chkJavascript" name="Tskills[]" value="Javascript" type="checkbox" onclick="EnableDisableTextBox5(this)"/>
                            <label for="chkJavascript" class="label-warning"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text5" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox5(chkJavascript) {
                            var txt5 = document.getElementById("text5");
                           txt5.disabled = chkJavascript.checked ? false : true;
                            if (!txt5.disabled) {
                              txt5.focus();
                            }
                        }
                    </script>

                    <li class="list-group-item">
                        VB.Net
                        <div class="material-switch pull-right">
                            <input id="chkvb" name="Tskills[]" value="VB.Net" type="checkbox" onclick="EnableDisableTextBox6(this)"/>
                            <label for="chkvb" class="label-danger"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text6" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox6(chkvb) {
                            var txt6 = document.getElementById("text6");
                           txt6.disabled = chkvb.checked ? false : true;
                            if (!txt6.disabled) {
                              txt6.focus();
                            }
                        }
                    </script>


                    <li class="list-group-item">
                      Asp.Net
                        <div class="material-switch pull-right">
                            <input id="chkAsp" name="Tskills[]" value="Asp.Net" type="checkbox" onclick="EnableDisableTextBox7(this)"/>
                        <label for="chkAsp" class="label-default"></label>
                        <input type="number" min="1" max="10"  name="skillrate[]" id="text7" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox7(chkAsp) {
                            var txt7 = document.getElementById("text7");
                           txt7.disabled = chkAsp.checked ? false : true;
                            if (!txt7.disabled) {
                              txt7.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        Core Java
                        <div class="material-switch pull-right">
                            <input id="chkCoreJava" name="Tskills[]" value="Core Java" type="checkbox" onclick="EnableDisableTextBox81(this)"/>
                            <label for="chkCoreJava" class="label-primary"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text8" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox81(chkCoreJava) {
                            var txt7 = document.getElementById("text8");
                           txt7.disabled = chkCoreJava.checked ? false : true;
                            if (!txt7.disabled) {
                              txt7.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        MySql
                        <div class="material-switch pull-right">
                            <input id="chkMySql" name="Tskills[]" value="MySql" type="checkbox" onclick="EnableDisableTextBox8(this)"/>
                            <label for="chkMySql" class="label-success"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text9" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox8(chkMySql) {
                            var txt9 = document.getElementById("text9");
                           txt9.disabled = chkMySql.checked ? false : true;
                            if (!txt9.disabled) {
                              txt9.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        Orcale\PL-SQL
                            <div class="material-switch pull-right">
                            <input id="chkOracle" name="Tskills[]" value="Orcale" type="checkbox" onclick="EnableDisableTextBox9(this)"/>
                            <label for="chkOracle" class="label-info"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text10" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox9(chkOracle) {
                            var txt10 = document.getElementById("text10");
                           txt10.disabled = chkOracle.checked ? false : true;
                            if (!txt10.disabled) {
                              txt10.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        SQL Server
                        <div class="material-switch pull-right">
                            <input id="chkSQL" name="Tskills[]" value="Sql Server" type="checkbox" onclick="EnableDisableTextBox10(this)"/>
                            <label for="chkSQL" class="label-warning"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text11" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox10(chkSQL) {
                            var txt11 = document.getElementById("text11");
                           txt11.disabled = chkC.checked ? false : true;
                            if (!txt11.disabled) {
                              txt11.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        Android
                        <div class="material-switch pull-right">
                            <input id="chkAndroid" name="Tskills[]" value="Android" type="checkbox" onclick="EnableDisableTextBox11(this)"/>
                            <label for="chkAndroid" class="label-danger"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text12" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox11(chkAndroid) {
                            var txt12 = document.getElementById("text12");
                           txt12.disabled = chkAndroid.checked ? false : true;
                            if (!txt12.disabled) {
                              txt12.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        Testing
                        <div class="material-switch pull-right">
                            <input id="chkTesting" name="Tskills[]" value="Testing" type="checkbox" onclick="EnableDisableTextBox12(this)"/>
                            <label for="chkTesting" class="label-warning"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text13" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox12(chkTesting) {
                            var txt12 = document.getElementById("text13");
                           txt12.disabled = chkC.checked ? false : true;
                            if (!txt12.disabled) {
                              txt12.focus();
                            }
                        }
                    </script>
                    <li class="list-group-item">
                        Other Technical skills
                        <div class="material-switch pull-right">
                            <input id="chkOthers" name="Tskills[]" value="Other technical skills" type="checkbox" onclick="EnableDisableTextBox13(this)"/>
                            <label for="chkOthers" class="label-danger"></label>
                            <input type="number" min="1" max="10"  name="skillrate[]" id="text14" disabled="disabled" class="ml-5 " style="width: 35%; height: 20%" placeholder=""> / 10
                        </div>
                    </li>
                     <script type="text/javascript">
                        function EnableDisableTextBox13(chkC) {
                            var txt13 = document.getElementById("text14");
                           txt13.disabled = chkOthers.checked ? false : true;
                            if (!txt13.disabled) {
                              txt13.focus();
                            }
                        }
                    </script>
                </ul>
            </div>  

            <div class="input-row">
            <label class="control-label" for="txtInterestArea">Area of Interest <span style="color:red;">*</span></label>
           
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                <input type="text" name="txtInterestArea" id="txtInterestArea" value="" maxlength="50" class="form-control" placeholder="Area of Interest"   required="">
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="txtInterestArea" generated="true"></label>
            </div>
          </div> 
        </div>
    





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
        <div class=" col-md-4 ">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Operating System</div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      Windows
                        <div class="material-switch pull-right">
                            <input id="chkWindows" name="os_info[]" value="Operating System" type="checkbox"/>
                            <label for="chkWindows" class="label-default"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Linux
                        <div class="material-switch pull-right">
                            <input id="chkLinux" name="os_info[]" value="Linux" type="checkbox"/>
                            <label for="chkLinux" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Other OS
                        <div class="material-switch pull-right">
                            <input id="chkOSOthers" name="os_info[]" value="Other OS" type="checkbox"/>
                            <label for="chkOSOthers" class="label-success"></label>
                        </div>
                    </li>
       
                   
                </ul>
            </div>   




              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Certifiaction</div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      C# certification
                        <div class="material-switch pull-right">
                            <input id="chkMicrosoft" name="certi[]" value="C#" type="checkbox"/>
                            <label for="chkMicrosoft" class="label-default"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Java Certification
                        <div class="material-switch pull-right">
                            <input id="chkSun" name="certi[]" value="Java" type="checkbox"/>
                            <label for="chkSun" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        PL/SQL Certification
                        <div class="material-switch pull-right">
                            <input id="chkOracleC" name="certi[]" value="MySql" type="checkbox"/>
                            <label for="chkOracleC" class="label-success"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        ASP.NET
                        <div class="material-switch pull-right">
                            <input id="chkISTQB" name="certi[]" value="Asp.Net" type="checkbox"/>
                            <label for="chkISTQB" class="label-success"></label>
                        </div>
                    </li>
                   <li class="list-group-item">
                        Android
                        <div class="material-switch pull-right">
                            <input id="chkCSTE" name="certi[]" value="Android" type="checkbox"/>
                            <label for="chkCSTE" class="label-success"></label>
                        </div>
                    </li>
                </ul>
            </div>



              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Training</div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                      C#
                        <div class="material-switch pull-right">
                            <input id="chkCSharpT" name="train[]" value="C#" type="checkbox"/>
                            <label for="chkCSharpT" class="label-default"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Java
                        <div class="material-switch pull-right">
                            <input id="chkJavaT" name="train[]" value="Core Java" type="checkbox"/>
                            <label for="chkJavaT" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                      ASP.Net
                        <div class="material-switch pull-right">
                            <input id="chkAspT" name="train[]" value="ASP.Net" type="checkbox"/>
                            <label for="chkAspT" class="label-success"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        PHP
                        <div class="material-switch pull-right">
                            <input id="chkPHPT" name="train[]" value="PHP" type="checkbox"/>
                            <label for="chkPHPT" class="label-success"></label>
                        </div>
                    </li>
                   <li class="list-group-item">
                        PL/SQL
                        <div class="material-switch pull-right">
                            <input id="chkPlSqlT" name="train[]" value="PL-SQL" type="checkbox"/>
                            <label for="chkPlSqlT" class="label-success"></label>
                        </div>
                    </li>
                      <li class="list-group-item">
                        Manual Testing
                        <div class="material-switch pull-right">
                            <input id="chkManualT" name="train[]" value="Manual Testing" type="checkbox"/>
                            <label for="chkManualT" class="label-success"></label>
                        </div>
                    </li>
                   <li class="list-group-item">
                        Automation Testing
                        <div class="material-switch pull-right">
                            <input id="chkAutoT" name="train[]" value="Automation" type="checkbox"/>
                            <label for="chkAutoT" class="label-success"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-primary form-control text-white">Add More</a> 
                    </li>
                </ul>
            </div>
 <div>&nbsp;</div>
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>
        </div>
    </div>
</div>




             
            </div>
          </div>
          <!-- Column Right -->

          <div class="col span_1_of_2">
            <div>&nbsp;</div>
           
          </div>
        </div>
      </div>
      <!-- Column End -->
      <!-- Full Column -->
      <div class="section group" >
        <div class="col span_1_of_1" style="margin-top:-15px; >
          
          <div>&nbsp;</div>
          <div style="display:block; min-height:150px; margin-top:-5px;">
            <div class="sub-header">Projects</div>
                      <div>&nbsp;</div>

              <div class="input-row" style="margin-bottom:-40px;">
            
                <div class="container"  id="container">
                  <div class="row">
                    <div class="col-md-8">
                      <div>&nbsp;</div>
                      <div class="card">
                        <div class="card-header">
                          <h3 align="center">Project</h3>
                        </div>
                        <div class="card-body">
                           <div class="input-row">
                              <label class="control-label" for="pname">Project name<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                  <input type="text" name="pname[]" id="pname" value="" maxlength="50" class="form-control" placeholder="Project name"   required="">
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pname" generated="true"></label>
                              </div>
                            </div>


                            <div class="input-row">
                              <label class="control-label" for="pduration">Project duration<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                                  <input type="text" name="pduration[]" id="pduration" value="" maxlength="50" class="form-control" placeholder="Project duration"   required="">
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pduration" generated="true"></label>
                              </div>
                            </div>

                            <div class="input-row">
                              <label class="control-label" for="prole">Role<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                  <input type="text" name="prole[]" id="prole" value="" maxlength="50" class="form-control" placeholder="Role"   required="">
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="prole" generated="true"></label>
                              </div>
                            </div>

                            <div class="input-row">
                              <label class="control-label" for="pdescription">Project description<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                                  <input type="text" name="pdescription[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"   required="">
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pdescription" generated="true"></label>
                              </div>
                            </div>

                        </div>

                        <div class="card-footer">
                      <a  id="add" name="add"  value="0" class="form-control btn btn-primary" >Add more</a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               



                <script>  


                  $(document).ready(function(e){




              var html='              <div id="remove">   <div>&nbsp;</div>           <div class="row"><div class="col-md-8"> <div class="card"><div class="card-header">  <h3 align="center">Project</h3></div><div class="card-body"> <div class="input-row">  <label class="control-label" for="pname">Project name<span style="color:red;">*</span></label>  <div class="inputGroupContainer">  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>       <input type="text" name="pname[]" id="pname" value="" maxlength="50" class="form-control" placeholder="Project name"  >    </div>                               <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pname" generated="true"></label>                 </div>                            </div>                      <div class="input-row">                 <label class="control-label" for="pduration">Project duration<span style="color:red;">*</span></label>     <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                  <input type="text" name="pduration[]" id="pduration" value="" maxlength="50" class="form-control" placeholder="Project duration"  >                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pduration" generated="true"></label>     </div>    </div><div class="input-row">                              <label class="control-label" for="prole">Role<span style="color:red;">*</span></label><div class="inputGroupContainer">                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>                                  <input type="text" name="prole[]" id="prole" value="" maxlength="50" class="form-control" placeholder="Role"  >          </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="prole" generated="true"></label>                              </div>                            </div>                     <div class="input-row">                              <label class="control-label" for="pdescription">Project description<span style="color:red;">*</span></label>                              <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>                                  <input type="text" name="pdescription[]" id="pdescription" value="" maxlength="50" class="form-control" placeholder="Project description"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="pdescription" generated="true"></label>                              </div>                            </div>                        </div>                        <div class="card-footer">                        <a  id="btnremove" name="remove"  class="form-control btn btn-primary" >Remove</a>                        </div>                      </div>           </div> </div>     </div>';

                    $("#add").click(function(e){
                      $("#container").append(html)
                      });


                    $('#container').on('click','#btnremove',function(e){
                      $('#remove').remove();
                    });

                  });
                             

                </script>

                          
       
          </div>
          </div>
        
        </div>

                      <div>&nbsp;</div>
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>

        <div class="section group" >
        <div class="col span_1_of_1" style="margin-top:-15px;>
          <div>&nbsp;</div>
          <div style="display:block; min-height:150px; margin-top:-5px;">
            <div class="sub-header">Work Experience</div>
                      <div>&nbsp;</div>

              <div class="input-row" style="margin-bottom:-40px;">




                   <div class="input-row ml-4">
            <label class="control-label" for="grExperiance"> Fresher / Experienced <span style="color:red;">*</span></label>
            <div class="inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="grExperience" id="grExperiance" class="form-control" onchange="show()" required="">
                  <!-- Add take away change options - change text twice per option to show in email results -->
                  <option value="" selected="selected">- Please Select -</option>
                   <option value="Fresher">Fresher</option>
                  <option value="Experience">Experienced</option>
 
                </select>
              </div>
              <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="grExperiance" generated="true"></label>
            </div>
          </div>     


          <script type="text/javascript">
            
            function show()
            {
              var sel=$('#grExperiance').val();

              if(sel == 'Experience')
              {
                $('#container1').show();
              }
              else
              {
              $('#container1').hide();
              }
            }


          </script>


                <div class="container"  id="container1" style="display: none;">
                  <div class="row">
                                          <div>&nbsp;</div>

                    <div class="col-md-8">
                                            <div>&nbsp;</div>

                      <div class="card">
                        <div class="card-header">
                          <h3 align="center">Work Experience</h3>
                        </div>
                        <div class="card-body">
                      

                            <div class="input-row">
                              <label class="control-label" for="cname">Company name<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input type="text" name="cname[]" id="cname" value="" maxlength="50" class="form-control" placeholder="company name"  >
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="cname" generated="true"></label>
                              </div>
                            </div>

                            <div class="input-row">
                              <label class="control-label" for="syear">Start Year<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                  <input type="date" name="syear[]" id="syear" value="" maxlength="50" class="form-control" placeholder="start year"  >
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="syear" generated="true"></label>
                              </div>
                            </div>

                            <div class="input-row">
                              <label class="control-label" for="eyear">End Year<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                                  <input type="date" name="eyear[]" id="eyear" value="" maxlength="50" class="form-control" placeholder="end date"  >
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="eyear" generated="true"></label>
                              </div>
                            </div>

                               <div class="input-row">
                              <label class="control-label" for="jtitle">Job Title<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                                  <input type="text" name="jtitle[]" id="jtitle" value="" maxlength="50" class="form-control" placeholder="Job title"  >
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="jtitle" generated="true"></label>
                              </div>
                            </div>

                                 <div class="input-row">
                              <label class="control-label" for="des">Job Description<span style="color:red;">*</span></label>
                             
                              <div class="inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                                  <input type="text" name="des[]" id="des" value="" maxlength="50" class="form-control" placeholder="Job description"  >
                                </div>
                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="des" generated="true"></label>
                              </div>
                            </div>


                        </div>

                       <div class="card-footer">
                        <a id="add1"  class="form-control btn btn-primary" >Add more</a>
                        </div>
                          <div>&nbsp;</div>
                                            
                      </div>
                    </div>
                  </div>
                </div>
               


                <script>  
                  $(document).ready(function(e){
          
              var html1='           <div id="remove1">                <div>&nbsp;</div>                    <div class="col-md-8">                                            <div>&nbsp;</div>                      <div class="card">                       <div class="card-header">                         <h3 align="center">Work Experience</h3>                        </div>                        <div class="card-body">                                                  <div class="input-row                              <label class="control-label" for="cname">Company name<span style="color:red;">*</span></label>                                                           <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                  <input type="text" name="cname[]" id="cname" value="" maxlength="50" class="form-control" placeholder="Project duration"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="cname" generated="true"></label>                              </div>                            </div>                            <div class="input-row">                              <label class="control-label" for="syear">Start Year<span style="color:red;">*</span></label>                                                           <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>                                  <input type="date" name="syear[]" id="syear" value="" maxlength="50" class="form-control" placeholder="Role"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="syear" generated="true"></label>                              </div>                            </div>                            <div class="input-row">                              <label class="control-label" for="eyear">End Year<span style="color:red;">*</span></label>                                                           <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>                                  <input type="date" name="eyear[]" id="eyear" value="" maxlength="50" class="form-control" placeholder="Project description"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="eyear" generated="true"></label>                              </div>                            </div>                               <div class="input-row">                              <label class="control-label" for="jtitle">Job Title<span style="color:red;">*</span></label>                                                           <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>                                  <input type="text" name="jtitle[]" id="jtitle" value="" maxlength="50" class="form-control" placeholder="Project description"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="jtitle" generated="true"></label>                              </div>                            </div>                                 <div class="input-row">                              <label class="control-label" for="des">Description<span style="color:red;">*</span></label>                                                           <div class="inputGroupContainer">                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>                                  <input type="text" name="des[]" id="des" value="" maxlength="50" class="form-control" placeholder="Project description"  >                                </div>                                <label style="color:red; font-weight:normal; font-size:12px; margin-top:5px;" class="error" for="des" generated="true"></label>                              </div>                            </div>                        </div>                       <div class="card-footer">                        <a id="btnremove1"  class="form-control btn btn-primary" >Remove</a>                              <div>&nbsp;</div>                    </div>                                   </div>               </div>     </div>    ';                         



                 $("#add1").click(function(e){       
                                  $("#container1").append(html1)         

                                  });                  
                              $('#container1').on('click','#btnremove1',function(e){              
                                     $('#remove1').remove();                  
                                       });                
                                        });
              
                           </script>

                
            
           
          </div>
          </div>
        
        </div>



        <div class="section group" >
        <div class="col span_1_of_1" style="margin-top:-15px;>
          
          <div>&nbsp;</div>
          <div style="display:block; min-height:150px; margin-top:-5px;">
            <div>&nbsp;</div>
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>
            <div class="sub-header">Submit</div>
                      <div>&nbsp;</div>

              <div class="input-row" style="margin-bottom:-40px;">
            
             

                
            
            <div class="inputGroupContainer">
              <!-- For blue button change btn-default to btn-primary - You can remove button width:100%; to standard size -->
              <input type="submit" name="submit" value="submit" id="submit" class="btn btn-success btn-lg">
          <div id="divMsg" style="display:none;"><img src="assets/img/loading-bar.gif" alt="Please wait.." width="160" /></div>
            </div>
          </div>
          </div>
        
        </div>


      </div>
    </form>
  </div>
</div>
</body>
</html>


  <?php

if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "hrmdss");

  if (!$conn) {
    Die("Connection Failed:".mysqli_connect_error());
  }
  $firstname     = $_POST['txtFirstName'];
  $lastname      = $_POST['txtLastName'];
  $emailid       = $_POST['txtEmailAdd'];
  $birthdate     = $_POST['txtBirthDate'];
  $gender        = $_POST['gpGender'];
  $maritalstatus = $_POST['gpMaritalStatus'];
  $mobileno      = $_POST['txtMobileNo'];
  $altmobileno   = $_POST['txtAltMobNo'];
  $address       = $_POST['txtPuneAddress'];
  $state         = $_POST['ddlState'];

  $language=$_POST['chklang'];
  $lang=implode(",",$language);

  $qualification = $_POST['ddlEduQualification'];
  $specialisation= $_POST['ddlSpcl'];

  $tenthyear      = $_POST['ddl10thYear'];
  $tenthschool    = $_POST['txt10thSchool'];
  $tenthboard     = $_POST['txt10thBoard'];
  $tenthpercentage= $_POST['txt10thPercentage'];
  
  $tew_dip        = $_POST['choice'];
  $tewthyear      = $_POST['ddl12thYear'];
  $tewthschool    = $_POST['txt12thSchool'];
  $tewthboard     = $_POST['txt12thBoard'];
  $tewthpercentage= $_POST['txt12thPercentage'];

  $bmtech      = $_POST['bmtech'];
  $gradyear      = $_POST['ddlGradYear'];
  $gradcollege   = $_POST['txtGradCollege'];
  $graduniversity= $_POST['txtGradUniversity'];
  $gradpercentage= $_POST['txtGradPercentage'];
  
  $tskill=$_POST['Tskills'];
  $tech_skill=implode(",",$tskill);


  $srate=$_POST['skillrate'];
  $rate=implode(",",$srate);


  $osinfo1=$_POST['os_info'];
  $os=implode(",", $osinfo1);  

  $cer=$_POST['certi'];
  $certificate=implode(",", $cer);

  $train=$_POST['train'];
  $training=implode(",", $train);

  $prnm=$_POST['pname'];
  $project_name=implode(",", $prnm);

  $prdur=$_POST['pduration'];
  $project_duration=implode(",", $prdur);

  $prrole=$_POST['prole'];
  $project_role=implode(",", $prrole);

  $prdesc=$_POST['pdescription'];
  $project_description=implode(",", $prdesc);

  $fresh_exp  = $_POST['grExperience'];

  $cname=$_POST['cname'];
  $company_name=implode(",", $cname);

  $syear=$_POST['syear'];
  $start_date=implode(",", $syear);

  $eyear=$_POST['eyear'];
  $end_date=implode(",", $eyear);

  $jtitle=$_POST['jtitle'];
  $job_title=implode(",", $jtitle);
  
  $des=$_POST['des'];
  $job_description=implode(",", $des);
  $crer=$_POST['career'];




  $interestedarea=$_POST['txtInterestArea'];
  



      $upload_file=$_FILES["cvfile"][ "name" ];
        $folder="cv/";
        move_uploaded_file($_FILES["cvfile"]["tmp_name"], "$folder".$_FILES["cvfile"]["name"]);





  $sql="UPDATE jobapplication set `dob`='$birthdate', `marital_status`='$maritalstatus',`gender`='$gender', `contact_no`= '$mobileno', `alt_contact_no`='$altmobileno', `present_address`='$address', `current_state`='$state', `qualification`='$qualification', `special_skill`='$specialisation', `ten_passing_year`='$tenthyear', `ten_school_name`='$tenthschool', `ten_board_name`= '$tenthboard', `ten_percentage`='$tenthpercentage', `tew_dip`='$tew_dip', `tew_dip_passing_year`='$tewthyear', `tew_dip_college_name`='$tewthschool', `tew_dip_board_name`='$tewthboard', `tewdip_percentage`='$tewthpercentage', `btech_mtech`='$bmtech', `btech_mtech_passing_year`='$gradyear', `btech_mtech_college`= '$gradcollege', `btech_mtech_university`='$graduniversity', `btech_mtech_percentage`='$gradpercentage', `lang`='$lang', `resume`='$upload_file', `tech_skill`='$tech_skill',`rate`= '$rate', `os`='$os', `certificate`='$certificate', `training`='$training', `area_interest`='$interestedarea', `project_name`='$project_name', `project_duration`='$project_duration', `project_role`= '$project_role', `project_description`='$project_description', `fresh_expn`='$fresh_exp', `company_name`='$company_name', `start_date`= '$start_date', `end_date`='$end_date', `job_tiitle`='$job_title', `job_description`='$job_description',careerobj='$crer' where email_id='$user1'";



  $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  mysqli_error($conn);  

          if ($result > 0){
            ?><script>alert("Details are updated");
            window.location("../applicanthome.php");
          </script>

        <?php
          }
          else
          {
            ?><script>alert("Something went wrong");
          </script>

        <?php
          }
      }
      ?>

       
        
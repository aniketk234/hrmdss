<?php

session_start();
/* ---- Your other validation code -- */
if (isset($_POST['submit'])){
$_SESSION['field_0'] = $_POST['field_0'];
$_SESSION['field_12'] = $_POST['field_12'];
 exit();
}

?>

<style type="text/css">
/* To remove background green gradient form here */
html{
    height:100%;
    background: linear-gradient(0deg, white 10%, #e8f4e4) no-repeat;
}
/* Buttons */
.btn {
       display: block;
	   background: url(img/btn.png) no-repeat;
       height: 34px;
       width: 117px;
	   display:inline;
	   color:#000;
	   outline:0 !important;
}
.btn:hover {
       background-position: 0 -34px;
	   outline:0 !important;
}
.btn-container {
 margin-top:10px;
 margin-bottom:10px;
}
/* To remove background green gradient to here */
.sent {
 margin:auto 0;
 background-color:#dff0d8;
 border: #b6e1a4 1px solid;
 padding:15px;
 color: #008000;
 max-width:98%;
 }
.thankyou {
 margin-top:50px;
 text-align:center;
 font-size:40px;
 color:#008000;
 color: white;
 text-shadow: 
  0 1px 0 #ccc,
  0 2px 0 #c9c9c9,
  0 3px 0 #bbb,
  0 4px 0 #b9b9b9,
  0 5px 0 #aaa,
  0 6px 1px rgba(0,0,0,.1),
  0 0 5px rgba(0,0,0,.1),
  0 1px 3px rgba(0,0,0,.3),
  0 3px 5px rgba(0,0,0,.2),
  0 5px 10px rgba(0,0,0,.25),
  0 10px 10px rgba(0,0,0,.2),
  0 20px 20px rgba(0,0,0,.15);
  -webkit-animation: fadein 4s; /* Safari, Chrome and Opera > 12.1 */
  -moz-animation: fadein 4s; /* Firefox < 16 */
  -ms-animation: fadein 4s; /* Internet Explorer */
  -o-animation: fadein 4s; /* Opera < 12.1 */
     animation: fadein 4s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}  
}
}
</style>

<meta name="viewport" content="width=device-width,initial-scale=1.0" />

<div class="sent">

<?php
   echo "Dear ", $_SESSION['field_0'];
   echo " - Email: ", $_SESSION['field_12'];
?>


<div>Your form has been successfully submitted.<br />
A copy has been sent to your email.<br />
Check you junk mail folder if it does not arrive shortly. </div>
</div>

<div class="btn-container">
<input type="button" class="btn" style="border:0;" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back" onClick="javascript:history.back()" />
<input type="button" class="btn" style="border:0;" value="&nbsp;&nbsp;&nbsp;&nbsp;Home" onClick="location.href='/';" />
</div>

<div class="thankyou">Thank You!</div>

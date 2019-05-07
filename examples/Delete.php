<?php 

$id=$_GET['id'];
echo $id;


$con=mysqli_connect("localhost","root","","hrmdss");
$sql="Delete from job_posts where id='$id'";

$result=mysqli_query($con,$sql);
if($result>0){
	?> <div class="alert alert-success">
        <div class="container">
          <div class="alert-icon">
            <i class="material-icons">check</i>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
          </button>
          <b>Success:</b> Yuhuuu! You&apos;ve deleted the job post
        </div>
      </div>

      <?php
      header("location:discover.php");
}else{?>
	 <div class="alert alert-warning">
        <div class="container">
          <div class="alert-icon">
            <i class="material-icons">warning</i>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
          </button>
          <b>Warning Alert:</b> Hey, it looks like operation failed. Please try it again!
        </div>
      </div>
<?php
 #	header("location:discover.php");
}

 ?>
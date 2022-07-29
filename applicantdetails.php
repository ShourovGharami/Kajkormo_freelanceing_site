<?php
include("config.php");
        $pstid=$_GET['test'];
        $applicant=$_GET['appl'];
session_start();
if(isset($_SESSION['username'])){
   $t=$_SESSION['username'];
$sql8="SELECT * FROM `job_application` WHERE owner='$t'";
$request=mysqli_query($connection,$sql8);
$number=mysqli_num_rows($request);

$sql20="SELECT * FROM `posts` WHERE job_stat='assigned' && submission!='' && posted_by='$t'  && accept=''";
$request2=mysqli_query($connection,$sql20);
$submission=mysqli_num_rows($request2);

}
else{
  header('location:index.php');
}

$temp=$_SESSION['username'];
$sql9="SELECT * FROM `job_application` WHERE owner='$temp'";
$run=mysqli_query($connection,$sql9);

    
    $sql22="SELECT * FROM `freelancer` WHERE username='$applicant'";
    $temp3=mysqli_query($connection,$sql22);
    $info=mysqli_fetch_array($temp3);

?>
<html>
<head>
  <title>কাজকর্ম</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">

</head>
<body bgcolor="#E6E6FA">

	
 
  <div >
    <span></span>
    <span ></span>

  </div>
  <!-------------------------header design--------------------->
  <div class="w3-row w3-dark-gray">
    <div class="w3-col s1">
      <img src="images/logo.png" style="height: 100px;width: 100px;padding:10px">
    </div>
    <div class="w3-col s3">
      <span class="jobb">কাজকর্ম</span>
    </div>
  </div>



  
  <div class="w3-bar w3-black w3-border w3-padding">
    <a href="clienthome.php" class="w3-bar-item w3-button w3-mobile"><b>Home</b></a>
    <a href="jobapplied.php" class="w3-bar-item w3-button w3-mobile">Job Application<span class="w3-badge w3-blue"><?php echo"$number";?></span></a>
    <a href="finaljob.php" class="w3-bar-item w3-button w3-mobile">Submission<span class="w3-badge w3-blue"><?php echo"$submission";?></span></a>
    
    <form class="w3-bar-item w3-mobile w3-button" style="display: inline;padding: 0;" action="userlist.php" method="POST">
      <input type="text" name="take" class="w3-bar-item w3-input w3-light-grey w3-mobile" placeholder="Search.." style="display: inline;">
        <input type="submit" name="submit" value="Go" style="display: inline;" class="w3-button w3-green">
    </form>

     <a href="userlist.php" class="w3-bar-item w3-button w3-mobile">View users</a>
     <a href="clientpost.php" class="w3-bar-item w3-button w3-mobile">Your posts</a>
     <a href="clienthome.php?status=logout" class="w3-bar-item w3-button w3-mobile">Logout</a>

  </div>
  <!---------------------body starts from here------------------------------------->
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2><?php echo$_SESSION['username']; ?> here is your applicant details</h2>
  </div>
   
   
  <div class="w3-cointer w3-green" style="padding: 1%">
  <h2>Details of <?php echo $info['name']; ?></h2>
 </div>
 <div class="w3-container">
   Name:<?php echo $info['name']; ?><br>
   Date of birth:<?php echo $info['dob']; ?><br>
   Gender:<?php echo $info['gender']; ?><br>
   Email:<?php echo $info['email']; ?><br>
   Username:<?php echo $info['username']; ?><br>
   Phone:<?php echo $info['phone']; ?><br>
   Hourley Price:<?php echo $info['hprice']; ?>$<br>
   Address:<?php echo $info['address']; ?><br>
   Skills:<?php echo $info['skills'];?><br>
   Job completed:<?php echo $info['jobs_completed']; ?><br>
   Rating:<?php echo $info['rating']; ?><br>
  </div>

  <a href="applied.php?test=<?php echo $pstid; ?>&appl=<?php echo $info['username']; ?>" class="w3-button w3-green">Accept for Jobid:<?php echo $pstid; ?></a>
 
 <!-------------------------footer design--------------------->
      <?php
  include('footer.php');
  ?>
  

  <!--------------------------------modal for login---------------------------------------->

   

<!---------------------------------Another model for signup-------------------------------------->

    

  <script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
  
</body>
</html>
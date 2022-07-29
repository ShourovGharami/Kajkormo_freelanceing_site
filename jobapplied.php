<?php
include("config.php");
session_start();
if(isset($_SESSION['username'])){
   $t=$_SESSION['username'];
$sql8="SELECT * FROM `job_application` WHERE owner='$t'";
$request=mysqli_query($connection,$sql8);
$number=mysqli_num_rows($request);

$sql20="SELECT * FROM `posts` WHERE job_stat='assigned' && submission!='' && posted_by='$t' && accept=''";
$request2=mysqli_query($connection,$sql20);
$submission=mysqli_num_rows($request2);

}
else{
  header('location:index.php');
}
$temp=$_SESSION['username'];
$sql9="SELECT * FROM `job_application` WHERE owner='$temp'";
$run=mysqli_query($connection,$sql9);

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
  <div class="grid-container">
    <div class="job">কাজকর্ম</div>
  </div>



  
  <div class="w3-bar w3-black  w3-padding">
    <a href="clienthome.php" class="w3-bar-item w3-button w3-mobile"><b>Home</b></a>
    <a href="jobapplied.php" class="w3-bar-item w3-button w3-mobile">Job Application<span class="w3-badge w3-blue"><?php echo"$number";?></span></a>
    <a href="finaljob.php" class="w3-bar-item w3-button w3-mobile">Submission<span class="w3-badge w3-blue"><?php echo"$submission";?></span></a>
    
    <form class="w3-bar-item w3-mobile w3-button" style="display: inline;padding: 0;" action="userlist.php" method="POST">
      <input type="text" name="take" class="w3-bar-item w3-input w3-light-grey w3-mobile"  placeholder="Enter category to find expert" style="display: inline;">
        <input type="submit" name="submit" value="Go" style="display: inline;" class="w3-button w3-green">
    </form>

     <a href="userlist.php" class="w3-bar-item w3-button w3-mobile">View users</a>
     <a href="clientpost.php" class="w3-bar-item w3-button w3-mobile">Your posts</a>
     <a href="clienthome.php?status=logout" class="w3-bar-item w3-button w3-mobile">Logout</a>

  </div>
  <!---------------------body starts from here------------------------------------->
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2 style="text-align: center;"><?php echo$_SESSION['username']; ?> here is your applicant list</h2>
  </div>
   
   
   <div style="padding-left: 15%;padding-right: 5%;width: 60%;">
         <?php while($arra=mysqli_fetch_array($run)) {?>
          
              
               
               <div class="w3-card" style="padding: 3%;">
                <?php
                 $pid=$arra['postid'];
                 $appli=$arra['applicant'];
                 $sql10="SELECT * FROM `posts` WHERE postid='$pid'";
                 $sql11="SELECT * FROM `freelancer` WHERE username='$appli'";
                 $run3=mysqli_query($connection,$sql10);
                 $run4=mysqli_query($connection,$sql11);
                 $post=mysqli_fetch_array($run3);
                 $fee=mysqli_fetch_array($run4);
                ?>
               Post ID:<?php echo $arra['postid']; ?><br>
               Subject:<?php echo $post['subject']; ?><br>
               <b>Applicant info</b>
               Username:<?php echo $arra['applicant']; ?><br>
               Email:<?php echo $fee['email']; ?><br>
               Phone:<?php echo $fee['phone']; ?><br>
               Address:<?php echo $fee['address']; ?><br>
               <a href="applicantdetails.php?test=<?php echo $arra['postid']; ?>&appl=<?php echo $arra['applicant']; ?>" class="w3-button w3-red">Profile</a>
               
               <a href="applied.php?test=<?php echo $arra['postid']; ?>&appl=<?php echo $arra['applicant']; ?>" class="w3-button w3-red">Accept</a>
               </div>
               <br>
               <br>
               
          
           <?php } ?>
   </div> 
 
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
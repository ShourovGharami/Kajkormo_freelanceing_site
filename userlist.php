<?php
include("config.php");
session_start();
if(isset($_SESSION['username'])){
  $t=$_SESSION['username'];
$sql8="SELECT * FROM `job_application` WHERE owner='$t'";
$request=mysqli_query($connection,$sql8);
$number=mysqli_num_rows($request);

$sql19="SELECT * FROM `posts` WHERE job_stat='assigned' && submission!='' && posted_by='$t' && accept=''";
$request2=mysqli_query($connection,$sql19);
$submission=mysqli_num_rows($request2);
}
else{
  header('location:index.php');
}
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

	<?php
     
      
      if(isset($_POST['submit']))
      {  
        $string=$_POST['take'];
        $sql40="SELECT * FROM `freelancer` WHERE skills LIKE '%$string%'";
        $run40=mysqli_query($connection,$sql40);
        
      }
      else{  
        $sql40="SELECT * FROM `freelancer` WHERE status='approved'";
        $run40=mysqli_query($connection,$sql40);
      }

      
     
      
      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }
      


      


  ?>
 
  <div >
    <span></span>
    <span ></span>

  </div>
  <!-------------------------header design--------------------->
  <div class="grid-container">
    <div class="job">কাজকর্ম</div>
  </div>



  
  <div class="w3-bar w3-black w3-padding">
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

  <div class="w3-cell-row" style="padding: 2%;">
    <!---------------------------------------------Left most bar--------------------------------------------->
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge" style="width:25%;padding: 2%;">
    <p class="w3-card w3-border w3-round-xlarge" style="padding: 2%;"><b>List of your Client review.<br>Click to see details.</b></p>
    <?php while($show=mysqli_fetch_array($run40)) { 
      $uname=$show['username'];
      ?>

       <a style="width: 100%;" href="userlist.php?send=<?php echo $uname;?>" class="w3-button w3-hover-shadow w3-green w3-border w3-round-xlarge"><?php echo $uname;?></a><br>
     
    <?php }
      
     ?>
   </div>
   <br>
   <!---------------------------------------------Middle body bar--------------------------------------------->
   <?php 
    
   ?>
   
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge" style="width:65%;padding: 2%;">
     <?php

      if(isset($_GET['send']))
      {
        $uname=$_GET['send'];
      }

    if(empty($uname)){
      echo'<script type="text/javascript">
              alert("No Results");
              location="userlist.php";
               </script>';
    }
    else{
     $sql41="SELECT * FROM `freelancer` WHERE username='$uname'";
     $run41=mysqli_query($connection,$sql41);
     $result=mysqli_fetch_array($run41);
    }
      ?>
    <div class="w3-card w3-border w3-round-xlarge">

      <table class="w3-table w3-centered" style="padding: 2%;">
      <tr>
        <td>Name:</td>
        <td><?php echo $result['name'];?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo $result['email'];?></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><?php echo $result['phone'];?></td>
      </tr>
      <tr>
        <td>Job completed:</td>
        <td><?php echo $result['jobs_completed'];?></td>
      </tr>
      <tr>
        <td>Rating:</td>
        <td><?php echo $result['rating'];?>*</td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><?php echo $result['address'];?></td>
      </tr>
      </table>
    </div>
     <br>
   
      
    <?php 
    

     ?>
   </div>
   <br>
   <!-------------------------Table right bar here--------------------->
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge w3-cell-middle" style="width:10%;">
     <p>Click to see details of freelancer.</p>
   </div>
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
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
<link rel="stylesheet" href="css/icon.css">

</head>
<body bgcolor="#E6E6FA">

  <?php
  
      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }

       
      if(isset($_GET['accept'])){
        $post=$_GET['accept'];
        $sql22="SELECT price FROM `posts` WHERE postid='$post'";
        $run22=mysqli_query($connection,$sql22);
        $requ=mysqli_fetch_array($run22);
        $priceset=$requ['price'];
        $fid=$_GET['sub'];
        
        
    
      }


     if(isset($_POST['submit']))
      {  
        echo"printing post id\n";
        echo $post;
        echo"\nPrinting fid\n";
        echo $fid;
        echo "\nprinting Client name\n";
        echo $t;
           $rate=$_POST['rate'];
           $money=$_POST['money'];
           $sql21="INSERT INTO `transaction_table` (`trnid`, `postid`, `client`, `freelancer`, `money`, `c_to_f`, `status`) VALUES (NULL, '$post', '$t', '$fid', '$money', '$rate', 'pending')";
           $run21=mysqli_query($connection,$sql21);

           $sql20="UPDATE `posts` SET `accept` = 'yes' WHERE `posts`.`postid` = $post";
           $run20=mysqli_query($connection,$sql20);
           header("location:clienthome.php");

      }
      


      


  ?>
 
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
    <div class="w3-col s2" style="padding-top: 2%;background-color: transparent;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
       
        <a href="jobapplied.php" class="w3-button w3-round w3-light-blue w3-large">Job Application<span class="w3-badge w3-red"><?php echo"$number";?></span></a>
      </div>
    </div>
    <div class="w3-col s2" style="padding-top: 2%;">
      
      <a href="" class="w3-button w3-round w3-light-blue w3-large">Submisssion<span class="w3-badge w3-red"><?php echo"$submission";?></span></a>
    </div>
    <div class="w3-col s2"  style="padding-top: 2%;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
        <button class="w3-button w3-round w3-light-blue w3-large">Projects Logs</button>
        
      </div>
    </div>

    <div class="w3-col s2"  style="padding-top: 2%;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
        
        <a href="clienthome.php?status=logout" class="w3-button w3-round w3-light-blue w3-large">Logout</a>
      </div>
    </div>
    
  </div>
  <!---------------------body starts from here------------------------------------->
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2><?php echo$_SESSION['username']; ?>, Please rate this work and complete the transaction</h2>
  </div>

 
  <div class="w3-container" style="padding-left: 30%;padding-right: 30%">
     Job id:<?php echo $post;?><br><br>
  Job Price:<?php echo $priceset;?><br><br>
  Submitted by:<?php echo $fid;?><br><br>
    <form method="post" action="">
     Please rate<br>
     1  <input type="radio" name="rate" value="1">&nbsp&nbsp&nbsp
     2  <input type="radio" name="rate" value="2">&nbsp&nbsp&nbsp
     3  <input type="radio" name="rate" value="3" checked="">&nbsp&nbsp&nbsp
     4  <input type="radio" name="rate" value="4">&nbsp&nbsp&nbsp
     5  <input type="radio" name="rate" value="5"><br><br>
     Enter amount ($) to finish <br><br>
     <input type="number" name="money" class="w3-input" required="required">
     <input type="submit" name="submit" value="Proceed" class="w3-input">
   </form>
    
  </div>
   
   <div style="padding-left: 15%;padding-right: 5%;width: 60%;">
        
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
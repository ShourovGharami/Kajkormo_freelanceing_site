<?php
 require_once("config.php");
 session_start();

if(isset($_SESSION['username'])){
  $temp=$_SESSION['username'];
  $sql16="SELECT * FROM `posts` WHERE hired='$temp' && job_stat='assigned' && submission=''";
  $result=mysqli_query($connection,$sql16);
  $pending=mysqli_num_rows($result);
  $sql28="SELECT * FROM `transaction_table` WHERE freelancer='$temp' && status='completed' && f_to_c=0";
  $run28=mysqli_query($connection,$sql28);
  $req28=mysqli_num_rows($run28);

  $sql29="SELECT * FROM `transaction_table` WHERE freelancer='$temp' && status='completed' && f_to_c=0";
  $run29=mysqli_query($connection,$sql29);

}
else{
  header('location:index.php');
}
  $sql="SELECT * FROM `posts` where job_stat='pending'";
  $req=mysqli_query($connection,$sql);
 
?>
<html>
<head>
  <title>কাজকর্ম</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">

</head>
<body>

  <?php
     

      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }

      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }

      if(isset($_GET['apply'])){
        $pid=$_GET['apply'];
        echo "printing global variable after click\n";
                echo $pid;
                echo "\n";
        $query2="SELECT posted_by FROM `posts` WHERE postid='$pid'";
        $owner=mysqli_query($connection,$query2);
        $applicant=$_SESSION['username'];
        $poster=mysqli_fetch_array($owner);
        $poster2=$poster['posted_by'];
        $mainquery="INSERT INTO `job_application` (`postid`, `applicant`, `owner`) VALUES ('$pid','$applicant','$poster2')";
        $runit=mysqli_query($connection,$mainquery);

        if($runit)
        {
           echo"<script>alert('Successfully applied to your job')</script>";
        }
        else{
            echo"<script>alert('Sorry something went wrong')</script>";
        }

        header("location:freelancerhome.php");
      }
      

      if(isset($_POST['done']))
      {  
           echo"yeah it works";
          $rt=$_POST['rate'];
          $ttt=$_POST['trncid'];
          $owner=$_POST['cli'];
         
          $sql33="UPDATE `transaction_table` SET `f_to_c` = '$rt' WHERE `transaction_table`.`trnid` = $ttt";
          $run33=mysqli_query($connection,$sql33);
          $sql34="SELECT * FROM `client` WHERE username='$owner'";
          $run34=mysqli_query($connection,$sql34);
          $req34=mysqli_fetch_array($run34);
          $review=$req34['review']+1;
          $trat=$req34['total_rat']+$rt;
           echo"review\n";
          echo $review;
          echo"Total rating\n";
          echo $trat;
          $frat=$trat/$review;
          $sql35="UPDATE `client` SET `review` = '$review', `total_rat` = '$trat', `rating` = '$frat' WHERE `client`.`username` = '$owner'";
          $run35=mysqli_query($connection,$sql35);
          header("location:flancer-paycheck.php");
          
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
  <a href="freelancerhome.php" class="w3-bar-item w3-button">Home</a>
  <a href="submitjob.php" class="w3-bar-item w3-button">Pending Job<span class="w3-badge w3-blue"><?php echo $pending; ?></a>
  <a href="flancer-paycheck.php" class="w3-bar-item w3-button">Pay Check<span class="w3-badge w3-blue"><?php echo $req28; ?></a>
  <a href="freelancerhome.php?status=logout" class="w3-bar-item w3-button">Logout</a>
  
  </div>
  <!-------------------------------------------body starts from here------------------------------------->

  

  
  <div class="w3-cell-row" style="padding: 2%;">
    <!---------------------------------------------Left most bar--------------------------------------------->
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge" style="width:25%;padding: 2%;">
    <p class="w3-card w3-border w3-round-xlarge" style="padding: 2%;"><b>List of your Client review.<br>Click to see details.</b></p>
    <?php while($show=mysqli_fetch_array($run29)) { 
      $tid=$show['trnid'];
      $cli=$show['client'];?>

       <a style="width: 100%;" href="flancer-paycheck.php?send=<?php echo $tid;?>" class="w3-button w3-hover-shadow w3-green w3-border w3-round-xlarge"><?php echo $cli;?></a><br>

    <?php }
      $check=mysqli_num_rows($run29);
      if ($check>0) {
        
      }
     ?>
   </div>
   <br>
   <!---------------------------------------------Middle body bar--------------------------------------------->
   <?php 
    if ($check>0) {

      $sql32="SELECT * FROM `transaction_table` WHERE freelancer='$temp' && f_to_c=0";
    $run32=mysqli_query($connection,$sql32);
    $other=mysqli_fetch_array($run32);
    
     $tvar=$other['trnid'];
    $ttid=$tvar;
     
    if(isset($_GET['send'])){
     $ttid=$_GET['send'];
    }

     $sql30="SELECT * FROM `transaction_table` WHERE trnid=$ttid";
     $run30=mysqli_query($connection,$sql30);
     $var30=mysqli_fetch_array($run30); 
     $client2=$var30['client'];
     $mny=$var30['money'];
     $pstid=$var30['postid'];
     $r=$var30['c_to_f'];



  


        
  }


    


   ?>
   
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge" style="width:65%;padding: 2%;">
     <?php if($check>0){

     

      ?>
    <div class="w3-card w3-border w3-round-xlarge">

      <table class="w3-table w3-centered" style="padding: 2%;">
      <tr>
        <td>Payment By:</td>
        <td><?php echo $client2;?></td>
      </tr>
      <tr>
        <td>Amount:</td>
        <td><?php echo $mny;?></td>
      </tr>
      <tr>
        <td>Job Id:</td>
        <td><?php echo $pstid;?></td>
      </tr>
      <tr>
        <td>Client Rating:</td>
        <td><?php echo $r;?>*</td>
      </tr>
      </table>
    </div>
     <br>
   
       <form method="post" action="" class="w3-container w3-card-4 w3-border w3-round-xlarge" style="padding: 2%;">
         Please rate<br>
     1  <input type="radio" name="rate" value="1">&nbsp&nbsp&nbsp
     2  <input type="radio" name="rate" value="2">&nbsp&nbsp&nbsp
     3  <input type="radio" name="rate" value="3" checked="">&nbsp&nbsp&nbsp
     4  <input type="radio" name="rate" value="4">&nbsp&nbsp&nbsp
     5  <input type="radio" name="rate" value="5"><br><br>
     <input type="hidden" name="trncid" value=<?php echo $ttid;?>>
     <input type="hidden" name="cli" value=<?php echo $client2;?>>
     <input type="submit" name="done" value="Click to rate" class="clikTOrate">
      </form>
    <?php }
    else{
      echo"<p><b>Currently there is no new client to review.</b></p>";
    }

     ?>
   </div>
   <br>
   <!-------------------------Table right bar here--------------------->
   <div class="w3-container w3-cell w3-mobile w3-border w3-round-xlarge w3-cell-middle" style="width:10%;">
     <p>These are the list of Client who have paid you and rated your work. Please rate them back.</p>
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
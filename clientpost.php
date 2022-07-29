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
      {  require_once("config.php");
        $subject=$_POST['subject'];
        $price=$_POST['price'];
        $details=$_POST['details'];
        $temp=$_POST['category'];
        $poster=$_SESSION['username'];
        $category=implode(",",$temp);
        $sql="INSERT INTO `posts` (`postid`, `subject`, `price`, `posted_by`, `category`, `post_detail`, `job_stat`) VALUES (NULL, '$subject', '$price', '$poster', '$category', '$details', 'pending')";
        $result=mysqli_query($connection,$sql);
        if($result)
        {
          echo"Your job has been posted";
          //header('location:index.php');
        }
        else{
          echo"sorry try again";
        }
        
      }

      
     
      
      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }

      if(isset($_GET['delete'])){
       $dd=$_GET['delete'];
       $sql44="DELETE FROM `posts` WHERE `posts`.`postid` = $dd";
       $run44=mysqli_query($connection,$sql44);

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



  
  <div class="w3-bar w3-black w3-border w3-padding">
    <a href="clienthome.php" class="w3-bar-item w3-button w3-mobile"><b>Home</b></a>
    <a href="jobapplied.php" class="w3-bar-item w3-button w3-mobile">job Application<span class="w3-badge w3-blue"><?php echo"$number";?></span></a>
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

  <div style="padding-left: 30%;padding-right: 30%;padding-top: 5%;">

    <?php
            $uname=$_SESSION['username'];
            $sql35="SELECT * FROM `posts` WHERE job_stat='pending' && posted_by='$uname'";
            $run35=mysqli_query($connection,$sql35);
           

           while( $req35=mysqli_fetch_array($run35)) {  ?>
               <div class="w3-card w3-border w3-round-xlarge" style="padding: 3%;">
               Post ID:<?php echo $req35['postid']; ?><br>
               Subject:<?php echo $req35['subject']; ?><br>
               Price:<?php echo $req35['price']; ?><br>
               Tags:<?php echo $req35['category']; ?><br>
               Details:<?php echo $req35['post_detail']; ?><br>

               <?php 

                $name=$_SESSION['username'];
                $id=$req35['postid'];
               
                ?>
               <a href="clientpost.php?delete=<?php echo $id;?>" class="w3-button w3-light-blue w3-round-xlarge">Delete</a>
                
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
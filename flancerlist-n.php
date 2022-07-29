<?php
 require_once("config.php");
 session_start();
if(isset($_SESSION['username'])){


}
else{
  header('location:index.php');
}
  $sql="SELECT * FROM `freelancer` WHERE status='waiting'";
  $sql2="SELECT * FROM `client` WHERE status='waiting'";
  $req=mysqli_query($connection,$sql);
  $req2=mysqli_query($connection,$sql2);
  $n1=mysqli_num_rows($req);
  $n2=mysqli_num_rows($req2);
  $nt=$n1+$n2;

  $sql1="SELECT * FROM `freelancer` WHERE status='approved'";
  $req1=mysqli_query($connection,$sql1);

  $sql3="SELECT * FROM `freelancer` WHERE status='approved'";
  $sql4="SELECT * FROM `client` WHERE status='approved'";
  $req3=mysqli_query($connection,$sql3);
  $req4=mysqli_query($connection,$sql4);
  $n5=mysqli_num_rows($req3);
  $n6=mysqli_num_rows($req4);
  $nt1=$n5+$n6;

  $sql23="SELECT * FROM `transaction_table` WHERE status='pending'";
  $run23=mysqli_query($connection,$sql23);
  $n4=mysqli_num_rows($run23);


     
      
      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
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
<body>
 
  <div >
    <span></span>
    <span ></span>

  </div>
  <!-------------------------header design--------------------->
  <div class="grid-container">
    <div class="job">কাজকর্ম</div>
    <div class="fwhite_admin">
    <div class="w3-col l2" style="padding-top: 2%;background-color: transparent;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
        <button class="w3-button w3-round w3-light-greenyellow w3-large">Approval<span class="w3-badge w3-red"><?php echo"$nt";?></span></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="admin.php" class="w3-bar-item w3-button">Freelancers<span class="w3-badge w3-red"><?php echo"$n1";?></span></a>
        <a href="clientlist.php" class="w3-bar-item w3-button">Clients<span class="w3-badge w3-red"><?php echo"$n2";?></span></a>
        
      </div>
      </div>
    </div>
    <div class="w3-col l2" style="padding-top: 2%;">
      <a href="admin-transactionlist.php" class="w3-button w3-round w3-light-green w3-large">transactions<span class="w3-badge w3-red"><?php echo"$n4";?></span></a>
    </div>
    <div class="w3-col l2" style="padding-top: 2%;background-color: transparent;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
        <button class="w3-button w3-round w3-light-greenyellow w3-large">Users<span class="w3-badge w3-red"><?php echo"$nt1";?></span></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="flancerlist-n.php" class="w3-bar-item w3-button">Freelancers<span class="w3-badge w3-red"><?php echo"$n5";?></span></a>
        <a href="clientlist-n.php" class="w3-bar-item w3-button">Clients<span class="w3-badge w3-red"><?php echo"$n6";?></span></a>
        
      </div>
      </div>
    </div>
    <div class="w3-col l2"  style="padding-top: 2%;">
      <div class="w3-dropdown-hover" style="background-color: transparent;">
        
        <a href="admin.php?status=logout" class="w3-button w3-round w3-lime w3-large">Logout</a>
      </div>
    </div>
    </div>
  </div>
  <!---------------------body starts from here------------------------------------->

 <div class="w3-cointer w3-green" style="padding: 1%">
  <h2>All Freelancer</h2>
 </div>
 <div class="w3-container" style="padding-left: 30%;padding-right: 30%;">
 <table class="w3-table">
           <tr><th>Freelancer id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Action</th>
           <?php while($flancer=mysqli_fetch_array($req1)) {?>
           <tr>
               <td><?php echo $flancer['fid']; ?></td>
               <td><?php echo $flancer['name']; ?></td>
               <td><?php echo $flancer['email']; ?></td>
               <td><a href="flancerdetails-n.php?show=<?php echo $flancer['fid']; ?>" class="w3-button w3-red">Details</a></td>
               
           </tr>
           <?php } ?>
       </table>
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
<?php
 require_once("config.php");
 session_start();
    
    
 
 
 
if(isset($_SESSION['username'])){
  $temp=$_SESSION['username'];
  $sql16="SELECT * FROM `posts` WHERE hired='$temp' && job_stat='assigned' && submission=''";
  $result=mysqli_query($connection,$sql16);
  $pending=mysqli_num_rows($result);
  $sql28="SELECT * FROM `transaction_table` WHERE freelancer='opu123' && status='completed' && f_to_c=0";
  $run28=mysqli_query($connection,$sql28);
  $req28=mysqli_num_rows($run28);

}
else{
  header('location:index.php');
}
  $sql="SELECT * FROM `posts` where job_stat='pending'";
  $req=mysqli_query($connection,$sql);
  $sql42="SELECT * FROM `freelancer` WHERE username='$temp'";
  $run42=mysqli_query($connection,$sql42);
  $req42=mysqli_fetch_array($run42);
 
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
     

      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }


      


       if(isset($_POST['submit']))
        {  require_once("config.php");
      $name=$_POST['name'];
      $gender=$_POST['gender'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $hprice=$_POST['hprice'];
      $address=$_POST['address'];
      $tttt=$_POST['category'];
      $category=implode(",",$tttt);

        $sql="UPDATE `freelancer` SET `name` = '$name', `gender` = '$gender', `email` = '$email', `phone` = '$phone', `hprice` = '$hprice', `address` = '$address', `skills` = '$category' WHERE `freelancer`.`username` = '$temp'";
        $result=mysqli_query($connection,$sql);
        if($result)
        {
          echo"successfully updated to database";
          header('location:freelancerhome.php');
        }
        else{
          echo"sorry try again";
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
  <a href="freelancerhome.php" class="w3-bar-item w3-button">Home</a>
  <a href="submitjob.php" class="w3-bar-item w3-button">Pending Job<span class="w3-badge w3-blue"><?php echo $pending; ?></a>
  <a href="flancer-paycheck.php" class="w3-bar-item w3-button">Pay Check<span class="w3-badge w3-blue"><?php echo $req28; ?></a>
  <a href="freelancerhome.php?status=logout" class="w3-bar-item w3-button">Logout</a>
  
  </div>
  <!---------------------body starts from here------------------------------------->
   

   <div>
     <form class="w3-container" method="post" style="padding-left: 20%;padding-right: 20%;background-color: transparent;padding-top: 5%;">
          
                 <p>
                     <label>Name</label>
                        <input class="w3-input w3-hover-teal" type="text" name="name" style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $req42['name'];?>">
                </p>
                
                <p>
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        
                </p>
                
              
                 <p>
                     <label>Email</label>
                        <input class="w3-input w3-hover-teal w3-border" type="email" name="email" style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $req42['email'];?>"></p>
                  
                
                 <p>
                     <label>Phone</label>
                      <input class="w3-input w3-hover-teal" type="text" name="phone" style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $req42['phone'];?>">
                    </p>
                 <p>
                     <label>Hourley price
                                       </label>
                       <input class="w3-input w3-hover-teal w3-border" type="number" name="hprice" style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $req42['hprice'];?>"></p>
                 <p>
                     <label>Address</label>
                        <input class="w3-input w3-hover-teal" type="text" name="address" style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $req42['address'];?>">
                </p>
                <h3>Choose your skill</h3>
                <p>
                  <?php 
                  $test=$req42['skills'];
                  $return=stristr($test,"php",false);
                  
                  if(stristr($test,"php",false)==""){
                      echo '<input type="checkbox" name="category[]" value="php">PHP';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="php" checked>PHP';
                      }


                      if(stristr($test,"html",false)==""){
                      echo '<input type="checkbox" name="category[]" value="html">HTML ';
                      }
                  else{
                      echo'<input type="checkbox" name="category[]" value="html" checked>HTML ';
                      }

                       if(stristr($test,"designing",false)==""){
                      echo '<input type="checkbox" name="category[]" value="designing">Designing ';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="designing" checked>Designing ';
                      }

                       if(stristr($test,"photoshop",false)==""){
                      echo '<input type="checkbox" name="category[]" value="photoshop">Photoshop ';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="photoshop" checked>Photoshop ';
                      }

                       if(stristr($test,"data-entry",false)==""){
                      echo '<input type="checkbox" name="category[]" value="data-entry">Data entry ';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="data-entry" checked>Data entry ';
                      }

                       if(stristr($test,"writing",false)==""){
                      echo '<input type="checkbox" name="category[]" value="writing">Article writing<br>';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="writing" checked>Article writing<br>';
                      }

                       if(stristr($test,"android",false)==""){
                      echo '<input type="checkbox" name="category[]" value="android">Android';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="android" checked>Android';
                      }

                       if(stristr($test,"excel",false)==""){
                      echo '<input type="checkbox" name="category[]" value="excel">Excel';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="excel" checked>Excel';
                      }

                       if(stristr($test,"css",false)==""){
                      echo '<input type="checkbox" name="category[]" value="css">CSS design';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="css" checked>CSS design';
                      }

                       if(stristr($test,"seo",false)==""){
                      echo '<input type="checkbox" name="category[]" value="seo">SEO';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="seo" checked>SEO';
                      }

                       if(stristr($test,"iphone",false)==""){
                      echo '<input type="checkbox" name="category[]" value="iphone">iphone';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="iphone" checked>iphone';
                      }

                       if(stristr($test,"mysql",false)==""){
                      echo '<input type="checkbox" name="category[]" value="mysql">MySql';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="mysql" checked>MySql';
                      }

                       if(stristr($test,"research",false)==""){
                      echo '<input type="checkbox" name="category[]" value="research">Research<br>';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="research" checked>Research<br>';
                      }

                      if(stristr($test,"linux",false)==""){
                      echo '<input type="checkbox" name="category[]" value="linux">Linux';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="linux" checked>Linux';
                      }

                      if(stristr($test,"c++",false)==""){
                      echo '<input type="checkbox" name="category[]" value="c++">C++ Programming';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="c++" checked>C++ Programming';
                      }

                      if(stristr($test,"java",false)==""){
                      echo '<input type="checkbox" name="category[]" value="java">Java';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="java" checked>Java';
                      }

                      if(stristr($test,"python",false)==""){
                      echo '<input type="checkbox" name="category[]" value="python">Python';
                    }
                  else{
                      echo'<input type="checkbox" name="category[]" value="python" checked>Python';
                      }


                  ?>
                           
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                </p>
                     <input type="submit" name="submit" value="Submit" class="w3-input w3-teal w3-round-xxlarge w3-animate-input w3-hover-blue">
            </form>
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
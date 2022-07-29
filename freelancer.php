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
     
      
      if(isset($_POST['submit']))
      {  require_once("config.php");
      $name=$_POST['name'];
      $dob=$_POST['dob'];
      $gender=$_POST['gender'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $phone=$_POST['phone'];
      $hprice=$_POST['hprice'];
      $address=$_POST['address'];
      $temp=$_POST['category'];
      $category=implode(",",$temp);

        $sql="INSERT INTO `freelancer` (`fid`, `name`, `username`, `password`, `dob`, `gender`, `email`, `phone`, `hprice`, `address`, `skills`, `jobs_completed`, `review`, `total_rat`, `rating`, `balance`, `status`) VALUES (NULL, '$name', '$username', '$password', '$dob', '$gender', '$email', '$phone', '$hprice', '$address', '$category', '0', '0', '0', '0', '0', 'waiting')";
        $result=mysqli_query($connection,$sql);
        if($result)
        {
          echo"successfully inserted to database";
          header('location:index.php');
        }
        else{
          //echo"sorry try again";
          echo '<script type="text/javascript"> alert("sorry try again") </script>';
        }
        
      }
      


  ?>
  <div >
    <span></span>
    <span ></span>
  </div>
 <?php
include('header.php');
 ?>


   <div class="w3-container w3-teal" align="center">
    <h2>You are going to be a freelancer</h2>
   </div>
   <div class="bg-img">
  <form class="w3-container" method="post" style="padding-left: 20%;padding-right: 20%;background-color: transparent;padding-top: 5%;">
          
                 <p>
                     <label>Name</label>
                        <input class="w3-input w3-hover-teal" type="text" name="name" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                <p>
                        <label class="">Date of Birth</label>
                        <input class="w3-input w3-hover-teal w3-border" type="date" name="dob" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                <p>
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        
                </p>
                
              
                 <p>
                     <label>Email</label>
                        <input class="w3-input w3-hover-teal w3-border" type="email" name="email" style="background-color: rgb(255, 255, 255,0.5)"></p>
                  <p>
                     <label>Username</label>
                        <input class="w3-input w3-hover-teal" type="text" name="username" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                <p>
                     <label>Password</label>
                        <input class="w3-input w3-hover-teal" type="Password" name="password" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                 <p>
                     <label>Phone</label>
                      <input class="w3-input w3-hover-teal" type="text" name="phone" style="background-color: rgb(255, 255, 255,0.5)"></p>
                 <p>
                    
                 <p>
                     <label>Address</label>
                        <input class="w3-input w3-hover-teal" type="text" name="address" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                <h3>Choose your skill</h3>
                <p>
                  <input type="checkbox" name="category[]" value="php">English         
                  <input type="checkbox" name="category[]" value="html">Mathmatics 
                  <input type="checkbox" name="category[]" value="designing">Physics 
                  <input type="checkbox" name="category[]" value="photoshop">Computer Fundamental 
                  <input type="checkbox" name="category[]" value="data-entry">Higher Math
                  <input type="checkbox" name="category[]" value="writing">Accounting<br>
                  <input type="checkbox" name="category[]" value="android">Marketing
                  <input type="checkbox" name="category[]" value="excel">Marketing
                  <input type="checkbox" name="category[]" value="css">CSS design
                  <input type="checkbox" name="category[]" value="seo">SEO
                  <input type="checkbox" name="category[]" value="iphone">iphone
                  <input type="checkbox" name="category[]" value="mysql">MySql
                  <input type="checkbox" name="category[]" value="research">Research<br>
                  <input type="checkbox" name="category[]" value="linux">Linux
                  <input type="checkbox" name="category[]" value="c++">C++ Programming
                  <input type="checkbox" name="category[]" value="java">Java
                  <input type="checkbox" name="category[]" value="python">Python
                </p>
                     <input type="submit" name="submit" value="Submit" class="w3-input w3-teal w3-round-xxlarge w3-animate-input w3-hover-blue">
            </form>
        </div>

<?php
include('footer.php');
 ?>
  <!--------------------------------modal for login---------------------------------------->

   

<!---------------------------------Another model for signup-------------------------------------->

   
  
  
</body>
</html>
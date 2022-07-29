<?php
include('config.php');
      $uer=$_POST['username'];
      $pass=$_POST['password'];
      $sql="SELECT * FROM `users` WHERE username='$uer' and password='$pass'";
      $run=mysqli_query($connection,$sql);
  if(mysqli_num_rows($run)>0)
  {
	  echo"Wow you have an account";
  }
  else{
	  echo"Your username and password do not match";
  }


?>
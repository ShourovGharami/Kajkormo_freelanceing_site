<?php
  define('db_server','localhost');
  define('db_username','root');
  define('db_password','');
  define('db_database','Final');
  $connection=mysqli_connect(db_server,db_username,db_password,db_database);
  if($connection){
      
  }
else{
    echo"<script>alert('Failed to connect to database')</script>";
   }
?>
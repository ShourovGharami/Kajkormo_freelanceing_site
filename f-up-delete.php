<?php
require_once("config.php");
    if(isset($_GET['update']))
    {
      echo"here it comes";
      echo $_GET['update'];
    $id=$_GET['update'];
    $sql5="UPDATE `freelancer` SET `status` = 'approved' WHERE `freelancer`.`fid` ='$id' ";
    $run=mysqli_query($connection,$sql5);
    header('location:admin.php');
    }



?>
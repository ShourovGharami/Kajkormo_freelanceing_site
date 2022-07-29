<?php
include("config.php");
session_start();
$temp=$_SESSION['username'];
$sql9="SELECT * FROM `job_application` WHERE owner='$temp'";
$run=mysqli_query($connection,$sql9);

        $pstid=$_GET['test'];
        $applicant=$_GET['appl'];
        $sql14="UPDATE `posts` SET `job_stat` = 'assigned', `hired` = '$applicant' WHERE `posts`.`postid` ='$pstid'";
        $sql15="DELETE FROM job_application WHERE postid='$pstid'";
        $run6=mysqli_query($connection,$sql15);
        $run5=mysqli_query($connection,$sql14);
       // echo"yeah it works";
        if($run5)
        {
            echo"Acccepted job";
            header('location:jobapplied.php');
        }
        else{
           echo"<script>alert('Sorry try again')</script>";
           header('location:jobapplied.php');
        }
      
?>
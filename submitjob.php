<?php
require_once("config.php");
session_start();
if (isset($_SESSION['username'])) {
  $temp = $_SESSION['username'];
  $sql16 = "SELECT * FROM `posts` WHERE hired='$temp' && job_stat='assigned' && submission=''";
  $result = mysqli_query($connection, $sql16);
  $pending = mysqli_num_rows($result);
  $sql28 = "SELECT * FROM `transaction_table` WHERE freelancer='$temp' && status='completed' && f_to_c=0";
  $run28 = mysqli_query($connection, $sql28);
  $req28 = mysqli_num_rows($run28);
} else {
  header('location:index.php');
}
$sql = "SELECT * FROM `posts` where job_stat='pending'";
// $req=$result\\\;
//------------------------------------------------------------------


if (isset($_POST['upload'])) {
  require_once("config.php");
  //echo"working on it<br>";
  $postid = $_POST['postid'];
  if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    //$sql17="UPDATE `posts` SET `submission` = '$file_name' WHERE `posts`.`postid` = $postid";
    //$result2=mysqli_query($connection,$sql17);
    // echo $file_name;
    echo '<br>';
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    //echo $file_tmp;
    // echo'<br>';
    $fileError = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];
    //echo $file_type;
    //echo'<br>';
    //$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

    $exploded = explode('.', $_FILES['file']['name']);
    $last_element = end($exploded);
    $file_ext = strtolower($last_element);

    $extensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'xlsx', 'doc', 'docx', 'pdf', 'ppt');

    if (in_array($file_ext, $extensions)) {
      if ($fileError === 0) {
        if ($file_size < 2097152) {
          move_uploaded_file($file_tmp, "files/" . $file_name);
          $sql17 = "UPDATE `posts` SET `submission` = '$file_name' WHERE `posts`.`postid` = $postid";
          $result2 = mysqli_query($connection, $sql17);
          header("location:submitjob.php");
        } else {
          //echo "Your file is too big!";
          echo "<script>alert('Your file is too big!')</script>";
        }
      } else {
        //echo "There was an error uploading your file!";
        echo "<script>alert('There was an error uploading your file!')</script>";
      }
    } else {
      //echo "You cannot upload files of this type!";
      echo "<script>alert('You cannot upload files of this type!')</script>";
    }



    /*if(in_array($file_ext,$extensions)=== false){
         $errors[]="File extentions is not valid";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"files/".$file_name);
         $sql17="UPDATE `posts` SET `submission` = '$file_name' WHERE `posts`.`postid` = $postid";
        $result2=mysqli_query($connection,$sql17);
         echo "Success";
         header("location:submitjob.php");
      }else{
        print_r($errors);
      }*/
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

  <div>
    <span></span>
    <span></span>

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
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2 class="wellcomefreelancher">Welcome <?php echo $_SESSION['username']; ?></h2>
  </div>
  <h3 class="wellcomefreelancher">Find your job here</h3>
  <div style="padding-left: 15%;padding-right: 5%;width: 60%;">
    <?php while ($arr = mysqli_fetch_array($result)) { ?>



      <div class="w3-card" style="padding: 3%;">
        Post ID:<?php echo $arr['postid']; ?><br>
        Subject:<?php echo $arr['subject']; ?><br>
        <form action="" method="post" enctype="multipart/form-data">
          Select file to upload:<br>
          <input type="file" name="file" id="fileToUpload"><br>
          <input type="hidden" name="postid" value="<?php echo $arr['postid']; ?>"><br>
          <input type="submit" value="Upload Project" name="upload">
        </form>
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
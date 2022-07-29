<?php
require_once("config.php");
session_start();

$checkhowto = 0;
if (isset($_GET['update'])) {
  $checkhowto = $_GET['update'];
  //echo "Check How To".$checkhowto."<br>";
}

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
$req = mysqli_query($connection, $sql);

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


  if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
      session_destroy();
      header('location:index.php');
    }
  }

  if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
      session_destroy();
      header('location:index.php');
    }
  }

  if (isset($_GET['apply'])) {

    $pid = $_GET['apply'];

    echo "printing global variable after click\n";
    echo $pid;
    echo "\n";
    $query2 = "SELECT posted_by FROM `posts` WHERE postid='$pid'";
    $owner = mysqli_query($connection, $query2);
    $applicant = $_SESSION['username'];
    $poster = mysqli_fetch_array($owner);
    $poster2 = $poster['posted_by'];
    $mainquery = "INSERT INTO `job_application` (`postid`, `applicant`, `owner`) VALUES ('$pid','$applicant','$poster2')";
    $runit = mysqli_query($connection, $mainquery);

    if ($runit) {
      echo "<script>alert('Successfully applied to your post')</script>";
    } else {
      echo "<script>alert('Sorry something went wrong')</script>";
    }

    header("location:freelancerhome.php");
  }


  // $var5=mysqli_fetch_array($req,MYSQLI_NUM);
  //echo"Post id print\n";
  //echo $var5[5];





  ?>

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
    <a href="submitjob.php" class="w3-bar-item w3-button">Pending post<span class="w3-badge w3-blue"><?php echo $pending; ?></a>
    <a href="flancer-paycheck.php" class="w3-bar-item w3-button">Pay Check<span class="w3-badge w3-blue"><?php echo $req28; ?></a>
    <a href="freelancerhome.php?status=logout" class="w3-bar-item w3-button">Logout</a>

  </div>
  <!---------------------body starts from here------------------------------------->
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2 class="wellcomefreelancher">Welcome <?php echo $_SESSION['username']; ?></h2>
  </div>
  <div class="w3-cell-row" style="padding: 2%;">

    <div class="w3-container w3-cell w3-border w3-round-xlarge" style="width: 25%;padding: 2%;">
      <div class="w3-border w3-round-xlarge" style="padding: 2%;">
        <?php
        $sql39 = "SELECT * FROM `freelancer` WHERE username='$temp'";
        $run39 = mysqli_query($connection, $sql39);
        $req39 = mysqli_fetch_array($run39);
        $email = $req39['email'];
        $phone = $req39['phone'];
        $jobcom = $req39['jobs_completed'];
        $rating = $req39['rating'];
        $balance = $req39['balance'];

        ?>

        <div class="w3-card-4 w3-border w3-round-xlarge" style="text-align: center;">
          <h3><?php echo $temp; ?></h3>
        </div>
        <br>
        <div class="w3-card-4 w3-border w3-round-xlarge">
          <table class="w3-table">
            <tr>
              <td style="width: 25%;">
                Email:
              </td>
              <td style="width: 75%;">
                <?php echo $email; ?>
              </td>
            </tr>
            <tr>
              <td style="width: 25%;">
                Phone:
              </td>
              <td style="width: 75%;">
                <?php echo $phone; ?>
              </td>
            </tr>
            <tr>
              <td style="width: 25%;">
                Total Jobs:
              </td>
              <td style="width: 75%;">
                <?php echo $jobcom; ?>
              </td>
            </tr>
            <tr>
              <td style="width: 25%;">
                Rating:
              </td>
              <td style="width: 75%;">
                <?php echo $rating; ?>
              </td>
            </tr>
            <tr>
              <td style="width: 25%;">
                Balance:
              </td>
              <td style="width: 75%;">
                <?php echo $balance; ?> tk
              </td>
            </tr>
          </table>

        </div>
        <br>
        <div class="w3-card-4 w3-border w3-round-xlarge" style="padding: 0px;">
          <a href="freelancerupdate.php" class="w3-button w3-green w3-round-xlarge" style="width: 100%;">Edit</a>
        </div>

      </div>

    </div>



    <div class="w3-container w3-cell w3-border w3-round-xlarge">

      <h3 style="text-align: center;">Find your job here</h3>
      <div class="w3-container" style="padding: 2%;align-items: center;">
        <?php if ($checkhowto == 0) {
          echo '<a href="freelancerhome.php?update=0" class="w3-button w3-green w3-border w3-round-xlarge">Regular</a>';
        } else {
          echo '<a href="freelancerhome.php?update=0" class="w3-button w3-border w3-round-xlarge">Regular</a>';
        }

        if ($checkhowto == 1) {
          echo '<a href="freelancerhome.php?update=1" class="w3-button w3-green w3-border w3-round-xlarge">Sorted</a>';
        } else {
          echo '<a href="freelancerhome.php?update=1" class="w3-button w3-border w3-round-xlarge">Sorted</a>';
        }

        if ($checkhowto == 2) {
          echo '<a href="freelancerhome.php?update=2" class="w3-button w3-green w3-border w3-round-xlarge">Recommended</a>';
        } else {
          echo '<a href="freelancerhome.php?update=2" class="w3-button w3-border w3-round-xlarge">Recommended</a>';
        }

        ?>



      </div>


      <?php
      $k = 0;
      $arr = array(); //$arr is post id
      $cost = array(); // price of job
      $credit = array(); //check string if job category match freelancer category then gives a point
      $checkhowto = 0;
      while ($var6 = mysqli_fetch_array($req)) {
        $arr[$k] = $var6['postid'];
        $cost[$k] = $var6['price'];
        $k++;
      }

      for ($l = 0; $l < $k; $l++) {

        $credit[$l] = 0;
      }

      $checkhowto = 0;
      if (isset($_GET['update'])) {
        $checkhowto = $_GET['update'];
        //echo "Check How To".$checkhowto."<br>";
      }



      if ($checkhowto == 1) {
        include 'bubblesort.php';
        bubbleSort($arr, $cost);
      } elseif ($checkhowto == 2) {

        //echo"temp username ".$temp;
        $sql37 = "SELECT * FROM `freelancer` WHERE username='$temp'";
        $run37 = mysqli_query($connection, $sql37);
        $req37 = mysqli_fetch_array($run37);
        $ccc = $req37['skills'];
        //echo"CAtegory<br>".$ccc;
        // $length=str_word_count("php,html,designing,android,c++,java");
        // echo"length".$length;
        $skill = explode(",", $ccc);
        $length = sizeof($skill);
        //echo"length".$length;

        for ($p = 0; $p < $k; $p++) {
          $iid = $arr[$p];
          $sql38 = "SELECT * FROM `posts` WHERE postid=$iid";
          $run38 = mysqli_query($connection, $sql38);
          $req38 = mysqli_fetch_array($run38);
          $test1 = $req38['category'];

          for ($q = 0; $q < $length; $q++) {
            $return = stristr($test1, $skill[$q], false);
            if ($return == "") {
              //echo "string did not match";

            } else {
              //echo"String matched";
              $credit[$p]++;
            }
          }
        }

        include 'bubblesort.php';
        bubbleSort($arr, $credit);
      } else {
      }



      for ($l = 0; $l < $k; $l++) {

        // echo">>Post id".$arr[$l];
        //  echo"Price".$credit[$l];
        //  echo"<br>";

      }


      ?>
      <div >
        <?php for ($cnt = 0; $cnt < $k; $cnt++) {
          $useid = $arr[$cnt];
          $sql35 = "SELECT * FROM `posts` WHERE postid=$useid";
          $run35 = mysqli_query($connection, $sql35);
          $req35 = mysqli_fetch_array($run35);



        ?>



          <div class="w3-card w3-border w3-round-xlarge" style="padding: 3%;">
            Post ID:<?php echo $req35['postid']; ?><br>
            Subject:<?php echo $req35['subject']; ?><br>
            Price:<?php echo $req35['price']; ?><br>
            Tags:<?php echo $req35['category']; ?><br>
            Details:<?php echo $req35['post_detail']; ?><br>

            <?php

            $name = $_SESSION['username'];
            $id = $req35['postid'];

            $test = "SELECT * FROM `job_application` WHERE applicant='$name' && postid='$id'";
            $run5 = mysqli_query($connection, $test);
            $check = mysqli_num_rows($run5);
            if ($check > 0) {
              echo '<a href="" class="w3-button w3-red w3-round-xlarge w3-disabled">Applied</a>';
            } else { ?>
              <a href="freelancerhome.php?apply=<?php echo $id; ?>" class="w3-button w3-light-blue w3-round-xlarge">Apply</a>

            <?php } ?>


          </div>
          <br>
          <br>


        <?php } ?>
      </div>

    </div>

    <div class="w3-container w3-cell w3-border w3-round-xlarge" style="width: 25%;padding: 2%">


      <div class="w3-card-4 w3-border w3-round-xlarge" style="padding: 2%">

        <p>Choose your suitable job from the list. Customize the list as you like by clicking the buttons. Use <b>Recommended</b> to sort job according your skills and use <b>Sort</b> button to sort the job according to price of the job. </p>

      </div>

    </div>

  </div>


  <!-------------------------footer design--------------------->



  <!--------------------------------modal for login---------------------------------------->



  <!---------------------------------Another model for signup-------------------------------------->
  <?php
  include('footer.php');
  ?>


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
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

  session_start();
  if (isset($_POST['submit'])) {
    require_once("config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];


    $sql = "SELECT * FROM `$type` WHERE username='$username' and password='$password' and status='approved'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {

      echo "<script>alert('successfully logged in to database')</script>";
      $_SESSION['username'] = $username;
      $_SESSION['type'] = $type;
      if ($type === "user") {
        header('location:admin.php');
      } else if ($type === "freelancer") {
        header('location:freelancerhome.php');
      } else if ($type === "client") {
        header('location:clienthome.php');
      }
    } else {
      echo "<script>alert('Wrong Username or Password!')
          header('location:index.php');
          </script>";
    }
  }



  ?>
  <div>
    <span></span>
    <span></span>

  </div>
  <div class="grid-container">
    <div class="job">কাজকর্ম</div>
    <div class="fwhite">
      <button class="login" id="Btn">Login</button>
      <button class="register" id="Btn1">Signup</button>

    </div>
  </div>
  <div class="addimage">
    <div class="addtext">
      <h1 style="font-size:50px">Welcome-স্বাগতম,<br>
        Our Website-আমাদের ওয়েবসাইটে</h1>
      <br>
      <h3>Hire expart frelancher.</h3><br>
      <button class="button button2" id="Btn2">As a Freelancer </button>
      <button class="button button2" id="Btn3">As a client </button>
    </div>

  </div>





  <div class="ad">

    <div class="header">
    <h2> Need something done? </h2>
    </div>

    <div class="something">
    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="https://www.f-cdn.com/assets/main/en/assets/illustrations/project/post-a-project.svg">
      <h3> Post a job</h3>
      <p> It’s free and easy to post a job. Simply fill in a title, description and budget and competitive bids come within minutes.</p>

    </div>

    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="https://www.f-cdn.com/assets/main/en/assets/illustrations/freelancer/work.svg">
      <h3> Choose freelancers</h3>
      <p> No job is too big or too small. We've got freelancers for jobs of any size or budget, across 1800+ skills. No job is too complex. We can get it done!</P>
    </div>

    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="https://www.f-cdn.com/assets/main/en/assets/illustrations/payment/pay-safely.svg">
      <h3> Pay safely</h3>
      <p> Only pay for work when it has been completed and you're 100% satisfied with the quality using our milestone payment system.</p>
    </div>


    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="https://www.f-cdn.com/assets/main/en/assets/illustrations/freelancer/about-me.svg" alt="We’re here to help Icon" height="128" width="128" data-display="block" data-full-width="true" data-align-center="true" data-aspect-ratio="false" loading="lazy">
      <h3> We’re here to help</h3>
      <p> Our talented team of recruiters can help you find the best freelancer for the job and our technical co-pilots can even manage the project for you.</p>
    </div>
    </div>


  </div>

  <div class="great">

    <div class="header">
    <h2> What's great about it? </h2>
    </div>

    <div class="something">
    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="	https://www.f-cdn.com/assets/main/en/assets/illustrations/portfolio/browse-portfolios.svg">
      <h3> Browse portfolios</h3>
      <p> তাদের পূর্ববর্তী কাজের নমুনা ব্রাউজ করে এবং তাদের প্রোফাইল পর্যালোচনা পড়ে আপনি বিশ্বাস করতে পারেন এমন পেশাদারদের খুঁজুন।</p>

    </div>

    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="	https://www.f-cdn.com/assets/main/en/assets/illustrations/bids/bids-alt.svg">
      <h3> Fast bids</h3>
      <p> আমাদের প্রতিভাবান ফ্রিল্যান্সারদের কাছ থেকে বাধ্যতামূলক বিনামূল্যে উদ্ধৃতিগুলি দ্রুত পান। 80% প্রকল্প 60 সেকেন্ডের মধ্যে বিড করা হয়।</P>
    </div>

    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="	https://www.f-cdn.com/assets/main/en/assets/illustrations/bids/bids-alt.svg">
      <h3> Quality work</h3>
      <p> এর কাছে এখন পর্যন্ত দেশব্যাপী মানের ফ্রিল্যান্সারদের সবচেয়ে বড় পুল রয়েছে- থেকে বেছে নেওয়ার জন্য ৫ মিলিয়নেরও বেশি।</p>
    </div>


    <div>
      <img _ngcontent-webapp-c102="" class="ImageElement" src="https://www.f-cdn.com/assets/main/en/assets/illustrations/time/track-progress.svg">
      <h3> Track progress</h3>
      <p> আমাদের টাইম ট্র্যাকার এবং মোবাইল অ্যাপের সাথে আপ-টু-ডেট এবং অন-দ্য-গোতে থাকুন। সর্বদা জেনে রাখুন ফ্রিল্যান্সাররা কি করছে।</p>
    </div>
    </div>


  </div>



  <div>
    <h2></h2>
    <div class="grid-foot">

      <div>Contact Us<br>+8801909845700<br><br>Email<br>help@kajkormo.com<br><br>Address<br>Savar, Dhaka, Bangladesh</div>
      <div>Our Resources<br><br>Tools<br>job<br>Help desk<br>Opportunities</div>
      <div>About us<br><br>How it work<br>Our objectives<br></div>
      <div>আমরা ক্লায়েন্টের জন্য একটি সাধারণ ক্ষেত্র প্রদান করি <br> এবং ফ্রিল্যান্সার, যাতে তারা একে অপরের সাথে সহজেই <br> যোগাযোগ করতে পারে। এতে সবার উপকার হয়।</div>

    </div>
    <div class="ftrr">
    All rights researved to কাজকর্ম.
    </div>
  </div>

  <!--------------------------------modal for login---------------------------------------->

  <div id="modal1" class="modal">
    <form class="modal-content animate" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('modal1').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" class="w3-input" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" class="w3-input" name="password" required>
        <label>Please select your account type</label><br>
        <input type="radio" name="type" value="user" checked required="required">Admin<br>
        <input type="radio" name="type" value="freelancer">Freelancer<br>
        <input type="radio" name="type" value="client">Client<br>
        <input type="submit" value="Submit" name="submit" class="w3-input">


      </div>
    </form>
  </div>

  <!---------------------------------Another model for signup-------------------------------------->



  <script>
    var modal = document.getElementById('modal1');

    var nmodal = document.getElementById('modal2');


    var btn = document.getElementById("Btn");
    var btn1 = document.getElementById("Btn1");
    var btn2 = document.getElementById("Btn2");
    var btn3 = document.getElementById("Btn3");


    var span = document.getElementsByClassName("close")[0];


    btn.onclick = function() {
      modal.style.display = "block";
    }
    btn1.onclick = function() {
      location.href = 'signup.php';
    }
    btn2.onclick = function() {
      modal.style.display = "block";
    }
    btn3.onclick = function() {
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }



    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }

      if (event.target == nmodal) {
        nmodal.style.display = "none";
      }

    }
  </script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62e3e15937898912e9603e4c/1g952gi4q';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>
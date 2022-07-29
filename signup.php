<html>
<head>
	<title>কাজকর্ম</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
	<div >
		<span></span>
		<span ></span>

	</div>
	
  <div class="grid-container">
    <div class="job">কাজকর্ম</div>
    <div class="fwhite">
      <button class="login" id="Btn1">Home</button>
    </div>
  </div>


</div>
<div class="addimage2">
    <div class="addtext">
      <h1 style="font-size:50px">আপনার সঠিক অ্যাকাউন্টের ধরন চয়ন করুন</h1>
      <br>
      <h3>আপনি যদি কাজ করতে চান তাহলে ফ্রেলাঞ্চার বেছে নিন বা ফ্রেলাঞ্চার নিয়োগ করতে চাইলে ক্লায়েন্ট বেছে নিন।</h3><br>
      <button class="button button2" id="Btn2">As a Freelancer </button>
      <button class="button button2" id="Btn3">As a client </button>
    </div>
  </div> 

  <!-- <div class="addtext">
  		<h1 style="font-size:50px">Please choose your correct account type</h1>
    <h3>If you want to work choose Frelancher or choose Client if you want to hire Frelancher.</h3>
    <button class="button button2" id="Btn2">Client </button>
    <button class="button button2" id="Btn3">Freelancer</button>
  	</div> -->




  <?php
include('footer.php');
 ?>

  <!--------------------------------modal for login---------------------------------------->

    <div id="modal1" class="modal">
  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal1').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      
    </div>
  </form>
</div>

<!---------------------------------Another model for signup-------------------------------------->

    <div  id="modal2" class="modal">
    	<form class="modal-content animate" action="signup.php" method="post">
    		<div class="imgcontainer">
      <span onclick="document.getElementById('modal1').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Sign me up</button>
      
    </div>
  </form>
    </div>


    <script>

var btn1 = document.getElementById("Btn1");
var btn2 = document.getElementById("Btn2");
var btn3 = document.getElementById("Btn3");


var span = document.getElementsByClassName("close")[0];



btn1.onclick = function() {
  location.href='index.php';
}
btn2.onclick = function() {
  location.href='freelancer.php';
}
btn3.onclick = function() {
   location.href='client.php';
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

  
</body>
</html>
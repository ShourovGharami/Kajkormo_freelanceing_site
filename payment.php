<html>
<head>
  <title>কাজকর্ম</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">

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
<script>

var btn1 = document.getElementById("Btn1");



var span = document.getElementsByClassName("close")[0];



btn1.onclick = function() {
  location.href='clienthome.php';
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




        <style>
              .payment img  {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 500px;
                    }
                  
            </style>

            <div class="payment">

            <img src="images/payment.png" width="700" height="1000" alt="payment">
            </div>


<?php
include('footer.php');
 ?>
  <!--------------------------------modal for login---------------------------------------->

   

<!---------------------------------Another model for signup-------------------------------------->

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
  
  
</body>
</html>
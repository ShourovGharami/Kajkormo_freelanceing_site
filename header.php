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
  location.href='index.php';
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
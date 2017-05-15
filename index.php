<?php 
	session_start();

if (isset($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
}
if (!(isset($_SESSION['lang']))) {
$_SESSION['lang'] = "en";
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
</head>
<body>
	<div style="position:fixed;top:30%;">
		<div class="dropdown">
			<button onclick="languageDropdown()" class="languageDropdown">Language</button>
			<div id="languageDropdown" class="dropdownContent">
				<a href="?lang=en">English</a><br>
				<a href="?lang=fr">Francais</a><br>
				<a href="?lang=zh">普通话</a>
			</div>
		</div>
	</div>
	<div class="university-footer">
		<img src="footer.png" />
	</div>
</body>
</html>

<script>
function languageDropdown() {
    document.getElementById("languageDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.languageDropdown')) {

    var dropdowns = document.getElementsByClassName("dropdownContent");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
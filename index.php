<?php 
	session_start();

if (isset($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
	header('Location: home.html');
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
	<div style="position:fixed;top:30%;margin:auto;width:100%;text-align:center;">
		<h1> Select a language: </h1>
		<select onchange="location = this.value;">
			<option></option>
			<option value="?lang=en">English</option>
			<option value="?lang=fr">Francais</option>
			<option value="?lang=zh">普通话</option>
		<select>
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
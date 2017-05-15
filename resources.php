<?php
	session_start();
	
$footer= simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the footer xml data!");
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
</head>
<body>
	<h1>Resources</h1>
	<div class="university-footer navLinks">
		<a href="home.php"><?php echo $footer->home->__toString(); ?></a>
		|
		<a href="about.php"><?php echo $footer->about->__toString(); ?></a>
		|
		<a href="modules.php"><?php echo $footer->modules->__toString(); ?></a>
		|
		<a href="resources.php"><?php echo $footer->resources->__toString(); ?></a>
		|
		<a href="quiz.php"><?php echo $footer->quiz->__toString(); ?></a>
	</div>
</body>
</html>
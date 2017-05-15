<?php
	session_start();

$xml= simplexml_load_file("Resources/home_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the home xml data!");

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
	<title><?php echo $xml->title->__toString(); ?></title>
</head>
<body>
	<img src=<?php echo '"Assets/' . $xml->images->logo->__toString() . '"'; ?>>
	<div class="buttons">
		<a href="about.php">
			<button class="home"><?php echo $xml->buttons->about->__toString(); ?></button>
		</a>
		<a href="/modules.php">
			<button class="home"><?php echo $xml->buttons->modules->__toString(); ?></button>
		</a>
		<a href="/resources.php">
			<button class="home"><?php echo $xml->buttons->resources->__toString(); ?></button>
		</a>
		<a href="/quiz.php">
			<button class="home"><?php echo $xml->buttons->quiz->__toString(); ?></button>
		</a>
		<a href="/project.php">
			<button class="home"><?php echo $xml->buttons->project->__toString(); ?></button>
		</a>		
	</div>
	<div class="university-footer">
		<img src=<?php echo '"Assets/' . $xml->images->footer->__toString() . '"'; ?> />
	</div>
</body>
</html>
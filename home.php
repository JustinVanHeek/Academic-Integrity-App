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
<div class="button-container">
		<div class="button">
			<a href="/about.php">
				<?php echo $xml->buttons->about->__toString(); ?>
			</a>
		</div>
		<div class="button">
			<a href="/modules.php">
				<?php echo $xml->buttons->modules->__toString(); ?>
			</a>
		</div>
		<div class="button">
			<a href="/resources.php">
				<?php echo $xml->buttons->resources->__toString(); ?>
			</a>
		</div>
		<div class="button">
			<a href="/quiz.php">
				<?php echo $xml->buttons->quiz->__toString(); ?>
			</a>
		</div>
		<div class="button">
			<a href="/project.php">
				<?php echo $xml->buttons->project->__toString(); ?>
			</a>
		</div>
</div>
	<div class="university-footer">


<script>
var button = document.getElementsByClassName("button");
var i;
for (i = 0; i < button.length; i++) {
	setHeight(button[i]);
	fitText(button[i]);
}
function setHeight(element) {
	var width = element.clientWidth;
	element.style.height = (width/3) + "px";
}
function fitText(element) {
	var fontSize = parseFloat(window.getComputedStyle(element, null).getPropertyValue('font-size'));
	var height = element.clientHeight;
	var width = element.clientWidth;
	while (fontSize > height*0.6) {
		fontSize = fontSize - 5;
		element.style.fontSize = fontSize + "px";
	}
}
</script>

		<img src=<?php echo '"Assets/' . $xml->images->footer->__toString() . '"'; ?> >
	</div>


</body>



</html>	
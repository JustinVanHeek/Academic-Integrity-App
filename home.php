<?php
	session_start();

$xml= simplexml_load_file("Resources/home_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the home xml data!");

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="ais.css">
	<title><?php echo $xml->title->__toString(); ?></title>
</head>
<body>
	<img src=<?php echo '"Assets/' . $xml->images->logo->__toString() . '"'; ?> class="logo">
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
<div class="footer-margin">

</div>
	<div class="university-footer">
		<img src=<?php echo '"Assets/' . $xml->images->footer->__toString() . '"'; ?> style="width:100%;height:auto;">
	</div>

<script>

$(window).bind("load", function() { 

var footerMargin = document.getElementsByClassName("footer-margin");
var footer = document.getElementsByClassName("university-footer");
footerMargin[0].style.height = parseFloat(footer.clientHeight) + "px";

function setButtonSize() {
var button = document.getElementsByClassName("button");
var i;
var smallestFont = 1000;
for (i = 0; i < button.length; i++) {
	setHeight(button[i]);
	fitText(button[i]);
}
for (i = 0; i < button.length; i++) {
	button[i].style.fontSize = smallestFont + "px";
}
function setHeight(element) {
	var width = element.clientWidth;
	element.style.height = (width/3) + "px";
}
function fitText(element) {
	var fontSize = parseFloat(window.getComputedStyle(element, null).getPropertyValue('font-size'));
	var height = element.clientHeight;
	var width = element.clientWidth;

//Adjust font size based on height
	while (fontSize > height) {
		fontSize = fontSize - 1;
		element.style.fontSize = fontSize + "px";
	}

//Adjust font size based on width
var canvas =  document.createElement("canvas");
var context=canvas.getContext("2d");
context.font= fontSize + "px Arial";
var txt = element.textContent || element.innerText;
var fontWidth = context.measureText(txt).width;
while (fontWidth > width) {
	fontSize = fontSize - 1;
	element.style.fontSize = fontSize + "px";
	context.font= fontSize + "px Arial";
	fontWidth = context.measureText(txt).width*0.8;
}

	if (fontSize < smallestFont) {
		smallestFont = fontSize;
	}
}
}
setButtonSize();

while ($(document).height() > $(window).height() ) {
	resize();
}

function resize() {
	var button = document.getElementsByClassName("button");
	var logo = document.getElementsByClassName("logo");
	for (i = 0; i < button.length; i++) {
		button[i].style.width = parseFloat(button[i].clientWidth)*0.9 + "px";
		button[i].style.height = parseFloat(button[i].clientHeight)*0.9 + "px";

	}
		logo[0].style.width = parseFloat(logo[0].clientWidth)*0.9 + "px";
		logo[0].style.height = parseFloat(logo[0].clientHeight)*0.9 + "px";
setButtonSize();
}

});
</script>

</body>



</html>	
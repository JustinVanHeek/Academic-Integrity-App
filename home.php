<?php
	session_start();

$xml= simplexml_load_file("Resources/home_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the login xml data!");

function getTitle() {
	echo $xml->title->__toString();
}
function getLogo() {
	echo '"' . $xml->logo->__toString() . '"';
}
function getAbout() {
	echo $xml->buttons->about->__toString();
}
function getModules() {
	echo $xml->buttons->modules->__toString();
}
function getResources() {
	echo $xml->buttons->resources->__toString();
}
function getQuiz() {
	echo $xml->buttons->quiz->__toString();
}
function getProject() {
	echo $xml->buttons->project->__toString();
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
	<title><?php getTitle(); ?></title>
</head>
<body>
	<img src=<?php getLogo(); ?>/>
	<div class="buttons">
		<a href="about.html">
			<button class="home"><?php getAbout(); ?></button>
		</a>
		<a href="/modules.html">
			<button class="home"><?php getModules(); ?></button>
		</a>
		<a href="/resources.html">
			<button class="home"><?php getResources(); ?></button>
		</a>
		<a href="/quiz.html">
			<button class="home"><?php getQuiz(); ?></button>
		</a>
		<a href="/project.html">
			<button class="home"><?php getProject(); ?></button>
		</a>		
	</div>
	<div class="university-footer">
		<img src="Assets/footer.png" />
	</div>
</body>
</html>
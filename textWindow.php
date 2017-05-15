<?php
session_start();


$module = simplexml_load_file("Resources/Modules/" . $_SESSION['module'] . "_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");
$section = $module->section[intval($_SESSION['page'])];
$footer = simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");


if (isset($_GET['prev'])) {
	goToPrevPage();
}
else if (isset($_GET['next'])) {
	goToNextPage();
}

function getSectionName() {
	global $section;
	$name = $section->name;
	echo $name;
}
function getBodyText() {
	global $section;
	$bodyText = $section->body;
	echo $bodyText;
}
function goToPrevPage() {
	global $module;
	$_SESSION['page'] = intval($_SESSION['page'])-1;
	if(intval($_SESSION['page']) < 0) {
		header("Location: /menu.php");
	}
	else {
	$prevSectionType = $module->section[intval($_SESSION['page'])]['type'];
	switch ($prevSectionType) {
		case 'text':
			header("Location: /textWindow.php");
			break;
		case 'video':
			header("Location: /videoWindow.php");
			break;
		case 'quiz':
			header("Location: /quizWindow.php");
			break;
		default:
			header("Location: /menu.php");
	}
	}
}

function goToNextPage() {
	global $module;
	$_SESSION['page'] = intval($_SESSION['page'])+1;
	$nextSectionType = $module->section[intval($_SESSION['page'])]['type'];
	switch ($nextSectionType) {
		case 'text':
			header("Location: /textWindow.php");
			break;
		case 'video':
			header("Location: /videoWindow.php");
			break;
		case 'quiz':
			header("Location: /quizWindow.php");
			break;
		default:
			header("Location: /modules.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="ais.css">
	<title><?php getSectionName(); ?></title>
</head>
<body>
	<div style="position:fixed;top:10%;text-align:center;">
		<?php getBodyText(); ?>
		<br>
		<a href="?prev=true">
			<img style="display:inline;height:auto;max-width:40%;" src="Assets/backArrow.png">
		</a>
		<a href="?next=true;">
			<img style="display:inline;height:auto;max-width:40%;" src="Assets/forwardArrow.png">
		</a>
	</div>
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
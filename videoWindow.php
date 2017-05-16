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
function getVideo() {
	global $section;
	$video = $section->video;
	echo '"'. $video . '"';;
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
<style>
.video-box {

}
.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:0;
	left: 0;
	width:100%;
	height:100%;
}

</style>

	<link rel="stylesheet" href="ais.css">
	<title><?php getSectionName(); ?></title>
</head>
<body>
	<div style="position:fixed;top:0;text-align:center;margin:auto;right:0;left:0;bottom:50px; border: 5px solid red;">
		<div class="video-container" id="video"><iframe src=<?php getVideo(); ?>></iframe></div>
		<br>
		<a href="?prev=true">
			<img style="position:relative;display:inline;height:auto;max-width:40%;" src="Assets/backArrow.png">
		</a>
		<a href="?next=true;">
			<img style="position:relative;display:inline;height:auto;max-width:40%;" src="Assets/forwardArrow.png">
		</a>
<script>
var h = window.innerHeight;
var video = document.getElementById("video");
while (video.clientHeight > h - 200) {
	video.style.paddingBottom = (parseFloat(window.getComputedStyle(video, null).getPropertyValue('padding-bottom')) - 30) + "px";
}
</script>
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
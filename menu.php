<?php
session_start();

$_SESSION['page'] = "0";
$module = simplexml_load_file("Resources/Modules/" . $_SESSION['module'] . "_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");
$footer = simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");


if (isset($_GET['s'])) {
	goToSection($_GET['s']);
}
function goToSection($page) {
	global $module;
	$sectionType = $module->section[intval($page)]['type'];
	$_SESSION['page'] = $page;
	switch ("" . $sectionType) {
		case "text":
			header("Location: /textWindow.php");
			break;
		case 'video':
			header("Location: /videoWindow.php");
			break;
		case 'quiz':
			header("Location: /quizWindow.php");
			break;
		default:
			header("Location: /home.php");
	}
}


function getModuleName() {
	global $module;
	$name = $module->name;
	echo $name;
}

function createButton($section,$i) {
	$name = $section->name;
	echo '<a href="?s=' . $i . '"><button class="home" style="width:80%">' . $name . '</button></a>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
</head>
<body>
<div style="position:fixed;top:10%;margin:auto;width:100%;text-align:center;">
<?php
$i = 0;
foreach ($module->section as $section) {
	createButton($section,$i);
	$i = $i + 1;
}
?>
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
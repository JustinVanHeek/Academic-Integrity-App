<?php
	session_start();

$xml = simplexml_load_file("Resources/Modules/modulelist.xml") or die("Error: Could not load the module xml data!");
$footer = simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");

if (isset($_GET['m'])) {
	goToModule($_GET['m']);
}
function goToModule($index) {
	$moduleFile = getModuleFile($index);
	$_SESSION['module'] = $moduleFile->__toString();
	header("Location: /menu.php");
}

function getModuleFile($index) {
	global $xml;
	$moduleFile = $xml->module[intval($index)];
	return $moduleFile;
}
function getModule($index) {
	$moduleFile = getModuleFile($index);
	$module = simplexml_load_file("Resources/Modules/" . $moduleFile . "_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the module xml data!");
	return $module;
}
function createButton($i) {
	$name = getModule($i)->name;
	echo '<a href="?m=' . $i . '"><button class="home" style="width:80%">' . $name . '</button></a>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
</head>
<body>
<div style="position:fixed;top:30%;margin:auto;width:100%;text-align:center;">
<?php
$i = 0;
foreach ($xml->module as $module) {
	createButton($i);
	$i++;
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
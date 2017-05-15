<?php
	session_start();
$xml = simplexml_load_file("Resources/quiz_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the quiz xml data!");
$footer= simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the footer xml data!");

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
</head>
<body>
	<h1><?php echo $xml->title->__toString(); ?></h1>
	<p><?php echo $xml->body->__toString(); ?></p>
	<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
		<?php 
		$i = 1;
		foreach($xml->questions->question as $question) {
			echo '<h4>' . $question->text . '</h4>';
			foreach($question->options->option as $option) {
				echo '<input type="radio" name="q' . $i . '">' . $option->answer . '</input><br>';
			}
		}
		?>
		<br>
		<input type="submit">
	</form>


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
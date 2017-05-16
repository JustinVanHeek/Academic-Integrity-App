<?php
	session_start();
$xml = simplexml_load_file("Resources/quiz_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the quiz xml data!");
$footer= simplexml_load_file("Resources/footer_" . $_SESSION['lang'] . ".xml") or die("Error: Could not load the footer xml data!");

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ais.css">
	<script>
		function showExplanation(questionID) {
			var explanations = document.getElementsByClassName("explanation");
			for (var i = 0; i < explanations.length; i++) {
				if (explanations[i].style.display != 'none') {
					explanations[i].style.display = 'none';
				}
			}
			document.getElementById(questionID).style.display = 'block';
		}
	</script>
</head>
<body>
	<h1><?php echo $xml->title->__toString(); ?></h1>
	<p><?php echo '<pre>' . $xml->body->__toString() . '</pre>'; ?></p>
	<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
		<?php 
		$i = 1;
		foreach($xml->questions->question as $question) {
			$j = 1;
			echo '<h4>' . $question->text . '</h4>';
			foreach($question->options->option as $option) {
				echo str_replace("\'", "'", '<input type="radio" name="q' . $i . '" id="' . $i . '.' . $j . '" onclick="showExplanation(\'ex'. $i . '.' . $j . '\');">' . $option->answer . '</input><br>');
				$j++;
			}
			$j = 1;
			echo '<br>';
			foreach($question->options->option as $option) {
				echo '<div class="explanation" id="ex' . $i . '.' . $j . '"><pre>' . $option->explanation . '</pre></div>';
				$j++;
			}
			$i++;

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
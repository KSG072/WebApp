<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
		if (!(isset($_POST["name"])&&isset($_POST["id"])&&isset($_POST["c"])&&isset($_POST["grade"])&&isset($_POST["card"])&&isset($_POST["cardnum"]))) {
			if (preg_match("/[\s]+/",$_POST["name"])||preg_match("/[\s]+/",$_POST["id"])||preg_match("/[\s]+/",$_POST["cardnum"])) {
		?>
			    <h1>Sorry</h1>
			    <p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		}} elseif (!preg_match("/^[a-zA-Z\s\-]+$/", $_POST["name"])) { 
		?>
			<h1>Sorry</h1>
		    <p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>
		<?php
		} elseif (!((preg_match("/4[0-9]{15}/", $_POST["cardnum"])&&$_POST["card"]=="Visa")||(preg_match("/5[0-9]{15}/", $_POST["cardnum"])&&$_POST["card"]=="MasterCard"))) {
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>
		<?php
		} else {
		?>
		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		<ul> 
			<li>Name: <?= $_POST["name"] ?></li>
			<li>ID: <?= $_POST["id"] ?></li>
			<li>Course: <?= processCheckbox($_POST["c"]) ?></li>
			<li>Grade: <?= $_POST["grade"] ?></li>
			<li>Credit Card: <?= $_POST["cardnum"] ?> (<?= $_POST["card"] ?>)</li>
		</ul>
			<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			$info = array($_POST["name"],$_POST["id"],$_POST["cardnum"],$_POST["card"]);
			file_put_contents($filename,"\n".implode(";",$info), FILE_APPEND)
		?>
		<?php
			$text = file("loosers.txt");
			foreach($text as $line){
				print "<pre>$line</pre>";
			}
		}
		?>
		<?php
			function processCheckbox($names){
				$result = implode(", ", $names);
				return $result;
			}
		?>
	</body>
</html>

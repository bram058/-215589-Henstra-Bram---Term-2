<!DOCTYPE html>
<html>
<style>

body{
	background-color: black;
	font-family: monospace;
	color: white;
	font-size: 20px;
}

#rcorners1 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 30px;
		text-align: center;
		color: white;
		font-size: 30px;
	}

	#rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 80px;
		position: absolute;
		font-family: monospace;
		color: white;
		text-align: left;
		left: 10px;
    top: 100px;
	}

	#rcorners3 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 500px;
    height: 45px;
		position: absolute;
		font-family: monospace;
		font-size: 35px;
		color: white;
		text-align: center;
		left: 500px;
    top: 300px;
	}

</style>
<head>
	<title>Quiz</title>
</head>
<body>
	<?php
		require_once 'CSV.class.php';

		//quiz.php?q=1
		//quiz.php

		if (isset($_GET["q"]))
		{
			$question_id = $_GET["q"];
		}

		else
		{
			$question_id = 1;
		}

		if ($question_id == 0)
		{
			echo "Something wrong";
		}

		else if ($question_id < 0)
		{
			echo "<p id=\"rcorners3\">You've completed the quiz</p>";
		}

		else
		{
			$csv = new CSV("list.csv");

			$question = $csv->get_cell($question_id, 1);
			$id_no = $csv->get_cell($question_id, 2);
			$id_yes = $csv->get_cell($question_id, 3);
			$id_dunno = $csv->get_cell($question_id, 4);

			echo "<p id=\"rcorners1\">$question</p>";
			echo "<p id=\"rcorners2\">";
			echo "<a href=\"quizflat.php?q=$id_yes\"><button>Yes</button></a><br>";
			echo "<a href=\"quizflat.php?q=$id_no\"><button>No</button></a><br>";
			echo "<a href=\"quizflat.php?q=$id_dunno\"><button>I don't know</button></a><br>";
			echo "</p>";
		}

	?>

</body>
</html>

<!doctype html>
<html>

<head>
	<title> Form Results </title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>

	<div id = "header">
		<div id = "title">
			<h1> Form Results </h1>
		</div>

		<?php include "components/nav.php"; ?>
	</div>

	<br>

	<div id = "submission_msg">

		<?php
			if(isset($_POST["rate"])){
				$nameempty = empty($_POST["name"]);
				$ratingempty = empty($_POST["rating"]);
				$commentempty = empty($_POST["comment"]);
				if($nameempty){
					echo "<p>\n";
					echo "\t\t\tYou submitted a review without specifying the anime being reviewed.\n";
					echo "\t\t\t<br>\n";
					echo "\t\t\tPlease choose an anime title before submitting.\n";
					echo "\t\t</p>\n";
				}
				if($ratingempty){
					echo "\t\t<p>\n";
					echo "\t\t\tYou submitted a review without rating the anime.\n";
					echo "\t\t\t<br>\n";
					echo "\t\t\tPlease rate the anime before submitting.\n";
					echo "\t\t</p>\n";
				}
				if ($commentempty){
					echo "\t\t<p>\n";
					echo "\t\t\tYou submitted an empty review.\n";
					echo "\t\t\t<br>\n";
					echo "\t\t\tPlease write a review before submitting.\n";
					echo "\t\t</p>\n";
				}
				if(!$nameempty && !$ratingempty && !$commentempty){
					//displays input on different page
					echo "<p>\n";
					echo "\t\t\tYou rated <b>".($_POST["name"])."</b>\n";
					echo "\t\t\t<br>\n\t\t\tYou have given this anime a rating of <b>".($_POST["rating"])." / 10</b>\n";
					echo "\t\t\t<br><br>\n\t\t\tYour comments on this anime are:\n";
					echo "\t\t\t<br>\n\t\t\t<b>".($_POST["comment"])."</b>\n";
					echo "\t\t\t<br><br>\n\t\t\tThank you for your review!\n";
					echo "\t\t</p>\n";

					//emails inputs to website creator
					$to = "finaluprising95@hotmail.com";
			   		$subject = "Form submission";
					$message = "A visitor rated ".($_POST["name"])." with a score of ".($_POST["rating"])." / 10.\nThe visitor also said in his review that ".($_POST["comment"]).".";
			    	mail($to,$subject,$message);
				}
			}
			else if(isset($_POST["suggest"])){
				if (empty($_POST["suggestion"])){
					echo "<p>\n";
					echo "\t\t\tYou submitted an empty suggestion.\n<br>\n";
					echo "\t\t\tPlease write a suggestion before submitting.\n";
					echo "\t\t</p>\n";
				}
				else{
					//displays input on different page
					echo "<p>\n";
					echo "\t\t\tYou have suggested for <b>".($_POST["suggestion"])."</b> to be added to this site.\n";
					echo "\t\t\t<br><br>\n\t\t\tThank you for your input!\n";
					echo "\t\t</p>\n";

					//emails inputs to website creator
					$to = "finaluprising95@hotmail.com"; // this is your Email address
			   		$subject = "Form submission";
					$message = "A visitor suggested ".($_POST["suggestion"]).".";
			    	mail($to,$subject,$message);
				}
			}
			else{
				echo "<p>\n";
				echo "\t\t\tSubmitted an incomplete review or suggestion.\n";
				echo "\t\t\t<br>\n\t\t\tPlease go back and fill everything out before submitting.\n";
				echo "\t\t</p>\n";
			}
		?>
	</div>

	<br>

</body>
</html>
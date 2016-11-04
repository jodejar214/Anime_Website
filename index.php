<!doctype html>
<html>

<head>
	<title> jao57 p1 </title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>

	<div id = "header">
		<div id = "title">
			<h1> John's Anime Website Homepage </h1>
		</div>

		<?php 
			include "components/nav.php"; 
		?>
	</div>

	<div id = "content">

		<div id = "intro">
			<p> Welcome to this website dedicated to giving its visitors information on anime. Anime are animated shows made in Japan and have become popular sources of entertainment throughout the world. Even though they are made in Japan, many anime have become renowned in other countries like the United States, France, and China. While some animes are made as original stories, others are adapted from games, visual novels, manga (Japanese comics), and light novels. In this site, I will present some of my favorite anime in hopes of getting more people interested in these shows or anime in genral.  For more information on the anime I talk about on this website as well as many others, please visit <a class = "in_text" href = "http://myanimelist.net/">MyAnimeList</a>.</p>
		</div>

		<br>
		
		<div id = "list">
			<p><b> Here are some famous anime you may have heard of: </b></p>
			<div id = "tlist">
				<ul>
					<li>Pokemon</li>
					<li>Dragonball Z</li>
					<li>Digimon</li>
					<li>Yugioh</li>
					<li>Sailor Moon</li>
					<li>Beyblade</li>
					<li>Naruto</li>
					<li>One Piece</li> 
					<li>Death Note</li>
					<li>Attack on Titan</li>
					<li>Fullmetal Alchemist</li>
					<li>Bleach</li>
					<li>Inuyasha</li>
				</ul>
				<div class = "cell">
					<img class = "limg" src = "images/pokemon.jpg" alt = "Pokemon"><br>
					<a class = "ilinks" href ="http://cdn.myanimelist.net/images/anime/3/2615.jpg"> http://cdn.myanimelist.net/<br>images/anime/3/2615.jpg </a>
				</div>
				<div class = "cell">
					<img class = "limg" src = "images/dragonball.jpg" alt = "Dragonball Z"><br>
					<a href ="http://cdn.myanimelist.net/images/anime/6/20936.jpg"> http://cdn.myanimelist.net/<br>images/anime/6/20936.jpg </a>
				</div>
				<div class = "cell">
					<img class = "limg" src = "images/digimon.jpg" alt = "Digimon"><br>
					<a href ="http://cdn.myanimelist.net/images/anime/7/50959.jpg"> http://cdn.myanimelist.net/<br>images/anime/7/50959.jpg </a>
				</div>
			</div>
		</div>

		<br>


		<!--create table of anime information-->
		<div id = "main_tableDiv">
			<p><b> Here is a table with information on some of my favorite anime: </b><br>
				<i>Click on the title of the anime you want to know more about to get more information.</i></p>
			<table id = "anitable">
				<thead>
					<tr class = "main_header">
						<th> Anime Title </th>
						<th> Genre </th>
						<th> Series Length </th>
						<th> Media Source </th>
					</tr>
				</thead>
				<tbody class = "tbody">
					<?php
						//sets jQuery functionality of buttons to toggle display of images
						function jCode($info){
							echo "<script>\n";
							echo "\t\t\t\t\t\tjQuery(document).ready(function(){\n";
							echo "\t\t\t\t\t\t\tjQuery('#hideshow".$info->num."').on('click', function(event) { \n";
							echo "\t\t\t\t\t\t\t\tjQuery('.anime_img".$info->num."').toggle('show');\n";
							echo "\t\t\t\t\t\t\t});\n";
							echo "\t\t\t\t\t\t});\n";
							echo "\t\t\t\t\t</script>\n\n";
						}

						//puts data into the table
						function createTableData($info){
							echo "\t\t\t\t\t<tr>\n";
							echo "\t\t\t\t\t<td><a class = 'anititle' href = '".$info->link."'>".$info->title."</a>\n";
							echo "\t\t\t\t\t<br>\n";
							echo "\t\t\t\t\t<div class = 'anime_img".$info->num."'>\n";
					        echo "\t\t\t\t\t<img src = '".$info->image."' alt = '".$info->title."'>\n";
					        echo "\t\t\t\t\t<br>\n";
					        echo "\t\t\t\t\t<a class = 'tlinks' href = '".$info->url1.$info->url2."'>".$info->url1."<br>".$info->url2."</a>";
					        echo "\t\t\t\t\t</div>\n";
					        echo "\t\t\t\t\t<input type='button' id='hideshow".$info->num."' value='Show/Hide Image'></td>\n";
					       	echo "\t\t\t\t\t<td>".$info->genre1."<br>".$info->genre2."</td>\n";
					       	echo "\t\t\t\t\t<td>".$info->length."</td>\n";
					       	echo "\t\t\t\t\t<td>".$info->source."</td>\n";
					       	echo "\t\t\t\t\t</tr>\n\n";
						}

						//creates a large table with the data loaded from an xml file
						function createTable($file){
							foreach($file->anime as $ani_info){
								jCode($ani_info);
								createTableData($ani_info);
							}
						}

						//loads xml file and creates table from it
						$xml=simplexml_load_file("xml/anitable.xml") or die("Error: Cannot create object");
						createTable($xml);
					?>
				</tbody>
			</table>
		</div>
		

		<br>

		<!--creates suggestion form with text input-->
		<div id = "sform">
			<p class = "form_header">If you want to see a certain anime on this site, <br> please make a suggestion.</p>
			<form id="suggest_form" action="result.php" method="POST">
			    <input type = "text" name = "suggestion" size = "30" placeholder = "Type your suggestion here...">
				<br><br>
			    <input type="submit" name = "suggest" value="Make a Suggestion">
			</form>
		</div>

		<br>

		<!--creates rating form with two option menus and a textarea input-->
		<?php
			//array of anime that goes into first options list
			$rateAnime = array(
				"Aldnoah.Zero",
				"Code Geass",
				"Fairy Tail",
				"Fate/Stay Night: Unlimited Blade Works",
				"Hataraku Maou-Sama",
				"Nagi no Asukara",
				"Sakurasou no Pet na Kanojo",
				"Shokugeki no Souma",
				"To Aru Majutus no Index",
				"Yahari Ore no Seishun Love Comedy wa Machigatteiru"
			);

			//array of rating values for second options list
			$ratings = array(
				"10 (Masterpiece)",
				"9 (Great)",
				"8 (Very Good)",
				"7 (Good)",
				"6 (Fine)",
				"5 (Average)",
				"4 (Bad)",
				"3 (Very Bad)",
				"2 (Horrible)",
				"1 (Appalling)"
			);

			//creates the options list based off which array it takes in
			function createOptions($oplist){
				$len = count($oplist);
				for($i = 0; $i < $len; $i++){
					if(in_array("Fairy Tail", $oplist)){
						if($i === 0){
							echo "<option value = '".$oplist[$i]."'>".$oplist[$i]."</option>\n";
						}
						else{
							echo "\t\t\t\t<option value = '".$oplist[$i]."'>".$oplist[$i]."</option>\n";
						}
					}
					else{
						$rate = 10 - $i;
						if($i === 0){
							echo "<option value = '".$rate."'>".$oplist[$i]."</option>\n";
						}
						else{
							echo "\t\t\t\t<option value = '".$rate."'>".$oplist[$i]."</option>\n";
						}
					}
				}
			}
		?>

		<div id = "rform">
			<p class = "form_header">If you watched an anime that is on this site, please rate and review it.</p>
			<form id="rating_form" action="result.php" method="POST">
			    <label>Anime Title: </label>
			    <br>
			    <select name = "name">
			    	<option disabled selected>--Select an Anime Title--</option>
			    	<?php 
			    		createOptions($rateAnime);
			    	?>
			    </select>

			    <br><br>
			    
			    <label>On a scale of 1 to 10, how good was the anime?</label>
			    <br>
			    <select name = "rating">
			    	<option disabled selected>--Select a Score--</option>
			    	<?php
			    		createOptions($ratings);
			    	?>
			    </select>

			    <br><br>
				
				<textarea name = "comment" cols = "50" placeholder = "Type your review here..."></textarea>
				<br><br>
			    
			    <input type="submit" name = "rate" value="Rate an Anime">
			</form>
		</div>
	</div>

</body>

</html>
<?php
	//get directory of current page to set url of links
	$currentPage = basename($_SERVER['PHP_SELF']);
	$indexLink = "";
	$animeLink = "";
	if($currentPage == "index.php" || $currentPage == "result.php"){
		$animeLink = "pages/";
	}
	else{
		$indexLink = "../";
	}

	//array of anime and links to respective page
	$navAnime = array(
		"Aldnoah.Zero" => "aldnoah.php",
		"Nagi no Asukara" => "nagi_no_asukara.php",
		"To Aru Majutus no Index" => "majutsu.php",
		"Shokugeki no Souma" => "shokugeki.php",
		"Hataraku Maou-Sama" => "maou.php",
		"Fairy Tail" => "fairy_tail.php",
		"Sakurasou no Pet na Kanojo" => "sakurasou.php",
		"Fate/Stay Night: Unlimited Blade Works" => "fate.php",
		"Code Geass" => "code_geass.php",
		"Yahari Ore no Seishun Love Comedy wa Machigatteiru" => "yahari.php"
	);

	//sorts array by keys then switches the keys and values so that it
	//can split the array alphabetically by anime title
	ksort($navAnime);
	$flip = array_flip($navAnime);
	$navAnimeAM = preg_grep("/^[A-M]/i", $flip);
	$navAnimeNZ = preg_grep("/^[N-Z]/i", $flip);
?>

<div id = "links">
	<div class = "link_table">
		<ul>
			<li><a href = "<?php echo $indexLink;?>index.php"> Home </a></li> 
			<li><a href = ""> Anime (A - M) </a>
				<ul>
					<?php
						foreach($navAnimeAM as $link => $title){
							echo "<li><a href = '".$animeLink.$link."'>".$title."</a></li> ";
						}
					?>
				</ul>
			</li>
			<li><a href = ""> Anime (N - Z) </a>
				<ul>
					<?php
						foreach($navAnimeNZ as $link => $title){
							echo "<li><a href = '".$animeLink.$link."'>".$title."</a></li> ";
						}
					?>
				</ul>
			</li>
			<li><a href = "<?php echo $indexLink;?>index.php#rform"> Forms </a></li>
		</ul>
	</div>
</div>
<?php session_start(); 
ini_set('display_errors', '1');?>
<!DOCTYPE html>
<!-- 
Any place I have an empty comment means we need to edit

Please feel free to change the css (or anything really).  I did try to keep the css "dynamic" so when
you re-size the webpage everything isn't overlapping and thrown around
-->

<html lang="en">

<head>
	<title>Game Group - Top Games</title>
	<!---->
	<meta charset="UTF-8">
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="" type="image/png" rel="shortcut icon" />
	<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body onload="callAPI()">
		<script>
		
		function callAPI(){
		
		//$(document).ready(function(){
		
 //$=jQuery.noConflict();
			//alert("here");
 //$.get("http://ec2-54-88-99-94.compute-1.amazonaws.com:2000/steam/gameTop", function (data, textStatus, jqXHR) {
			 	//alert("here");
	var node = document.getElementById('news');
	var jsonData = "{'1_type':'Fortnite: Battle RoyaleGrand Theft Auto VTom Clancy's Rainbow Six SiegeOverwatchPlayerUnknown's BattlegroundsMinecraftLeague Of LegendsRocket LeagueRobloxSuper Mario OdysseyCounter-Strike: Global OffensiveThe Legend Of Zelda: Breath Of The WildBattlefield 1Call Of Duty: Black Ops IICall of Duty: Black Ops IIIICall Of Duty: WWIIFIFA 18Super Smash Bros. For Wii UAssassin's Creed OriginsThe Elder Scrolls V: SkyrimDestiny 2Call Of Duty: Black Ops IIIStar Wars Battlefront IIFallout 4Call Of Duty: Black OpsArk: Survival EvolvedSplatoon 2World Of WarcraftSuper Smash Bros. MeleeGod Of WarTerrariaNBA 2K18Minecraft Pocket EditionClash RoyaleFar Cry 5Pac-ManPlants Vs. ZombiesPortalThe Sims 4Mortal Kombat XFriday The 13th: The GameForza Horizon 3Dead By DaylightUndertaleDetroit: Become HumanFive Nights At Freddy'sHalo 5: GuardiansPlants Vs. Zombies Garden Warfare 2Just Cause 3_'}";
	//var jsonData = JSON.stringify(data);
	jsonData = jsonData.replace(/"|}/g, '');
	var answer = jsonData.split(/(\B[a-z](?=[A-Z])|[1-9](?=[A-Z])|[V](?=[A-Z]))/g);
	var k = 1;

	for (var i =0; i<answer.length; i += 2){
		if (i ==0){
			answer[i] = answer[i].substring(answer[i].indexOf("':'")+3, answer[i].length);
		}
		node.innerHTML += "<div class='feedNews'><h4>" +k+ ":" + answer[i] + answer[i+1] +"</h4></div>";
		k += 1;
	}
//});	
//});		
}
</script>
<?php include("mainBar.php"); ?>
<div id="sidebar">
			This area for pages <br /><br />
			<a href=index.php>Main</a><br />
			<a href=games.php>Games</a><br />
			<a href=forum.php>Forum</a><br />
			<a href=aboutUs.php>About Us</a><br />
		</div>
		
		<h1 class='innerHeader'>&nbspTop Games (Refreshes Daily)</h1>
		<div id="mainPageFeed">
			
			<div id="news"> </div>
			
			</div>
</body>
</html>

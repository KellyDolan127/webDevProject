<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Games</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link href="" type="image/png" rel="shortcut icon" /><!---->
		<script type="text/javascript" src=""></script><!---->
    </head>
<body>
<?php include("mainBar.php"); ?>
<div id="sidebar">
			This area for pages <br /><br />
			<a href=index.php>Main</a><br />
			<a href=games.php>Games</a><br />
			<a href=forum.php>Forum</a><br />
			<a href=aboutUs.php>About Us</a><br />
		</div>
		<div id="rankTable">
			<h1>Ranking Table for Games</h1>
			<table>
				<thead>
					<tr>
						<th>Trending Rank</th>
						<th>Game</th>
						<th>Game Description</th>
					</tr>
				</thead>
				<tr>
					<td><center>1</center></td>
					<td>Fortnite</td>
					<td></td>
				</tr>
				<tr>
					<td><center>2</center></td>
					<td>Counter Strike: Global Offensive</td>
					<td>Counter-Strike: Global Offensive is an online tactical first-person shooter developed by Valve Corporation 
						and Hidden Path Entertainment, who also maintained Counter-Strike: Source after its release. It is the 
						fourth game in the main Counter-Strike franchise. Counter Strike Global Offensive was released on 
						August 21, 2012<a href="https://en.wikipedia.org/wiki/Counter-Strike:_Global_Offensive">...more</a></td>
				</tr>
				<tr>
					<td><center>3</center></td>
					<td>League of Legends</td>
					<td>League of Legends is a multiplayer online battle arena video game developed 
						and published by Riot Games for Microsoft Windows and Mac OS X. It is a free-to-play 
						game that is supported by micro-transactions and inspired by 
						<a href="https://en.wikipedia.org/wiki/League_of_Legends">...more</a></td>
				</tr>
				<tr>
					<td><center>4</center></td>
					<td>Overwatch</td>
				</tr>
			</table>
		</div>

</body>
</html>

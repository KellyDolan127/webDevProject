<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Game Group - Forum</title>
	<!---->
	<meta charset="UTF-8">
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="" type="image/png" rel="shortcut icon" />
	<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
		
<?php
  if (isset($_POST['username'])){
		$_SESSION['user'] = $_POST['username'];
	}
?>
<?php include("mainBar.php"); ?>

		<div id="sidebar">
			This area for pages <br /><br />
			<a href=index.php>Main</a><br />
			<a href=games.php>Games</a><br />
			<a href=forum.php>Forum</a><br />
			<a href=aboutUs.php>About Us</a><br />
		</div>
		<h1>&nbsp About Us</h1>
		
		<div id="mainPageFeed">
			
			<div id="news"> 
			<div class="feed">
			Under Construction
			
			<div>
			
			</div>
			
			</div>
</body>

</html>

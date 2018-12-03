<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Game Group - About</title>
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
			Welcome to the Game Group website.  This website started as an ambitious dream, and although it still
            has a long way to go, this site still offers many user functionalities:<br>
				<ul><li>Login/Logout/SignUp</li>
				    <li>Updated News Feed</li>
					<li>Profile Management</li>
					<li>Game Library Viewing with Stats</li>
				</ul> <br>
				We apologize for any bugs and hiccups that may exist.  One day in the near future we hope to add 
				the following features:
				<ul><li>Forum</li>
				    <li>On-site friends and messaging</li>
					<li>More stats on gameing</li>
				</ul>
				<br><br>
				<h4>Thank you for visiting!</h4>
			
			<div>
			
			</div>
			
			</div>
</body>

</html>

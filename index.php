<?php session_start(); ?>
<!DOCTYPE html>
<!-- 
Any place I have an empty comment means we need to edit

Please feel free to change the css (or anything really).  I did try to keep the css "dynamic" so when
you re-size the webpage everything isn't overlapping and thrown around
-->


<html lang="en">

<head>
	<title>First Page (Name of website?)</title>
	<!---->
	<meta charset="UTF-8">
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="" type="image/png" rel="shortcut icon" />
	<!---->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
 
 $(document).ready(function(){
 
 $=jQuery.noConflict();

 $("button").click(function () {

	 $.get("http://ec2-52-91-22-53.compute-1.amazonaws.com:3000/steam/user", function (data, textStatus, jqXHR) {

		 alert(JSON.stringify(data));

	 });

 });

});
 

 
	</script>
	<!---->
</head>

<body onload="populate()">	

	<div id="mainBar">


		<div id="mainBarPic">
			<img id="logo" src="logo.png" alt="Game Group Logo"/>
		</div>
		<div id="mainBarSearch">
			<input type="text" />
		</div>
        
        <?php if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {?>
        <a href="login.php"> Login/Sign Up </a> <br>
        <?php }else{ ?>
        <a href="profileDisplay.php"> Welcome, 
        <br> <?php echo $_SESSION['user']; ?> </a> <br> 
     
		<form action="signUp.html">
			<input type=submit class="mainBarButtons" value="SignUp" />
		</form>
		<!--Will display "Account" if logged in-->
		
		<form action="login.html">
			<input type=submit class="mainBarButtons" value="Login" />
		</form>
		<!--Will display "Logout" if logged in-->
</div>

		<div id="sidebar">
			This area for pages <br /><br />
			<a href=index.html>Main</a><br />
			<a href=friends.html>Friends</a><br />
			<a href=games.html>Games</a><br />
			<a href=news.html>News</a><br />
			<a href=profile.html>Profile</a><br />
			<a href=forum.html>Forum</a><br />
		</div>

<script>
	function populate(){
		
	//var node = document.getElementById('mainPageFeed');
	
//	node.innerHTML += ("<div class='feed'> test</div>");

var games = [];



}
</script>
<button>here</button>
		<div id="mainPageFeed">
			<div class="feed">
				Gaming</div>
			<div class="feed">
				Gaming</div>
			<div class="feed">
				Gaming</div>
			<div class="feed">
				Gaming</div>
		</div>

</body>

</html>

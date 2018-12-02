<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile Games</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
		<script type="text/javascript" src=""></script><!---->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body onload="callAPI()">
<script>

function callAPI(){

$(document).ready(function(){
 
 $=jQuery.noConflict();

	 $.get("http://ec2-52-91-22-53.compute-1.amazonaws.com:3000/steam/gameList", function (data, textStatus, jqXHR) {

		var jsonData = JSON.stringify(data);
		jsonData = jsonData.replace(/"/g, '');
		var arr = jsonData.split(",");
		
		var node = document.getElementById('gameList');
		for (var i = 0; i < arr.length; i++){
			var playTime = arr[i].substring(arr[i].indexOf("PlayTime")+9, arr[i].indexOf("Game"));
			var gameName = arr[i].substring(arr[i].indexOf("Game")+5, arr[i].length);
			gameName = gameName.replace("}", "");
			node.innerHTML += ("<div class='feed'>"+ "You've played:&nbsp&nbsp&nbsp" + 
				"<span class='important'>" + gameName + "</span>&nbsp&nbspfor&nbsp&nbsp<span class='important'>" 
					+ playTime + "</span>&nbsp&nbsphours. </div>");
		}
	 });

});		
}
	
</script>


<?php include("mainBar.php"); ?>

<div id="mainProfile">
    <?php include("profileBar.php"); ?>
    <h1>My Games</h1>
    <p></p>
    <div id="gameList">
        
        
    </div>
	</div>	
</body>
</html>

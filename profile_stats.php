<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile Games</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
		<script type="text/javascript" src="steam_api3.js"></script><!---->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body onload="callAPI()">
<script>

function callAPI(){

$(document).ready(function(){
 
 $=jQuery.noConflict();

	 $.get("http://ec2-52-91-22-53.compute-1.amazonaws.com:6000/steam/a", function (data, textStatus, jqXHR) {

		var jsonData = JSON.stringify(data);
		jsonData = jsonData.replace(/"/g, '');
		//var arr = jsonData.split(",");
		//alert(arr.length);
		
		var node = document.getElementById('gameList');
		//for (var i = 0; i < arr.length; i++){
	    	node.innerHTML += ("<div class='feed'>"+ jsonData + "</div>");
		//}
	 });

});		
}
	
</script>

<?php include("mainBar.php"); ?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
	
    <h1>Your Games</h1>
    <p></p>
    <div id="gameList">
        
        
    </div>
	</div>	
</body>
</html>

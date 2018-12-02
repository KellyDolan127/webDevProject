<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile Friends</title><!---->
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

	 $.get("http://ec2-52-91-22-53.compute-1.amazonaws.com:4000/steam/friendList", function (data, textStatus, jqXHR) {

		var jsonData = JSON.stringify(data);
		jsonData = jsonData.replace(/"|}/g, '');
		var arr = jsonData.split(",");		
		var node = document.getElementById('friendList');
		for (var i = 0; i < arr.length; i+=2){
			var url = arr[i+1].substring(arr[i+1].indexOf(":")+1, arr[i+1].length);
			var friendName = arr[i].substring(arr[i].indexOf(":")+1, arr[i].length);
	    	node.innerHTML += ("<div class='feed'><a href='" + url + "'>"+ friendName + "</a></div>");
		}
	 });

});		
}
</script>
<?php include("mainBar.php"); ?>

<div id="mainProfile">
    <?php include("profileBar.php"); ?>
    <h1>My Friends</h1>
    <p></p>
    <div id="profile">
        <div id="friendList">
        
        
        </div>
        
    </div>
	</div>	
</body>
</html>

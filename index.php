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
	<title>Game Group - Home</title>
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
		
		$(document).ready(function(){
		 
		 $=jQuery.noConflict();
		
			 $.get("http://ec2-52-91-22-53.compute-1.amazonaws.com:5000/steam/news", function (data, textStatus, jqXHR) {
		
				var jsonData = JSON.stringify(data);
				
				//node.innerHTML += ("<div class='feed'>"+ jsonData + "</div>");
			    jsonData = jsonData.replace(/"|}/g, '');
				var arr = jsonData.split("newsBreakPointHere");		
				var node = document.getElementById('news');
				for (var i = 2; i < arr.length; i+=2){
					//alert(i);
					//var url = arr[i+1].substring(arr[i+1].indexOf(":")+1, arr[i+1].length);
					var newsItem = arr[i];//.substring(arr[i].indexOf(":")+1, arr[i].length);
					//node.innerHTML += ("<div class='feedNews'>"+ newsItem + "</div>");
					var title = newsItem.substring(newsItem.indexOf("title")+8, newsItem.indexOf("url")-3);
					var urlToNews =newsItem.substring(newsItem.indexOf("url")+6, newsItem.indexOf("is_ext")-3);
					var desc = (newsItem.substring(newsItem.indexOf("contents")+11, newsItem.indexOf("<img src")));
					if (title.length > 9){
					/*node.innerHTML += "<div class='feedNews'><h4>"+ title + "</h4><br><br><a href='" + urlToNews + "'>" + 
						urlToNews +"</a><br><br>" +desc+ "</div>";
					}*/
					if (urlToNews.indexOf("community") > -1|| urlToNews.indexOf(".com/news/") > -1){
						node.innerHTML += "<div class='feedNews'><h4>"+ title + "</h4><br><br><a href='" + urlToNews + "'>" + 
						urlToNews +"</a></div>";
					} else{
					node.innerHTML += "<div class='feedNews'><h4>"+ title + "</h4><br><br><a href='" + urlToNews + "'>" + 
						urlToNews +"</a><br><br><iframe class='iFrameClass' src='" +urlToNews+ "'></iframe></div>";
					}
				}
				}
			 });
		
			});		
		}
		</script>

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
		<h1 class='innerHeader'>&nbspNews</h1>
		<button id="refresh" onclick="window.location.href=window.location.href">Refresh News</button>
		<div id="mainPageFeed">
			
			<div id="news"> </div>
			
			</div>
</body>

</html>

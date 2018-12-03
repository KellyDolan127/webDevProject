<?php session_start(); ?>
<!DOCTYPE html>
 <head>
 <script>
window.onload = function () {
callAPI();
/*var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Fortune 500 Companies by Country"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Companies"
	},
	data: [{
		type: "bar",
		name: "companies",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: ans
	}]
});
chart.render();

}*/
}
</script>

        <title>Game Group - Profile Games</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
		<script type="text/javascript" src=""></script><!---->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body ><!--onload="callAPI()">-->
<script>

function callAPI(){
     var arrOfData = [];
            $(document).ready(function(){
            $=jQuery.noConflict();

        $.get("http://ec2-54-88-99-94.compute-1.amazonaws.com:1000/steam/gameType", function (data, textStatus, jqXHR) {

        var jsonData = JSON.stringify(data);
//jsonData = jsonData.replace(/"/g, '');
var arr = jsonData.split(",");
//alert(arr.length);

var node = document.getElementById('gameList');

var countArr = ["NA"];

for (var i = 1; i < arr.length; i++){
    var t = 0;
    var index;
    for (var j=0; j < countArr.length; j++){
        if (countArr[j].indexOf(arr[i]) > -1){
             t= 1;
            index = j;
        //node.innerHTML += ("<div class='feed'>setting to false</div>");
         }
    }

if (t == 0){
    countArr.push(arr[i] + "_x_" + 1);
    //node.innerHTML += ("<div class='feed'>pushing</div>");
} else{
    //node.innerHTML += ("<div class='feed'>incre</div>");    
    var temp = countArr[index];
   // alert(temp);
    temp = temp.substring(temp.indexOf("_x_")+3, temp.length);
   // alert(temp);
    var count = parseInt(temp);
    count += 1;
    countArr[index] = (countArr[index].substring(0, countArr[index].indexOf("_x_")));
    countArr[index] += "_x_" + count;
   // alert(countArr[index]);
}
}

for (var i=1; i< countArr.length; i++){
    var answer =  countArr[i].replace(/"/g, "");
    //answer = answer.replace("_x_", "  ");
    var t = answer.split("_x_");
    arrOfData.push({y: parseInt(t[1]),label: t[0]});
    if (t[0].indexOf("_type") == -1){
        node.innerHTML += ("<div class='feed'>You have &nbsp <span class='important'>"+ t[1] + " </span> &nbsp games with the tag: &nbsp<span class='important'>" + t[0] + "</span></div>");
    }
 }
 //arrOfData.push({y: 8, label:"test"});
// return arrOfData;

});
  
});

} 
</script>

<?php include("mainBar.php"); ?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
        
    <h1>Your Most-Played Genres</h1>
   <!-- <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
    <div id="gameList"></div>
	</div>	
</body>
</html>



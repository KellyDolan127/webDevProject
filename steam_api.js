var express = require('express');

var app = express();
var request = require('request');

// my key EF6233DCF8DC8AFFB8419F82A085B4A1
// my id 76561198087236531


//add user steam username to required field in sign up
//use that username to search steam
//get userID to add to parameter steamids to get game info, friend info, etc.
//parse through returned json
//post to website



app.get('/steam/user', function(req, res) { //posting to our website

    var url = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/' +

        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamids=76561198087236531';// +

    request.get(url, function(error, steamRes, steamBody) { //getting from steam


        res.send(steamBody);

    });

});


var port = 6000;

var server = app.listen(port);

console.log('Navigate to http://localhost:4000/steam/user');


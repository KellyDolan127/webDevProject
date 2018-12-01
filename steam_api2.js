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

var games = [];
var steamid = '76561198087236531';

//returns user friends

//app.get('/steam/user', function(req, res) { //posting to our website
    var url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v1/' 
    + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid;

    request.get(url, function(err, steamResFriend, steamBodyFriend) { //getting from steam
        var temp =JSON.stringify(steamBodyFriend);
        var t=JSON.parse(temp);
        var a =t.split("steamid");
        for (var i =1; i<a.length; i++){
             //console.log(a[i]);
             var friendID = a[i].substring(a[i].indexOf(':"')+2, a[i].indexOf('",'));    
    
    url = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/'
    //achievements: 'https://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v1/' +
    
    //friends: 'http://api.steampowered.com/ISteamUser/GetFriendList/v1/' +
        + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamids=' ;//+ friendID;
        
   
    request.get(url + friendID, function(error, steamRes, steamBody) { //getting from steam
        var temp =JSON.stringify(steamBody);
        var t=JSON.parse(temp);
        var a =t.split(",")
        var friendID2 = a[0].substring(a[0].indexOf('steamid":')+9, a[0].length);;
        friendID2=friendID2.replace(/"/g, '');
        var username = a[3].substring(a[3].indexOf(':'), a[3].length);
        username = username.replace(/"|:/g, '');
        var link = a[5].substring(a[5].indexOf(':'), a[5].length);
        link = link.replace(/"|:/g, '');
        for (var i =0; i<a.length; i++){
           // console.log('----');
           // console.log(a[i]);
        }
       // console.log(username);
       console.log("---");
        console.log( friendID2);
       // console.log(link);
        
    });
 
         }
    });

//});


//var port = 6000;

//var server = app.listen(port);

//console.log('Navigate to http://localhost:4000/steam/user');


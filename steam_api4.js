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
var toSend ={};
var i = 1;

    i +=1;
    var newsAPI = 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1'; 
    
        request.get(newsAPI, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
            var gameName = JSON.stringify(gameSteamBody);//console.log(gameName);
            gameName = gameName.replace(/\\|{|}/g, '')
            var g = gameName.split('appid');
            console.log(gameName);
            for (var i=0; i<g.length; i++){
               toSend["newsBreakPointHere" + i] = (g[i]);
           /*
                console.log('----------------------------------------------------');
                console.log("title:   " +g[i].substring(0, g[i].indexOf("url")));
                console.log("url:   " +g[i].substring(g[i].indexOf("url"), g[i].indexOf("is_ext")));
                var desc = (g[i].substring(g[i].indexOf("contents"), g[i].indexOf("<img src")));
                console.log("desc:    " +desc)//.substring(0, desc.indexOf("is_ext")));
                console.log('----');*/
            }
         
             }); console.log(toSend);
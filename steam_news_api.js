var express = require('express');

var app = express();
var app2= express();
var request = require('request');

// my key EF6233DCF8DC8AFFB8419F82A085B4A1
// my id 76561198087236531


//add user steam username to required field in sign up
//use that username to search steam
//get userID to add to parameter steamids to get game info, friend info, etc.
//parse through returned json
//post to website

var steamid = '76561198087236531';


//GAMES//////////////////////////////////////////////////////////////////////////////////////////////
app.get('/steam/news', function(req, res) { //posting to our website

    ///ISteamUser/GetFriendList/v1/
    var url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v1/' +
        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid;// +

    request.get(url, function(error, steamRes, steamBody) { //getting from steam

        var urlGame = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 

        var temp =JSON.stringify(steamBody);
        var toSend ={};
        var k = 1;

        games = temp.split('appid');
        function populateToSend(_callback){
        games.forEach(function (elem){
            elem = elem.replace(/^\D+/g, '');
            var num = elem.indexOf(','); 
            elem = elem.substring(0, num);
            k +=1;
            var newsAPI = 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 
            
                request.get(newsAPI + elem, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
                    var gameName = JSON.stringify(gameSteamBody);//console.log(gameName);
                    gameName = gameName.replace(/\\|{|}/g, '')
                    var g = gameName.split('appid');
                    //console.log(gameName);
                    for (var i=0; i<g.length; i++){
                       toSend[k + "_newsBreakPointHere" + i] = (g[i]);
                   /*
                        console.log('----------------------------------------------------');
                        console.log("title:   " +g[i].substring(0, g[i].indexOf("url")));
                        console.log("url:   " +g[i].substring(g[i].indexOf("url"), g[i].indexOf("is_ext")));
                        var desc = (g[i].substring(g[i].indexOf("contents"), g[i].indexOf("<img src")));
                        console.log("desc:    " +desc)//.substring(0, desc.indexOf("is_ext")));
                        console.log('----');*/
                    }
                 
                     }); 
        });
       
        _callback();    
        }
        function send(){
            populateToSend(function(){
            setTimeout(function(){res.send(toSend);}, 3000);
            });
        }
        send();
        
    });

});


var server = app.listen(5000);

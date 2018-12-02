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
function getAchievements(gameID){
    app.get('/steam/a', function(req, res) {

    ///ISteamUser/GetFriendList/v1/
    var url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v1/' +
        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid;// +

    /*request.get(url, function(error, steamRes, steamBody) { //getting from steam

        var urlGame = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 

        var temp =JSON.stringify(steamBody);
        var toSend ={};
        var i = 1;

        games = temp.split('appid');
      
        games.forEach(function (elem){
            elem = elem.replace(/^\D+/g, '');
            var num = elem.indexOf(','); 
            elem = elem.substring(0, num);
            i +=1;*/
            
            var urlCheevo = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 

            request.get(urlCheevo + gameID, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
                var gameName = JSON.stringify(gameSteamBody);//console.log(gameName);
                var g = gameName.split('[_achiev_][ACHIEVEMENT_]');
                var h = g[0].split("displayName");
                var toSend ={};
                var i = 0;
                
                function populateToSend(_callback){
                h.forEach(function (elem){
                    
                    //console.log(h);
                    var achievName = elem.substring( elem.indexOf("displayName"), elem.indexOf("hidden"));
                    var achievDesc = elem.substring( elem.indexOf("description"), elem.indexOf("icon"));
                    achievName = achievName.replace(/\\|"/g, '');
                    achievName = achievName.substring(achievName.indexOf(":")+1, achievName.length-1);
                    if (achievName.length > 100){
                        achievName='NA';
                    }
                    toSend[i+"Name"] =(achievName);
                    achievDesc = achievDesc.replace(/\\|"/g, '');
                    achievDesc = achievDesc.substring(achievDesc.indexOf(":")+1, achievDesc.length-1);
                    if (achievDesc.length > 100){
                        achieveDesc=achievName;
                    }
                    toSend[i+"DESC"] = (achievDesc);
                    i += 1;
            }) 
            _callback();    
        }
        function send(){
            populateToSend(function(){
            setTimeout(function(){res.send(toSend);}, 3000);
            });
        }
        send();
        
        }); 
        
           /* var urlCheevoEarned = 'http://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v0001/' 
            + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid + '&appid='; 

            request.get(urlCheevoEarned + elem, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
                var gameName = JSON.stringify(gameSteamBody);//console.log(gameName);
                console.log(gameName);                
              
             });}*/
       // }); 
       
        
        
    //});
    });
    var server = app.listen(6000);
 }

    getAchievements('214340');
//console.log('Navigate to http://localhost:4000/steam/user');


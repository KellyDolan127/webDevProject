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

//easy
//all standarard api calls:
//Grab Info for GameList
//Grab info for friendlist
//grab achievements
//grab stats

//games rec:
  //list of all games(top 100)
  //if game not in userGames and game.genre like (blah)

//medium:
//hook all data into SQL and then query sql to display onto page




//returns user owned games
app.get('/steam/user', function(req, res) { //posting to our website

    ///ISteamUser/GetFriendList/v1/
    var url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v1/' +
        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=76561198087236531';// +

    request.get(url, function(error, steamRes, steamBody) { //getting from steam

        var urlGame = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 

        var temp =JSON.stringify(steamBody);
        var toSend ={};
        var i = 1;

        games = temp.split('appid');
        function populateToSend(_callback){
        games.forEach(function (elem){
            elem = elem.replace(/^\D+/g, '');
            var num = elem.indexOf(','); 
            elem = elem.substring(0, num);
            
            request.get(urlGame + elem, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
                var gameName = JSON.stringify(gameSteamBody);
                var toStart =gameName.indexOf ('Name');
                var toRemove =gameName.indexOf ('gameV');
                gameName = gameName.substring(toStart, toRemove);
        //console.log(toStart); console.log(toRemove);
                gameName = gameName.replace(/['"\\,]+/g,'');
                gameName = gameName.replace('Name:', '');
                if (gameName != null && gameName != ''){
                   // console.log(gameName.replace('Name:', ''));
                    toSend["Game" + i]=gameName.replace('Name:', '');
                    //console.log(toSend);
                    i++;
                    // res.send(gameName.replace('Name:', ''));
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


var port = 6000;

var server = app.listen(port);

//console.log('Navigate to http://localhost:4000/steam/user');


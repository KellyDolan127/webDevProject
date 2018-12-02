var express = require('express');
var cheerio = require('cheerio');
var app = express();
var app2= express();
var app3= express();
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
var steamid = '76561198087236531';




//GAMES//////////////////////////////////////////////////////////////////////////////////////////////
app.get('/steam/gameList', function(req, res) { //posting to our website

    ///ISteamUser/GetFriendList/v1/
    var url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v1/' +
        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid;// +

    request.get(url, function(error, steamRes, steamBody) { //getting from steam

        var urlGame = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 

        var temp =JSON.stringify(steamBody);
        var toSend ={};
        var i = 1;

        games = temp.split('appid');
        function populateToSend(_callback){
        games.forEach(function (elem){
            var playTime = elem;
            playTime = playTime.substring(playTime.indexOf("forever")+10, playTime.indexOf("}"));
            elem = elem.replace(/^\D+/g, '');
            var num = elem.indexOf(','); 
            elem = elem.substring(0, num);
           /* var urlCheevo = 'http://api.steampowered.com/ISteamUserStats/GetSchemaForGame/v2/' + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&appid='; 
                    var arrN = [];
                    var arrD = [];
                    request.get(urlCheevo + elem, function(gameErrorA, gameSteamResA, gameSteamBodyA) { //getting from stea
                        var ach = JSON.stringify(gameSteamBodyA);
                        var g = ach.split('[_achiev_][ACHIEVEMENT_]');
                        var m = 1;
                        g.forEach(function (elem){
                            //console.log('------');
                            var achievName = elem.substring( elem.indexOf("displayName"), elem.indexOf("hidden"));
                            var achievDesc = elem.substring( elem.indexOf("description"), elem.indexOf("icon"));
                            achievName = achievName.replace(/\\|"/g, '');
                            achievName = achievName.substring(achievName.indexOf(":")+1, achievName.length-1);
                            if (achievName.length > 100){
                                achievName='NA';
                            }
                            achievDesc = achievDesc.replace(/\\|"/g, '');
                            achievDesc = achievDesc.substring(achievDesc.indexOf(":")+1, achievDesc.length-1);
                            if (achievDesc.length > 100){
                                achieveDesc=achievName;
                            }
                            toSend["AchieveName" + i + '_' + m]=arrN;
                            toSend["AchieveDesc" + i+ '_' + m]=arrD;
                        }) 
                     });*/
                    
            request.get(urlGame + elem, function(gameError, gameSteamRes, gameSteamBody) { //getting from stea
                var gameName = JSON.stringify(gameSteamBody);
                var toStart =gameName.indexOf ('Name');
                var toRemove =gameName.indexOf ('gameV');
                gameName = gameName.substring(toStart, toRemove);
                gameName = gameName.replace(/['"\\,]+/g,'');
                gameName = gameName.replace('Name:', '');
                if (gameName != null && gameName != ''){
                    toSend[i + "_PlayTime:" + playTime + "Game"]=gameName.replace('Name:', '');
                    
                    i++;
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




//FREINDS//////////////////////////////////////////////////////////////////////////////////////////////

app2.get('/steam/friendList', function(req, res) { //posting to our website

    var url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v1/' 
    + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=' + steamid;

    request.get(url, function(err, steamResFriend, steamBodyFriend) { //getting from steam
        var temp =JSON.stringify(steamBodyFriend);
        var t=JSON.parse(temp);
        var a =t.split("steamid");

        var toSend ={};
        var k = 1;

        function populateToSend(_callback){
        
            for (var i =1; i<a.length; i++){

                var friendID = a[i].substring(a[i].indexOf(':"')+2, a[i].indexOf('",'));    
                url = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/'
                    + '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamids=' + friendID;
                
                    request.get(url, function(error, steamRes, steamBody) { //getting from steam
                        
                        var temp =JSON.stringify(steamBody);
                        var t=JSON.parse(temp);
                        var a =t.split(",")
                        var friendID2 = a[0].substring(a[0].indexOf('steamid":')+9, a[0].length);;
                        friendID2=friendID2.replace(/"/g, '');
                        var username = a[3].substring(a[3].indexOf(':'), a[3].length);
                        username = username.replace(/"|:/g, '');
                        var link = a[5].substring(a[5].indexOf(':'), a[5].length);
                        link = link.replace(/"|:/g, '');
                        link = link.replace("https", "https:");
                        if (link == '1'){
                         link = "https://steamcommunity.com/profiles/" + friendID2; 
                        }
                        toSend["Friend" + k]=username;
                        toSend["URL" + k]=link;
                        k +=1;
                    });
                }        
       
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


//TYPE/////////////////////////////////////////////////////////////////////////////////////////

app3.get('/steam/gameType', function(req, res) { //posting to our website
    var k = 0;
    var url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v1/' +
        '?key=EF6233DCF8DC8AFFB8419F82A085B4A1&steamid=76561198087236531';// +
        var toSend = {};
    request.get(url, function(error, steamRes, steamBody) { //getting from steam        

        var temp =JSON.stringify(steamBody);
        var toSend ={};
        var i = 1;
        var totalPlayTime = 0;
        games = temp.split('appid');
        var urlGame = 'https://store.steampowered.com/app/'; 
        function populateToSend(_callback){
        //console.log(temp);


        games.forEach(function (elem){
           // console.log(elem);
            var playtime = elem;
            playtime = playtime.substring(playtime.indexOf("forever")+10, playtime.indexOf("}"));
            elem = elem.replace(/^\D+/g, '');
            var num = elem.indexOf(','); 
            elem = elem.substring(0, num);
    
           // console.log(urlGame + elem);
              request(urlGame + elem, function (err, res, html){
                 // console.log(html);
                var answer = "";
                var $ = cheerio.load(html);
                
                $('div.glance_tags.popular_tags').each(function(i, ele) {
                    k += 1;
                    //console.log(i);
                    var tag = $('a.app_tag', ele).text();
                    tag = tag.replace(new RegExp('\n','g'),' ');
                    tag = tag.replace(new RegExp('\t','g'),'');
                    //console.log(tag.trim());
                    //console.log('-----')
                    toSend[k + "_type"]=tag.trim();
                   
                });
 
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


var server = app.listen(3000);
var server2 = app2.listen(4000);
var server3 = app3.listen(1000);



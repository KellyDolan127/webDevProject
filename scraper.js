
var request = require('request');
var cheerio = require('cheerio');
var express = require('express');

var app = express();
var k = 0;

app.get('/steam/gameType', function(req, res) { //posting to our website
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


var port = 3000;
var server = app.listen(1000);


var request = require('request');
var cheerio = require('cheerio');
var express = require('express');

var app = express();


app.get('/steam/gameTop', function(req, res) { //posting to our website
    var url = 'https://www.ranker.com/list/most-popular-video-games-today/ranker-games';
        var toSend = {};
    
        function populateToSend(_callback){

           // console.log(urlGame + elem);
              request(url, function (err, res, html){
                 // console.log(html);
                var answer = "";
                var $ = cheerio.load(html);
                var k = 0;
                $('body').each(function(i, ele) {
                     k += 1;
                    //console.log(i);
                    var tag = $('a..listItem__title.listItem__title', ele).text();
                    tag = tag.replace(new RegExp('\n','g'),' ');
                    tag = tag.replace(new RegExp('\t','g'),'');
                    //console.log(tag.trim());
                    //console.log('-----')
                    toSend[k + "_type"]=tag.trim();
					
					
            
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


var server = app.listen(2000);
console.log("navigate to 2000/steam/gameTop");


var request = require('request');
var cheerio = require('cheerio');
var express = require('express');

var app = express();


app.get('/steam/gameTop', function(req, res) { //posting to our website
    var url = 'https://www.ranker.com/list/most-popular-video-games-today/ranker-games'
        var toSend = {};
    
        function populateToSend(_callback){

           // console.log(urlGame + elem);
              request(url, function (err, res, html){
                 // console.log(html);
                var answer = "";
                var $ = cheerio.load(html);
                
                //$('div.glance_tags.popular_tags').each(function(i, ele) {
                    
                    var list = $('.listItem__title listItem__title--link black', ele).text();
					console.log(list.length);  //should be 49 or 50
					
					for (var i=0; i< list.length; i++){
						list = tag.replace(new RegExp('\n','g'),' ');
						list = tag.replace(new RegExp('\t','g'),'');
						//console.log(tag.trim());
						//console.log('-----')
						toSend[i + "_gameListTop"]=list[i].trim(); 
					}
                //});
 
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

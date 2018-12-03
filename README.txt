//     ___ ___  ___  ___  __ _ ____ 
//    / __/ _ \/ __|/ __|/ // |__  |
//   | (_| (_) \__ \ (__/ _ \ | / / 
//    \___\___/|___/\___\___/_|/_/  
//


Members:
   Kelly Dolan
      -Main page, games, profile games/stats/friends, logout, aboutUs, mainBar/profileBar, api/web scrape, php session handling,
       HTML/CSS (style) main structure, all .js files, php conversion, logo/favcon creation, README
   Daniel Rodriguez
      -Login/Signup, concept of look-and-feel, Server setup and configuration and documentation, MYSQL datbase initial 
       creation, html and css touch ups
   James Goodwyn
      -Main profile page, profile update (images/info), html and css touch ups, SQL add ins (adding new columns 
      and modifying), research on php and mysql connections


Project:
   Title: Game Group
   Purpose: Gaming website
   Website link: http://ec2-52-91-22-53.compute-1.amazonaws.com
   GitHub: https://github.com/KellyDolan127/webDevProject


How to run:
   Our website relies on many API calls.  To see the data displayed on the webpage two things must be done:
  	1) In PuTTY 2 sessions need to be created in var/www/html and the sessions need to run "steam_news_api.js"
           and "steam_api_new.js"
        2) The browser being used must allow for requests from our server for the API calls. In Chrome the following
           add-on let us do this: Allow-Control-Allow-Origin
           https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi/related?hl=en-US 


Features:
   Login
   Logout
   Sign up
   Update user information
   View profile
   See:
     -gaming news
     -list of owned games with hours played
     -stats of most played game genres
     -list of friends with links to steam profiles
   
   
Languages:
   HTML
   CSS
   PHP
   Javascript
   SQL
   
   
Files:
  index.php (main page)
  login.php
  logout.php
  signup.php
  mainBar.php (not stand-alone: imported to other pages)
  profileBar.php (not stand-alone: imported to other pages)
  profile.php
  profile_friends.php
  profile_games.php
  profile_gamesRec.php
  profile_stats.php
  profile_updateInfo.php
  games.php
  forum.php
  aboutUs.php
  
  steam_api_new.js (Run on Node backend server: Used for profileRec/Stat/Games/Friends)
  steam_news_api.js (Run on Node backend server: Used for main)
  external.js (signup)
  
  style.css
  
  banner.png
  favCon.png
  logo.png
  profile_pic.png (generic)

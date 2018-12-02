<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
        <script type="text/javascript" src=""></script><!---->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body >
  
	<?php include("mainBar.php"); ?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
    <h1>Profile Page</h1>
    <p></p>
    <div id="profile">
        <img id="profilePic" src="arrow.png" alt="profile pic">
        <div class="profileInfo">
            <label>Birthday: </label> January 28, 1993 <br>
            <label>Gender: </label> Male <br>
            <label>Username: </label>gamerTag1
        </div>
        <div class="profileBio">
            This is where the user's bio would be displayed. A sample bio would include anything
            that you would like others who can see your profile to see.
        </div>
        <div class="gameList">
            <h3>Games I follow</h3>
            <table>
                <tr>
                    <td>Game1</td>
                    <td>Game2</td>
                    <td>Game3</td>
                </tr>
                <tr>
                        <td>Game4</td>
                        <td>Game5</td>
                        <td>Game6</td>
                    </tr>
            </table>
        </div>
    </div>
	</div>	
</body>
</html>

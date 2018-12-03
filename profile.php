<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
        <link rel="shortcut icon" href="images/favCon.png" type="image/png" sizes="16x16">
        <script type="text/javascript" src=""></script><!---->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body >
  
	<?php include("mainBar.php"); ?>

	<div id="mainProfile">
        <?php
            include("profileBar.php");
            $profileUser = "'".$_SESSION['user']."'";
            $link = mysqli_connect("localhost", "root", "", "websitedb");

            if($link === false){
                echo "Error found!";
                die("Error: Could not connect." . mysqli_connect_error());
            } 

            $sql = "SELECT * FROM users WHERE username = $profileUser";
            if($result = mysqli_query($link, $sql)){
                $numRows = mysqli_num_rows($result);
                if($numRows > 0){
                    while($row = mysqli_fetch_array($result)){
                        $steamId = $row["steamid"];
                        $myName = $row["name"];
                        $userName = $row["username"];
                        $emailAddr = $row["email"];
                        $birthday = $row["birthday"];
                        $aboutMe = $row['about_me'];

                    }
                    mysqli_free_result($result);
                } else {
                    echo "No records found!";
                }
            } else {
                echo "Error: could not execute $sql. " . mysqli_error($link); 
            }
            mysqli_close($link);
        ?>
    <h1><?php echo $myName; ?></h1>
    <p></p>
    <div id="profile">
        <img id="profilePic" src="images/profile_pic.png" alt="profile pic">
        <div class="profileInfo">
            <?php
                echo "<label>SteamID: </label>".$steamId."<br/>";
                echo "<label>Username: </label>".$userName."<br/>";
                echo "<label>Email Address: </label>".$emailAddr."<br/>";
                echo "<label>Birthday: </label>".$birthday."<br/>";
            ?>
        </div>
        <div class="profileBio"><?php echo "<label>About Me:</label><br/>".$aboutMe; ?></div>
    </div>
	</div>	
</body>
</html>
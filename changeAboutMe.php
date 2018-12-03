<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Update About Me</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
		<script type="text/javascript" src=""></script><!---->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>
	<?php 
		include("mainBar.php");
        if(isset($_POST['editAboutMe'])){
            $profileUser = "'".$_SESSION['user']."'";
            $newAbout = "'".$_POST["newAboutMe"]."'";
            $link = mysqli_connect("localhost", "root", "", "websitedb");
			if($link === false){
				die("Error: Could not connect." . mysqli_connect_error());
			}
            $sql = "UPDATE users SET about_me = $newAbout WHERE username = $profileUser";
            $result = mysqli_query($link,$sql);
			header("Location: profile.php");
        }
	?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
        <h1>Edit Your About Me</h1>
        <p></p>
        <div id="profile">
		    <form action="changeAboutMe.php" name="changeAboutMe" method="POST">
			    <label>New About Me: <label><br/>
                <textarea rows="5" cols="50"name="newAboutMe" id="newAboutMe"></textarea><br/><br/>
			    <input type="submit" name="editAboutMe" value="Update"/>
		    </form>
        </div>
	</div>	
</body>
</html>

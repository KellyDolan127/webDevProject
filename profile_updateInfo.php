<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Profile Update</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="favCon.png" type="image/png" sizes="16x16">
		<script type="text/javascript" src=""></script><!---->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>
	<?php 
		include("mainBar.php");
		$profileUser = "'".$_SESSION['user']."'";
		if(isset($_POST['updateInfo'])){
			$link = mysqli_connect("localhost", "root", "", "websitedb");
			if($link === false){
				die("Error: Could not connect." . mysqli_connect_error());
			}
			$newName = "'".$_POST["gName"]."'";
			$newUserName = "'".$_POST["uName"]."'";
			$newEmail = "'".$_POST["email"]."'";
			$check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
			
			$sql = "UPDATE users SET name = $newName, username = $newUserName, email = $newEmail WHERE username = $profileUser";
			$result = mysqli_query($link,$sql);
			$_SESSION['user'] = $_POST["uName"];
			header("Location: profile.php");
		}
	?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
    <h1>Update Profile Information</h1>
    <p></p>
    <div id="profile">

			<form id="updateInfoP" onsubmit="" action="profile_updateInfo.php" method="POST" name="updateInfoP"> <!---->
				<label>Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" required name="gName" id="gName"/> <br><br>  
				<label>Username:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="uName" id="uName"/> <br><br>  
				<label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" style="width: 200px;" maxlength="40" required name="email" id="email"/> <br/><br/>
				<input type="submit" name="updateInfo" value="Update"/>
			</form>
        
        
    </div>
	</div>	
</body>
</html>

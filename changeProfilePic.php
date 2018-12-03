<?php session_start(); ?>
<!DOCTYPE html>
 <head>
        <title>Game Group - Update Profile Picture</title><!---->
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
        $destination = $_SERVER['DOCUMENT_ROOT'].'/images/';
        $fileName = $_FILES['newImage']['name'];
        $fileSize = $_FILES['newImage']['size'];
        $fileTmpName = $_FILES['newImage']['tmp_name'];

        $uploadedPath = $destination . basename($fileName);
        if(isset($_POST['updatePicture'])){
            $didUpload = move_uploaded_file($fileTmpName, $uploadedPath);
            if($didUpload){
                $picPath = "'images/".basename($fileName)."'";
                $link = mysqli_connect("localhost", "root", "", "websitedb");
			    if($link === false){
                    die("Error: Could not connect." . mysqli_connect_error());
                }
                $sql = "UPDATE users SET profilePic = $picPath WHERE username = $profileUser";
                $result = mysqli_query($link,$sql);
			    header("Location: profile.php");
            } else {
                echo "An error occurred. Please check your code!";
            }
        }
	?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
        <h1>Change Your Profile Picture</h1>
        <p></p>
        <div id="profile">
		    <form action="changeProfilePic.php" method="POST" enctype="multipart/form-data">
			    <label>Upload Image: <label><input type="file" name="newImage" id="imageUpload"/><br/><br/>
			    <input type="submit" name="updatePicture" value="Update"/>
		    </form>
        </div>
	</div>	
</body>
</html>

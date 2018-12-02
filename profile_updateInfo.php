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
<?php include("mainBar.php"); ?>

	<div id="mainProfile">
        <?php include("profileBar.php"); ?>
    <h1>Update Profile Information</h1>
    <p></p>
    <div id="profile">

			<form id="updateInfoP" onsubmit="" action="" method="POST" name="updateInfoP"> <!---->
				<label>First Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="fName" id="fName"/> <br><br>  
				<label>Last Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="lName" id="lName"/> <br><br>  
				<label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" style="width: 200px;" maxlength="40" required name="email" id="email"/> <br><br>  
			</form>
        
        
    </div>
	</div>	
</body>
</html>

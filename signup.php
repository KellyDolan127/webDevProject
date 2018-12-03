<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link rel="shortcut icon" href="images/favCon.png" type="image/png" sizes="16x16"><!---->
        <script type="text/javascript" src="external.js"></script>
<!--        <script>

        var mysql = require('mysql');
        var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        database: "websitedb"
        });

        con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        var sql = "INSERT INTO users (username, password, steamID) VALUES ('testuser', '123456789')";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record inserted");
        });
        });
        </script> -->
    </head>
<body>

        <?php

        $conn=mysqli_connect("localhost","root","","websitedb");

        if(!$conn)
        {
        die("Connection failed: " . mysqli_connect_error());
        }

        ?>
        <?php
            $link = mysqli_connect("localhost", "root", "", "websitedb");
            if(isset($_POST['signup'])){
                $profilePic = "images/profile_pic.png";
                $sql = "INSERT INTO users (name, username, password, steamid, email, birthday, profilePic)
                VALUES ('".$_POST["name"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["steamUsername"]."',
                '".$_POST["email"]."','".$_POST["bday"]."','$profilePic')";

                $result = mysqli_query($conn,$sql);
		$_SESSION['user']=$_POST["username"];
                header("Location: index.php");
            }

        ?>
        <div id="mainBar"></div>
        <div id="centerBox"> 
            <div id="centerBoxContent">
                <span class="bold">Create an Account: </span><br><br>
                <form id="signUpForm" onsubmit="return passwordMatch();" action="signup.php" method="POST" name="signUpForm"> <!---->

				<!-- We can try to make this look nicer with all those spaces I used to quickly format everything-->
				<label>Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" required name="name" id="name"/> <br><br>
                <label>Username:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="username" id="username"/> <br><br>  
                <label>Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="password" id="password"/> <br><br>
                <label>Re-Password:</label>  <input type="password" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="rePassword" id="rePassword"/> <br><br>
                <label>Steam ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 200px;" maxlength="20" required name="steamUsername" id="steamUsername"/> <br><br>  
                <label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" style="width: 200px;" maxlength="40" required name="email" id="email"/> <br><br>
                <label>Birthday:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="10" required name="bday" id="bday"/><br/><br/>
                <!-- only allow for numbers and letters in both fields-->
               
                <input class="inputLoginSignup" type="submit" name="signup" value="SignUp"/>
                </form>
                <br>
                <form id="loginForm" action="index.php" method="POST" name="loginName3">
                <input type="submit" type="button" name ="indexReturn" value="Back to Main" formaction="index.php" />
                </form>
            </div>
        </div>
    </body>
</html>

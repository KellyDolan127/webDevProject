<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href="style.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favCon.png" type="image/png" sizes="16x16">
    <script type="text/javascript" src=""></script>
</head>

    <?php
    $conn=mysqli_connect("localhost","root","","websitedb");
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <?php
        $link = mysqli_connect("localhost", "root", "", "websitedb");
        if(isset($_POST['login'])){
            $sql = "SELECT * FROM users where username = '".$_POST["username"]."' AND password = '".$_POST["password"]."'";

            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){     
                $_SESSION['user']=$_POST["username"];
                header("Location: index.php");           

            }
            else{
                header("Location: login.php");
            }
        }
    ?>
    <?php
            if(isset($_POST['signUp'])){
                header("Location: signup.php");
            }
    ?>
<body>
    <div id="topBar"></div>
    <div id="centerBox">
        <div id="centerBoxContent">
            <span class="bold">Sign In: </span><br><br>
            <form id="loginForm" onsubmit="return check();" action="login.php" method="POST" name="loginName">
                <label>Username:</label> <input type="text" required style="width: 200px;" maxlength="20" name="username"
                    id="username" />
                <br><br>
                <label>Password:</label>&nbsp;&nbsp;<input type="password" required style="width: 200px;" maxlength="20"
                    name="password" id="password" />
                <br><br>
                <input class="inputLoginSignup" type="submit" name ="login" value="Login" />
            </form>
            <br>
            <form id="loginForm" action="signup.php" method="POST" name="loginName2">
            <input type="submit" type="button" name ="signUp" value="SignUp" formaction="signup.php" />
            </form>
            <br>
            <form id="loginForm" action="index.php" method="POST" name="loginName3">
            <input type="submit" type="button" name ="indexReturn" value="Back to Main" formaction="index.php" />
            </form>

        </div>
    </div>
</body>

</html>
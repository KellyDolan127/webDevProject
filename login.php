<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href="style.css" type="text/css" rel="stylesheet">
    <link href="" type="image/png" rel="shortcut icon" />
    <script type="text/javascript" src=""></script>
</head>

<body>
    <div id="topBar"></div>
    <div id="centerBox">
        <div id="centerBoxContent">
            <span class="bold">Sign In: </span><br><br>
            <form id="loginForm" onsubmit="return check();" action="index.php" method="POST" name="loginName">
                <label>Username:</label> <input type="text" required style="width: 200px;" maxlength="20" name="username"
                    id="username" />
                <br><br>
                <label>Password:</label>&nbsp;&nbsp;<input type="password" required style="width: 200px;" maxlength="20"
                    name="password" id="password" />
                <br><br>
                <input class="inputLoginSignup" type="submit" value="Login" />
                <input class="inputLoginSignup" type="button" value="SignUp" onclick="redirect();" />
            </form>
        </div>
    </div>
</body>

</html>
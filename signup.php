<!DOCTYPE html>
<html>
    <head>
        <title>Login</title><!---->
        <meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" >
		<link href="" type="image/png" rel="shortcut icon" /><!---->
		<script type="text/javascript" src="external.js"></script>
    </head>
<body>
        
        <div id="mainBar"></div>
        <div id="centerBox"> 
            <div id="centerBoxContent">
                <span class="bold">Create an Account: </span><br><br>
                <form id="signUpForm" onsubmit="return passwordMatch();" action="index.php" method="POST" name="signUpForm"> <!---->

				<!-- We can try to make this look nicer with all those spaces I used to quickly format everything-->
				
                <label>Username:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="username" id="username"/> <br><br>  
                <label>Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="password" id="password"/> <br><br>
                <label>Re-Password:</label>  <input type="password" style="width: 200px;" maxlength="20" pattern="([A-Za-z0-9]+)" title="Only use letters and numbers" required name="rePassword" id="rePassword"/> <br><br>
                <label>Steam Username:</label> <input type="text" style="width: 200px;" maxlength="20" required name="steamUsername" id="steamUsername"/> <br><br>  
                <label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" style="width: 200px;" maxlength="40" required name="email" id="email"/> <br><br>  
                <!-- only allow for numbers and letters in both fields-->
               
                <input class="inputLoginSignup" type="submit" value="SignUp"/>
                </form>
            </div>
        </div>
    </body>
</html>

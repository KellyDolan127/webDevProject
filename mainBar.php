<div id="mainBar">

		<div id="mainBarPic">
			<img id="logo" src="images/logo.png" alt="Game Group Logo"/>
		</div>
		<div id="mainBarSearch">
			<!--<input type="text" />-->
			Game Group
		</div>
		
		<?php if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {?>
		
		<form action="signup.php">
			<input type=submit class="mainBarButtons" value="SignUp" />
		</form>
		<form action="login.php">
			<input type=submit class="mainBarButtons" value="Login" />
		</form>

		<?php }else{ ?>
		
		<form action="profile.php">
			<input type=submit class="mainBarButtons" value=<?php echo $_SESSION['user']; ?> />
		</form>
		<form method="POST">
                <input class="mainBarButtons" name="logout" type="submit" value="Log Out" />
                </form>
                <?php
                  if (isset($_POST['logout'])){
                    session_destroy();
                    header("location:"."http://ec2-174-129-52-94.compute-1.amazonaws.com/index.php");
                  }
                ?>

		<?php } ?>  <br/> 
		
		<!--Will display "Logout" if logged in-->

		<div id="sidebar">
				This area for pages <br /><br />
				<a href=index.php>Main</a><br />
				<a href=games.php>Games</a><br />
				<a href=profile.php>Forum</a><br />
			        <a href=aboutUs.php>About Us</a><br />
		</div>
    </div>

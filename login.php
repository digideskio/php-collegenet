<?php 
session_start(); 
if($_SESSION['logged']){ 
    header("Location: account.php"); 
    exit; 
}  
?>
<?php include("menu.php"); ?>
				<h1>Login To<span class="off"> College Connect</span></h1>
	       		<form action="verify.php" method="POST">
                            <br />
                            <span id="error"><?php echo $validationErr;?></span>
                            <br />
                            <br />
				Username: <input type="text" name="username" /> 
       			<br />
				<br />
		       	Password: <input type="password" name="password" /> <br />
				<br />
				<input type="submit" name="submit" value="Login" />
				</form>
				<br />
				<p>Don't have an account?</p>
				<a href="register.php">Register now!</a>
			</div>

		       <div id="content_bottom"></div>
       	</div>

	</div>
</body>
</html>
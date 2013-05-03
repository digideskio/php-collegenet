<?php include("menu.php"); ?>
				<h1>Register your <span class="off">Campus Account Today!</span></h1>
				
				<p>
				By registering your account you can have access to many features around campus such as: <br />
				<table>
					<tr>
						<td>- View and Apply for Financial Aid <i>(such as Scholarships and Grants)</i></td>
					</tr>
					<tr>
						<td>- View Donation Information</td>
					</tr>
				</table>
				</p>
				<br />
				
				<table cellpadding="5">
				<form action = "createaccount.php" method = "POST">
					<tr>
						<td>First Name: </td>
						<td><input type="text" name="firstname" value="<?php print ($firstname ? htmlentities($firstname, ENT_QUOTES) : '') ?>" /></td> 
						<td><span id="error"><?php echo $firstnameErr;?></span></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input type="text" name="lastname" value="<?php print ($lastname ? htmlentities($lastname, ENT_QUOTES) : '') ?>" /></td>
						<td><span id="error"><?php echo $lastnameErr;?></span></td>
					</tr>
					<tr>
						<td>Campus ID: </td>
						<td><input type="text" name="campusid" value="<?php print ($campusid ? htmlentities($campusid, ENT_QUOTES) : '') ?>"/></td> 
						<td><span id="error"><?php echo $campusidErr;?></span></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" value="<?php print ($email ? htmlentities($email, ENT_QUOTES) : '') ?>" /></td>
						<td><span id="error"><?php echo $emailErr;?></span></td>
					</tr>
					<tr>
						<td>Username: </td><td>
						<input type="text" name="username" value="<?php print ($username ? htmlentities($username, ENT_QUOTES) : '') ?>"/></td> 
						<td><span id="error"><?php echo $usernameErr;?></span></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="pwd" /></td>
						<td></td>
					</tr>
					<tr>
						<td>Verify Password: </td>
						<td><input type="password" name="verifypwd" /></td>
						<td><span id="error"><?php echo $passwordErr;?></span></td>
					</tr>
					<tr>
						<td colspan="3"><input type ="submit" value = "Submit" /></td>
					</tr>
				</form>
				</table>
            </div>

            <div id="content_bottom"></div>
        </div>

    </div>
</body>
</html>

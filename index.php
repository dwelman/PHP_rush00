<html>
	<link rel="stylesheet" type="text/css" href="vendor.css" />
	<head>
		<title>Vendor</title>
	</head>
		<?php
			session_start();
		?>
	<body>
		<form name="login" action="login.php" method="post">
			Username <input type="input" name="login" value="" />
			Password <input type="password" name="passwd" value="" />
			<input type="submit" name="submit" value="OK" />
		</form>
		<br />
		<a href="user_create.php?error=0">Create Account</a>
		<?php
			session_start();
			if ($_SESSION["logged_on_user"] != NULL && $_SESSION["is_admin"] == true)
			{
				echo '<br /><a href="admin.php">Admin Options</a>';
			}
			if ($_SESSION["logged_on_user"] != NULL)
			{
				echo '<br /><a href="change_password.php">Change Password</a>';
			}
		?>
	</body>
</html>
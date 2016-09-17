<html>
	<link rel="stylesheet" type="text/css" href="format.css" />
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
			include("get_categories.php");
			if (($categories = get_categories()) == false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			if ($_SESSION["logged_on_user"] != NULL && $_SESSION["is_admin"] == true)
			{
				echo '<br /><a href="admin.php">Admin Options</a>';
			}
			if ($_SESSION["logged_on_user"] != NULL)
			{
				echo '<br /><a href="change_password.php">Change Password</a>';
			}
			foreach ($categories as $cat)
			{
				echo '<form action="load_prod.php" name="load_prod.php" method="post">';
				echo '<type="hidden" name="id" value="' . $cat["id"] . '"/>';
				echo '<input type="submit" name="category" value="' . strtoupper($cat["name"]) . '"/>';
				echo "</form>";
			}
		?>
	</body>
</html>
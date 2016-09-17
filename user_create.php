<html>
	<link rel="stylesheet" type="text/css" href="format.css" />
	<head>
		<title>Delete Account</title>
	</head>
	<?php
		if ($_GET["error"] === "1")
			echo "<p><b>Error: User already exists<b></p><br />";
		else if ($_GET["error"] === "2")
			echo "<p><b>Error: Username or Password cannot be blank<b></p><br />";
	?>
	<body>
		<form action="create.php" name="create.php" method="post">
			Username: <input type="input" name="login" value="" />
			<br />
			Password: <input type="password" name="passwd" value = "" />
			<?php
				session_start();
				if ($_SESSION["is_admin"] == true)
				{
					echo '<br />Admin: <input type="checkbox" name="admin" checked/>';
				}
			?>
			<input type="submit" name="submit" value="OK" />
		</form>
		<br />
		<a href="index.php?error=0">Back to Home Page</a>
	</body>
</html>
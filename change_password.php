<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vendor.css" />
		<title>Change Password</title>
	</head>
	<body>
			<form action="modif.php" name="modif.php" method="post">
				Old Password: <input type="password" name="oldpw" value = "" />
				New Password: <input type="password" name="newpw" value = "" />
				<input type="submit" name="submit" value="OK" />
			</form>
		<br />
		<a href="index.php?error=0">Back to Home Page</a>
	</body>
</html>
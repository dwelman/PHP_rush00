<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<title>CHANGE_PASSWORD</title>
	</head>
	<body>
			<form action="modif.php" name="modif.php" method="post">
				OLD_PASSWORD ><input type="password" name="oldpw" value = "" />
				<br />
				NEW_PASSWORD ><input type="password" name="newpw" value = "" />
				<input type="submit" name="submit" value="OK" />
			</form>
		<a href="index.php?error=0"><i style="padding:5px" class="material-icons">home</i></a>
	</body>
</html>
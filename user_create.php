<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="format.css" />
	<head>
		<title>CREATE_ACCOUNT</title>
	</head>
	<?php
		if ($_GET["error"] === "1")
			echo "<p><b>Error: User already exists<b></p><br />";
		else if ($_GET["error"] === "2")
			echo "<p><b>Error: Username or Password cannot be blank<b></p><br />";
	?>
	<body>
		<form action="create.php" name="create.php" method="post">
			USERNAME ><input type="input" name="login" value="" />
			<br />
			PASSWORD ><input type="password" name="passwd" value = "" />
			<?php
				session_start();
				if ($_SESSION["is_admin"] == true)
				{
					echo '<br />Admin: <input type="checkbox" name="admin" checked/>';
				}
			?>
			<input type="submit" name="submit" value="OK" />
		</form>
		<a href="index.php?error=0"><i style="padding:5px" class="material-icons">home</i></a>
	</body>
</html>
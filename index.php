<html>
	<link rel="stylesheet" type="text/css" href="format.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<head>
		<title>>P4R4D1SE</title>
	</head>
		<?php
			session_start();
		?>
	<body>
		<div id="header">
			<div>
				<h1>>P4R4D1SE</h1>
				<h3 style="padding-left:3em">>WELCOME_TO_PARADISE</h3>
				<form name="login" action="login.php" method="post">
				Username ><input type="input" name="login" value="" />
				Password ><input type="password" name="passwd" value="" />
				<input type="submit" name="submit" value="OK" />
				</form>
				<div id="header_box">
					<a href="user_create.php?error=0">CREATE_ACCOUNT</a>
				</div>
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
						echo '<div id="header_box">';
						echo '<a href="admin.php">ADMIN</a>';
						echo "</div>";
					}
					if ($_SESSION["logged_on_user"] != NULL)
					{
						echo '<div id="header_box">';
						echo '<a href="change_password.php">CHANGE_PASSWORD</a>';
						echo "</div>";
					}
				?>
				<div id="header_box">
					<a href="show_cart.php" target="main_frame">CART</a>
				</div>
				<div id="header_box">
					<a href="logout.php">LOGOUT</a>
				</div>
			</div>
		</div>
		<div id="frames">
			<div class="column1">
				<iframe name="cat_frame" id="cat_frame" src="load_cat.php"></iframe>
			</div>
			<div class="feature">
				<iframe name="main_frame" id="main_frame" src="load_prod.php"></iframe>
			</div>
		</div>
		<div id="footer">
			<p>BACK_END BY: DAVID_WELMAN || FRONT_END: THULASIZWE_MAVUSO || &copy2016 DAVIWEL & THUMAVU</p>
		</div>
	</body>
</html>
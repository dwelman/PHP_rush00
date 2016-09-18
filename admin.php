<html>
	<link rel="stylesheet" type="text/css" href="format.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<head>
		<title>ADMIN_PORTAL</title>
	</head>
	<body>
		<div id="header_2">
			<?php
				session_start();
				echo '<p>WELCOME_ADMIN ' . $_SESSION["logged_on_user"] . '</p>';
				include("get_categories.php");
				if ($_GET["error"] === "1")
					echo "<p><b>Error: Cannot delete currently logged in user</b></p><br />";
				else if ($_GET["error"] === "2")
					echo "<p><b>Error: Username cannot be blank</b></p><br />";
				else if ($_GET["error"] === "3")
					echo "<p><b>Error: User not found</b></p><br />";
				else if ($_GET["error"] === "4")
					echo "<p><b>Error: New name cannot be blank</b></p><br />";
				else if ($_GET["error"] === "5")
					echo "<p><b>Error: Fields cannot be blank</b></p><br />";
				else if ($_GET["error"] === "6")
					echo "<p><b>Error: Duplicate Categories</b></p><br />";
				else if ($_GET["error"] === "7")
					echo "<p><b>Error: Category does not exist</b></p><br />";
				else if ($_GET["error"] === "8")
					echo "<p><b>Error: Cannot remove item from category \"All\"</b></p><br />";
			?>
			<div id="header_box">
				<a href="admin_cat.php" target="admin_frame_1">CATEGORIES</a>
			</div>
			<div id="header_box">
				<a href="admin_prod.php" target="admin_frame_2">PRODUCTS</a>
			</div>
			<div id="header_box">
				<a href="show_orders.php" target="admin_frame_2">ORDERS</a>
			</div>
			<div id="header_box">
				<a href="index.php?error=0"><i style="padding:5px" class="material-icons">home</i></a>
			</div>
		</div>
		<div>
			<form action="del_user.php" name="del_user.php" method="post">
			DELETE_A_USER ><input type="input" name="to_del" value="" />
			<input type="submit" name="submit" value="OK" />
		</form>
		</div>
		<div id="frames2">
			<div class="column3">
				<iframe name="admin_frame_1" id="admin_frame_1" src="admin_cat.php"></iframe>
			</div>
			<div class="column4">
				<iframe name="admin_frame_2" id="admin_frame_2" src="admin_prod.php"></iframe>
			</div>
		</div>
		<div id="footer">
			<p>BACK_END BY: DAVID_WELMAN || FRONT_END: THULASIZWE_MAVUSO || &copy2016 DAVIWEL & THUMAVU</p>
		</div>
	</body>
</html>
<html>
	<link rel="stylesheet" type="text/css" href="vendor.css" />
	<head>
		<title>Admin Portal</title>
	</head>
	<?php
		session_start();
		echo '<p>Welcome to the admin page ' . $_SESSION["logged_on_user"] . '</p>';
		echo '<hr>';
		include("get_categories.php");
		if ($_GET["error"] === "1")
			echo "<p><b>Error: Cannot delete currently logged in user<b></p><br />";
		else if ($_GET["error"] === "2")
			echo "<p><b>Error: Username cannot be blank<b></p><br />";
		else if ($_GET["error"] === "3")
			echo "<p><b>Error: User not found<b></p><br />";
		else if ($_GET["error"] === "4")
			echo "<p><b>Error: New name cannot be blank</b></p><br />";
	?>
	<body>
		<p>Delete a user</p>
		<form action="del_user.php" name="del_user.php" method="post">
			Username: <input type="input" name="to_del" value="" />
			<input type="submit" name="submit" value="OK" />
		</form>
		<hr>
		<p>Categories</p>
		<p>Make a new category</p>
			<form action="make_cat.php" name="make_cat.php" method="post">
				Name: <input type="input" name="name" value=""/>
				<input type="submit" name="submit" value="OK"/>
			</form>
		<?php
			//include("get_categories.php");
			if (($categories = get_categories()) == false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($categories as $cat)
			{
				echo '<form action="change_cat.php" name="change_cat.php" method="post">';
				echo 'ID: <input type="input" name="id" value="' . $cat["id"] . '"readonly/>'; 
				echo 'Category: <input type="input" name="to_change" value="' . $cat["name"] . '"/>';
				echo '<input type="submit" name="mode" value="MOD"/>';
				echo '<input type="submit" name="mode" value="DEL"/>';
				echo '</form>';
			}
		?>
		<hr>
		<p>Products</p>
		<?php
			include("get_products.php");
			if (($products = get_products()) == false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($products as $prod)
			{
				echo '<form action="change_prod.php" name="change_prod.php" method="post">';
				echo 'ID: <input type="input" name="id" value="' . $prod["id"] . '"readonly/>'; 
				echo 'Name: <input type="input" name="to_change" value="' . $prod["name"] . '"/>';
				echo 'Description: <input type="input" name="to_change" value="' . $prod["desc"] . '"/>';
				echo 'Price: <input type="number" name="to_change" value="' . $prod["price"] . '"/>';
				//echo 'Categories: <input type="input" name="to_change" value="' . $prod["name"] . '"/>';
				echo '<input type="submit" name="mode" value="MOD"/>';
				echo '<input type="submit" name="mode" value="DEL"/>';
				echo '</form>';
			}
		?>
		<br />
		<a href="index.php?error=0">Back to Home Page</a>
	</body>
</html>
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
				if ($cat["name"] === "All")
				{
					$_SESSION["all_id"] = $cat["id"];
					echo 'Category: <input type="input" name="to_change" value="' . $cat["name"] . '"readonly/>'; 
				}
				else
				{
					echo 'Category: <input type="input" name="to_change" value="' . $cat["name"] . '"/>';
					echo '<input type="submit" name="mode" value="MOD"/>';
					echo '<input type="submit" name="mode" value="DEL"/>';
				}
				echo '</form>';
			}
		?>
		<hr>
		<p>Products</p>
		<p>Add a product</p>
		<?php
			include("get_products.php");
			echo '<form action="make_prod.php" name="make_prod.php" method="post">';
			echo 'Name: <input type="input" name="name" value=""/>';
			echo 'Description: <input type="input" name="desc" value=""/>';
			echo 'Price: <input type="number" name="price" step="any" value=""/>';
			echo '<input type="submit" name="submit" value="OK"/>';
			echo '</form>';
			if (($products = get_products()) === false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($products as $prod)
			{
				echo '<form action="change_prod.php" name="change_prod.php" method="post">';
				echo 'ID: <input type="input" name="id" value="' . $prod["id"] . '"readonly/>'; 
				echo 'Name: <input type="input" name="name" value="' . $prod["name"] . '"/>';
				echo 'Description: <input type="input" name="desc" value="' . $prod["desc"] . '"/>';
				echo 'Price: <input type="number" name="price" step="any" value="' . $prod["price"] . '"/>';
				echo 'Categories: <select name="categories">';
				foreach ($prod["categories"] as $cat)
				{
					echo '<option value="' . $cat . '">' . $cat . "</option>";
				}
				echo '</select>';
				echo '<input type="submit" name="mode" value="MOD"/>';
				echo '<input type="submit" name="mode" value="DEL"/>';
				echo '<br />';
				echo 'Remove Category: <input type="input" name="remove" value=""/>';
				echo '<input type="submit" name="mode" value="RMV"/>';
				echo 'Add Category: <input type="input" name="add" value=""/>';
				echo '<input type="submit" name="mode" value="ADD"/>';
				echo '</form>';
			}
		?>
		<br />
		<a href="index.php?error=0">Back to Home Page</a>
	</body>
</html>
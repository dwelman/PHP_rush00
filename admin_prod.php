<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>
		<p>>PRODUCTS</p>
		<p>ADD_A_PRODUCT</p>
		<?php
			include("get_products.php");
			echo '<form action="make_prod.php" name="make_prod.php" method="post">';
			echo 'NAME ><input type="input" name="name" value=""/>';
			echo 'DESCRIPTION ><input type="input" name="desc" value=""/>';
			echo 'PRICE ><input type="number" name="price" step="any" value=""/>';
			echo '<input type="submit" name="submit" value="OK"/>';
			echo '</form>';
			echo '<hr>';
			if (($products = get_products()) === false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($products as $prod)
			{
				echo '<form action="change_prod.php" name="change_prod.php" method="post">';
				echo 'ID ><input style="width:10em" type="text" name="id" value="' . $prod["id"] . '"readonly/>'; 
				echo 'NAME ><input style="width:9em" type="input" name="name" value="' . $prod["name"] . '"/>';
				echo 'DESCRIPTION ><textarea rows="2" cols="40" name="desc">' . $prod["desc"] . '</textarea>';
				echo 'PRICE >B <input style="width:5em" type="number" name="price" step="any" value="' . $prod["price"] . '"/>';
				echo 'CATEGORIES ><select name="categories">';
				foreach ($prod["categories"] as $cat)
				{
					echo '<option value="' . $cat . '">' . $cat . "</option>";
				}
				echo '</select>';
				echo '<br />';
				echo '<input type="submit" name="mode" value="MOD"/>';
				echo '<input type="submit" name="mode" value="DEL"/>';
				echo '<br />';
				echo 'REMOVE_CATEGORY ><input type="input" name="remove" value=""/>';
				echo '<input type="submit" name="mode" value="RMV"/>';
				echo 'ADD_CATEGORY ><input type="input" name="add" value=""/>';
				echo '<input type="submit" name="mode" value="ADD"/>';
				echo '</form>';
				echo '<hr>';
			}
		?>	
	</body>
</html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
	</head>
	<body>
		<?php
			include("get_products.php");
			session_start();
			$avail_prod = array();
			if (!$_SESSION["active_cat"])
				$_SESSION["active_cat"] = $_SESSION["all_id"];
			if (($products = get_products()) === false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			for ($i = 0; $i < count($products); $i++)
			{			
				for ($k = 0; $k < count($products[$i]["categories"]); $k++)
				{
					$f_id = $products[$i]["categories"][$k];
					if ($f_id === $_SESSION["active_cat"])
					{
						$avail_prod[] = $products[$i];
					}
				}
			}
			foreach ($avail_prod as $field)
			{
				echo '<form action="add_to_cart.php" name="add_to_cart.php" method="post">';
				echo '<input name="id" type="hidden" value="' . $field["id"] . '"/>';
				echo 'NAME ><input name="name" type="text" value="' . $field["name"] . '"readonly/>';
				//echo '<input name="desc" type="text" value="' . $field["desc"] . '"readonly/>';
				echo 'DESCRIPTION ><textarea rows="1" cols="100" name="desc" readonly>' . $field["desc"] . '</textarea>';
				echo '<input name="price" type="number" value="' . $field["price"] . '"readonly/>';
				echo 'QUANTITY ><input type="number" min="1" name="quantity" style="width: 2.5%" value="1" />';
				echo '<input type="submit" name="category" value="ADD_TO_CART"/>';
				echo "</form>";
			}
		?>
	</body>
</html>
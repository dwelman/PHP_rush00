<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
		<title>Cart</title>
	</head>
	<body>
		<?php
			session_start();
			$array = $_SESSION["cart"];
			$items = 0;
			$total = 0;
			foreach($array as $key => $item)
			{
				$total += $item["price"] * $item["quantity"];
				$items++;
				echo '<form action="change_cart.php" name="change_cart.php" method="post">';
				echo '<input type="hidden" name="index" value="' . $key . '"/>';
				echo 'PRODUCT_ID: <input type="input" name="id" value="' . $item["id"] . '"readonly/>';
				echo 'NAME: <input type="input" name="name" value="' . $item["name"] . '"readonly/>';
				echo 'PRICE ><input style="width:7em" type="text" name="price" value="B ' . $item["price"] . '"readonly/>';
				echo 'QUANTITY ><input style="width:2em" type="number" min=1 name="quantity" value="' . $item["quantity"] . '"/>';
				echo '<input type="submit" name="mode" value="MODIFY"/>';
				echo '<input type="submit" name="mode" value="DELETE"/>';
				echo '</form>';
			}
			echo '<p>Total: B ' . $total . '</p>';
			if ($_SESSION["logged_on_user"] && $items != 0)
			{
				echo '<form action="checkout.php" name="checkout.php" method="post">';
				echo '<input type="hidden" name="customer" value="' . $_SESSION["logged_on_user"] . '"/>';
				echo '<input type="hidden" name="total" value="' . $total . '"/>';
				echo '<input type="submit" name="mode" value="CHECKOUT"/>';
				echo '</form>';
			}
		?>
		<br /><a href="clear_cart.php">Clear Cart</a><br />
	</body>
</html>
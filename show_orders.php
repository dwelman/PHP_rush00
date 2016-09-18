<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
	</head>
	<body>
		<?php
			include("get_orders.php");
			session_start();
			$orders = get_orders();
			if ($orders === "NOFILE")
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($orders as $order)
			{
				echo '<p>ORDER_ID >' . $order["id"] . '</p>';
				echo '<p>CUSTOMER >' . $order["customer"] . '</p>';
				echo '<p>TOTAL >B ' . $order["total"] . '</p>';
				echo '<hr>';
			}
		?>
	</body>
</html>
<html>
	<link rel="stylesheet" type="text/css" href="vendor.css" />
	<head>
		<title>Customer</title>
	</head>
	<body>
		<?php
			session_start();
			echo '<p><b>Welcome to Vendor, ' . $_SESSION["logged_on_user"] . "!</b></p><br />";
		?>
	</body>
</html>
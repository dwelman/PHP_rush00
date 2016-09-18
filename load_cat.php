<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
	</head>
	<body>
		<?php
			include("get_categories.php");
			session_start();
			if (($categories = get_categories()) == false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($categories as $cat)
			{
				echo '<form action="change_active_cat.php" name="change_active_cat.php" method="post" target="main_frame">';
				echo '<input type="hidden" name="id" value="' . $cat["id"] . '"/>';
				echo '<input style="width:100%" type="submit" name="category" value="' . strtoupper($cat["name"]) . '"/>';
				echo "</form>";
			}
		?>
	<body>
</html>
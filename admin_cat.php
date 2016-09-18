<html>
	<head>
		<link rel="stylesheet" type="text/css" href="format.css" />
	</head>
	<body>
		<p>>CATEGORIES</p>
		<p>MAKE_A_NEW_CATEGORY</p>
			<form action="make_cat.php" name="make_cat.php" method="post">
				NAME ><input type="input" name="name" value=""/>
				<input type="submit" name="submit" value="OK"/>
			</form>
		<hr>
		<?php
			include("get_categories.php");
			if (($categories = get_categories()) == false)
			{
				echo "ERROR:FILE_NOT_EXISTS\n";
				header("Location:index.php?error=1");
				return ;
			}
			foreach ($categories as $cat)
			{
				echo '<form action="change_cat.php" name="change_cat.php" method="post">';
				echo 'ID ><input type="input" name="id" value="' . $cat["id"] . '"readonly/>';
				if ($cat["name"] === "All")
				{
					$_SESSION["all_id"] = $cat["id"];
					echo 'CATEGORY ><input type="input" name="to_change" value="' . $cat["name"] . '"readonly/>'; 
				}
				else
				{
					echo 'CATEGORY ><input style="width:18vh" type="input" name="to_change" value="' . $cat["name"] . '"/>';
					echo '<input type="submit" name="mode" value="MOD"/>';
					echo '<input type="submit" name="mode" value="DEL"/>';
				}
				echo '</form>';
			}
		?>
	</body>
</html>
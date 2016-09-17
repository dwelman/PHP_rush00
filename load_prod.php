<html>
<body>
	<?php
		include("get_products.php");
		if (($products = get_products()) === false)
		{
			echo "ERROR:FILE_NOT_EXISTS\n";
			header("Location:index.php?error=1");
			return ;
		}
		foreach ($products as $field)
		{
			for ($i = 0; $i < count($field["categories"]); $i++)
			{
				if ($category[$i] === $_POST["id"])
				{
					echo '<p>' . $field["name"] . '</p>';
					break;
				}
			}
		}
	?>
<body>
</html>
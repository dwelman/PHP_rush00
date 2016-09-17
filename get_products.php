<?php
	function get_products()
	{
		$path = "data/products";
		if (file_exists($path))
		{
			return (unserialize(file_get_contents($path)));
		}
		else
			return (false);
	}
?>
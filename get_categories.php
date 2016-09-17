<?php
	function get_categories()
	{
		$path = "data/categories";
		if (file_exists($path))
		{
			return (unserialize(file_get_contents($path)));
		}
		else
			return (false);
	}
?>
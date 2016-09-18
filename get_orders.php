<?php
	function get_orders()
	{
		$path = "data/orders";
		if (file_exists($path))
		{
			return (unserialize(file_get_contents($path)));
		}
		else
			return ("NOFILE");
	}
?>
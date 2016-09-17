<?php
	function is_admin($login)
	{
		if (!file_exists("data/admins"))
		{
			echo "ERROR:FILE_NOT_EXISTS\n";
			header("Location:index.php?error=1");
			return false;
		}
		$admins = unserialize(file_get_contents("data/admins"));
		foreach ($admins as $field)
		{
			if ($field["login"] == $login)
				return true;
		}
		return (false);
	}
?>
<?php
	function auth($login, $passwd)
	{
		if (file_exists("data/users") && file_exists("data/admins"))
		{
			$users = unserialize(file_get_contents("data/users"));
			$admins = unserialize(file_get_contents("data/admins"));
			foreach ($users as $field)
			{
				if ($field["login"] == $login)
					if ($field["passwd"] == hash("whirlpool", $passwd))
						return (true);
			}
			foreach ($admins as $field)
			{
				if ($field["login"] == $login)
					if ($field["passwd"] == hash("whirlpool", $passwd))
						return (true);
			}
		}
		else
		{
			echo "ERROR:FILE_NOT_EXISTS\n";
			header("Location:index.php?error=1");
			return ;
		}
		return (false);
	}
?>
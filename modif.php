<?php
	$oldpw = $_POST["oldpw"];
	$newpw = $_POST["newpw"];
	$status = $_POST["submit"];
	$user_path = "data/users";
	$admin_path = "data/admins";
	$info = array();

	if ($status == "OK" && $oldpw != null && $newpw != null)
	{
		if (file_exists("data/users") && file_exists("data/admins"))
		{
			$users = unserialize(file_get_contents($user_path));
			$admins = unserialize(file_get_contents($admin_path));
			foreach ($users as $key => $field)
			{
				if ($field["passwd"] == hash("whirlpool", $oldpw))
				{
					$users[$key]["passwd"] = hash("whirlpool", $newpw);
					file_put_contents("data/users", serialize($users));
					echo "OK\n";
					header("Location:index.php?error=0");
					return ;
				}
			}
			foreach ($admins as $key => $field)
			{
				if ($field["passwd"] == hash("whirlpool", $oldpw))
				{
					$admins[$key]["passwd"] = hash("whirlpool", $newpw);
					file_put_contents("data/admins", serialize($admins));
					echo "OK\n";
					header("Location:index.php?error=0");
					return ;
				}
			}
			echo "ERROR:INCORRECT_PASSWORD\n";
			header("Location:change_password.php?error=2");
			return ;
		}
		else
		{
			echo "ERROR:FILE_NOT_EXIST\n";
			header("Location:index.php?error=1");
			return ;
		}
	}
	else
	{
		echo "ERROR:BLANK_FIELDS\n";
		header("Location:change_password.php?error=1");
		return ;
	}
?>